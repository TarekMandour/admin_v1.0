<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        $data = User::get();

        if ($request->ajax()) {
            $data = User::query();
            $data = $data->orderBy('id', 'DESC');

            return Datatables::of($data)
                ->addColumn('checkbox', function($row){
                    $checkbox = '<div class="form-check form-check-sm p-3 form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="'.$row->id.'" />
                                </div>';
                    return $checkbox;
                })
                ->addColumn('name', function($row){
                    $name = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">'.$row->name.'</a>';
                    return $name;
                })
                ->addColumn('phone', function($row){
 
                    $phone = $row->phone;
                    
                    return $phone;
                })
                ->addColumn('type', function($row){
                    if($row->type == 'user') {
                        $type = 'عميل';
                    } else if ($row->type == 'provider') {
                        $type = 'مالك';
                    }
                    
                    
                    return $type;
                })
                ->addColumn('is_active', function($row){
                    if($row->is_active == 1) {
                        $is_active = '<div class="badge badge-light-success fw-bold">مقعل</div>';
                    } else {
                        $is_active = '<div class="badge badge-light-danger fw-bold">غير مفعل</div>';
                    }
                    
                    return $is_active;
                })
                ->addColumn('actions', function($row){
                    $actions = '<div class="ms-2">
                                <a href="'.route('admin.users.edit', $row->id).'" class="btn btn-sm btn-icon btn-info btn-active-dark me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-pencil-square fs-1x"></i>
                                </a>
                            </div>';
                    return $actions;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('is_active') == '0' || $request->get('is_active') == '1') {
                        $instance->where('is_active', $request->get('is_active'));
                    }

                    if ($request->get('type') == 'user' || $request->get('type') == 'provider') {
                        $instance->where('type', $request->get('type'));
                    }

                    if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('name', 'LIKE', "%$search%")
                            ->orWhere('phone', 'LIKE', "%$search%")
                            ->orWhere('email', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['name','phone','type','is_active','checkbox','actions'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('admin.user.show', compact('data'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|string',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6',
            'type' => 'required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) { 
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        } 
        $row = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'password' => Hash::make($request->password),
            'tax_num' => $request->tax_num,
            'national_id' => $request->national_id,
            'address' => $request->address,
            'id_num_expired' => $request->id_num_expired,
            'id_num_export' => $request->id_num_export,
            'nationality' => $request->nationality,
            'city_id' => $request->city_id,
            'neighborhood_id' => $request->neighborhood_id,
            'is_active' => $request->is_active ?? '0',
        ]);

        // if($request->hasFile('photo') && $request->file('photo')->isValid()){
        //     $row->addMediaFromRequest('photo')->toMediaCollection('profile');
        // }

        return redirect('admin/users')->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $rule = [
            'name' => 'required|string',
            'phone' => 'required|unique:users,phone,'.$request->id,
            'password' => 'nullable|min:6',
            'type' => 'required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) { 
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        } 

        $data = User::find($request->id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'password' => ($request->password) ? Hash::make($request->password): $data->password,
            'tax_num' => $request->tax_num,
            'national_id' => $request->national_id,
            'address' => $request->address,
            'id_num_expired' => $request->id_num_expired,
            'id_num_export' => $request->id_num_export,
            'nationality' => $request->nationality,
            'city_id' => $request->city_id,
            'neighborhood_id' => $request->neighborhood_id,
            'is_active' => $request->is_active ?? '0',
        ]);

        // if($request->hasFile('photo') && $request->file('photo')->isValid()){
        //     $data->addMediaFromRequest('photo')->toMediaCollection('profile');
        // }

        return redirect('admin/users')->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {   

        try{
            User::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'error']);
        }
        return response()->json(['message' => 'success']);

    }
}
