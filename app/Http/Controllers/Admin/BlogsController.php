<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use DataTables;
use Validator;

class BlogsController extends Controller
{
    protected $viewPath = 'admin.blog';
    private $route = 'admin.blogs';

    public function __construct(Blog $model)
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
                    $checkbox = '';
                            $checkbox .= '<div class="form-check form-check-sm p-3 form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="'.$row->id.'" />
                            </div>';
                    return $checkbox;
                })
                ->addColumn('title_ar', function($row){
                    $title_ar = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">'.$row->title_ar.'</a></div>';
                    return $title_ar;
                })
                ->addColumn('title_en', function($row){
                    $title_en = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">'.$row->title_en.'</a></div>';
                    return $title_en;
                })
                ->addColumn('type', function($row){
                    if ($row->type == 'news') {
                        $type = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">عام</a></div>';
                    }elseif ($row->type == 'image'){
                        $type = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">معرض صور</a></div>';

                    }else{
                        $type = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">معرض فيديوهات</a></div>';

                    }
                    return $type;
                })
                ->addColumn('category_id', function($row){
                    $category_id = '<div class="d-flex flex-column"><a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">'.$row->category->name_ar.'</a></div>';
                    return $category_id;
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
                    if ($request->get('from_date') && $request->get('to_date')) {
                        $instance->whereBetween('created_at', [$request->get('from_date'), $request->get('to_date')]);
                    }

                    if ($request->get('status') == '0' || $request->get('status') == '1' || $request->get('status') == '2') {
                        $instance->where('status', $request->get('status'));
                    }

                    if ($request->get('type') == 'news' || $request->get('type') == 'video' || $request->get('type') == 'image') {
                        $instance->where('type', $request->get('type'));
                    }

                    if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('title_ar', 'LIKE', "%$search%")
                            ->orWhere('title_en', 'LIKE', "%$search%")
                            ->orWhere('description_ar', 'LIKE', "%$search%")
                            ->orWhere('description_en', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['checkbox', 'category_id', 'title_ar', 'title_en', 'type','actions'])
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

    public function store(BlogRequest $request)
    {

        $data = $request->validated();
        $result = $this->objectModel::create($data);

        if($request->hasFile('photo')){
            $result->addMultipleMediaFromRequest(['photo'])->each(function ($fileAdder) {
                $fileAdder->addMediaCollection('photo');
            });
        }

        return redirect(route($this->route . '.index'))->with('message', 'تم الاضافة بنجاح')->with('status', 'success');
    }

    public function edit($id)
    {
        $data = $this->objectModel::find($id);
        return view($this->viewPath .'.edit', compact('data'));
    }

    public function update(BlogRequest $request)
    {

        $data = $request->validated();

        $result = $this->objectModel::whereId($request->id)->first();
        $result->update($data);

        if($request->hasFile('photo')){
            $result->addMultipleMediaFromRequest(['photo'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('photo');
            });
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
