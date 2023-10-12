<?php

namespace App\Http\Controllers\SupervisorDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use DataTables;
use Validator;

class MessagesController extends Controller
{
    protected $viewPath = 'supervisor.message';
    private $route = 'supervisor.messages';

    public function __construct(Message $model)
    {
        $this->objectModel = $model;
    }

    public function index(Request $request)
    {
        $data = $this->objectModel::get();

        if ($request->ajax()) {
            $data = $this->objectModel::query();
            $data = $data->orderBy('id', 'DESC');

            return Datatables::of($data)
                ->addColumn('checkbox', function($row){
                    $checkbox = '<div class="form-check form-check-sm p-3 form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="'.$row->id.'" />
                                </div>';
                    return $checkbox;
                })
                ->addColumn('name', function($row){
                    $name = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">'.$row->name.'</a></div>';
                    return $name;
                })
                ->addColumn('email', function($row){
                    $email = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">'.$row->email.'</a></div>';
                    return $email;
                })
                ->addColumn('status', function($row){
                    if($row->status == 'read') {
                        $status = '<div class="badge badge-light-success fw-bold">تم المشاهدة</div>';
                    } else {
                        $status = '<div class="badge badge-light-danger fw-bold">لم يتم المشاهدة</div>';
                    }

                    return $status;
                })
                ->addColumn('actions', function($row){
                    $actions = '<div class="ms-2">
                                <a href="'.route($this->route.'.show', $row->id).'" class="btn btn-sm btn-icon btn-warning btn-active-dark me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-eye-fill fs-1x"></i>
                                </a>
                                <a href="'.route($this->route.'.edit', $row->id).'" class="btn btn-sm btn-icon btn-info btn-active-dark me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-pencil-square fs-1x"></i>
                                </a>
                            </div>';
                    return $actions;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status')) {
                        $instance->where('status', $request->get('status'));
                    }
                    if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('name','LIKE', "%$search%")
                            ->orWhere('phone','LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['name', 'email','status','checkbox','actions'])
                ->make(true);
        }
        return view($this->viewPath .'.index');
    }

    public function show($id)
    {
        $data = $this->objectModel::find($id);
        return view($this->viewPath .'.show', compact('data'));
    }

    public function create()
    {
        return view($this->viewPath .'.create');
    }

    public function store(Request $request)
    {

        $rule = [
            'receiver_id' => 'required|exists:users,id',
            'phone' => 'nullable',
            'email' => 'nullable',
            'description' => 'required',
            'photo' => 'required',
            'status' => 'required',
        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Message::create([
            'name' => auth('supervisor')->user()->name_ar,
            'email' => auth('supervisor')->user()->email,
            'phone' => auth('supervisor')->user()->phone,
            'description' => $request->description,
            'status' => $request->status,
            'receiver_type' => 'user',
            'receiver_id' => $request->receiver_id,
            'sender_type'=>'supervisor',
            'sender_id'=>auth('supervisor')->user()->id,
        ]);

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $row->addMediaFromRequest('photo')->toMediaCollection('messages');
        }


        return redirect(route($this->route . '.index'))->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function edit($id)
    {
        $data = $this->objectModel::find($id);
        return view($this->viewPath .'.edit', compact('data'));
    }

    public function update(Request $request)
    {

        $rule = [
            'name' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'description' => 'nullable',
            'photo' => 'nullable',
            'status' => 'nullable',
        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $data = Message::find($request->id);
        $data->update([
            'name' => auth('supervisor')->user()->name_ar,
            'email' => auth('supervisor')->user()->email,
            'phone' => auth('supervisor')->user()->phone,
            'description' => $request->description,
            'status' => $request->status,
            'receiver_type' => 'user',
            'receiver_id' => $request->receiver_id,
            'sender_type'=>'supervisor',
            'sender_id'=>auth('supervisor')->user()->id,
        ]);

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $data->addMediaFromRequest('photo')->toMediaCollection('profile');
        }

        return redirect(route($this->route . '.index'))->with('message', 'تم التعديل بنجاح')->with('status', 'success');
    }

    public function destroy(Request $request)
    {

        try{
            $this->objectModel::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'error']);
        }
        return response()->json(['message' => 'success']);

    }
}
