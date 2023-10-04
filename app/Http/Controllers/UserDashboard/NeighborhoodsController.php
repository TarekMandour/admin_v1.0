<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\NeighborhoodRequest;
use App\Models\Neighborhood;
use DataTables;
use Validator;

class NeighborhoodsController extends Controller
{
    protected $viewPath = 'admin.neighborhood';
    private $route = 'admin.neighborhoods';

    public function __construct(Neighborhood $model)
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
                ->addColumn('city', function($row){
                    $parentName = $row->city->title;
                    $city = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">'.$parentName.'</a>';
                    return $city;
                })
                ->addColumn('actions', function($row){
                    $actions = '<div class="ms-2">
                                <a href="'.route($this->route.'.edit', $row->id).'" class="btn btn-sm btn-icon btn-info btn-active-dark me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-pencil-square fs-1x"></i>
                                </a>
                            </div>';
                    return $actions;
                })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->where('title', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['city','checkbox','actions'])
                ->make(true);
        }
        return view($this->viewPath .'.index');
    }

    public function show($id)
    {
        $data = $this->objectModel::find($id);
        return view($this->viewPath .'.show', compact('data'));
    }

    public function fetchState(Request $request)
    {
        $data['states'] = $this->objectModel::where("city_id", $request->city_id)
                                ->get(["title", "id"]);
  
        return response()->json($data);
    }

    public function create()
    {
        return view($this->viewPath .'.create');
    }

    public function store(NeighborhoodRequest $request)
    {

        $data = $request->validated();
        $result = $this->objectModel::create($data);

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $result->addMediaFromRequest('photo')->toMediaCollection('photo');
        }
        
        return redirect(route($this->route . '.index'))->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function edit($id)
    {
        $data = $this->objectModel::find($id);
        return view($this->viewPath .'.edit', compact('data'));
    }

    public function update(NeighborhoodRequest $request)
    {

        $data = $request->validated();

        $result = $this->objectModel::whereId($request->id)->first();
        $result->update($data);

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $result->addMediaFromRequest('photo')->toMediaCollection('photo');
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
