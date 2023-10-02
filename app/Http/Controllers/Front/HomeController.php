<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Slider;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;

class HomeController extends Controller
{
    public function index() {

//        $info = Info::find(1);
        $user['individual'] = User::where('type', 'individual')->count();
        $user['government'] = User::where('type', 'government')->count();
        $user['private'] = User::where('type', 'private')->count();
        $user['school'] = User::where('type', 'school')->count();
        $blogs = Blog::where('status', 'active')->where('service_id', NULL)->where('user_id', NULL)->inRandomOrder()->limit(8)->get();
//        $services = Service::with('trees')->where('status', 'active')->inRandomOrder()->limit(8)->get();
        $sliders = Slider::all();

        return view('front/home', compact('user','blogs','sliders'));
    }

    public function changLang(Request $request) {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    public function about() {

        $about = Info::where('parent_id', NULL)->orWhere('parent_id', 0)->with('parent')->get();

        return view('front/about', compact('about'));
    }

    public function contact(Request $request) {

        return view('front/contact');
    }

    public function contactSubmit(Request $request) {

        $rule = [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'nullable',
            'content' => 'required'
        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return redirect()->back()->with('message', $validate->messages()->first())->with('status', 'error');
        }

        $row = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
            'status' => 'unread',
        ]);

        return redirect()->back()->with('message', 'تم الارسال بنجاح ')->with('status', 'success');
    }

    public function blogs() {

        $news = Blog::where('status', 'active')->where('type','news')->where('service_id', NULL)->where('user_id', NULL)->paginate(9);
        $image = Blog::where('status', 'active')->where('type','image')->where('service_id', NULL)->where('user_id', NULL)->paginate(9);
        $video = Blog::where('status', 'active')->where('type','video')->where('service_id', NULL)->where('user_id', NULL)->paginate(9);

        return view('front/blogs', compact('news','image','video'));
    }

    public function blogDetails($id) {

        $blog = Blog::find($id);

        return view('front/blog-details', compact('blog'));

    }

    public function partners() {

        $partners = Partner::where('type','0')->get();
        $supporters = Partner::where('type', '1')->get();

        return view('front/partner', compact('partners','supporters'));
    }

    public function services() {

        $services = Service::with('trees')->where('status', 'active')->paginate(9);

        return view('front/services', compact('services'));
    }

    public function serviceDetails($id) {

        $service = Service::with('trees')->find($id);

        $news = Blog::where('status', 'active')->where('type','news')->where('service_id', $id)->where('user_id', NULL)->paginate(9);
        $image = Blog::where('status', 'active')->where('type','image')->where('service_id', $id)->where('user_id', NULL)->paginate(9);
        $video = Blog::where('status', 'active')->where('type','video')->where('service_id', $id)->where('user_id', NULL)->paginate(9);

        return view('front/service-details', compact('service','news','image','video'));

    }

    public function serviceDetailsaccount($id) {

        $service = Service::with('trees')->find($id);

        $news = Blog::where('status', 'active')->where('type','news')->where('service_id', $id)->where('user_id', Auth::guard('web')->user()->id)->paginate(9);
        $image = Blog::where('status', 'active')->where('type','image')->where('service_id', $id)->where('user_id', Auth::guard('web')->user()->id)->paginate(9);
        $video = Blog::where('status', 'active')->where('type','video')->where('service_id', $id)->where('user_id', Auth::guard('web')->user()->id)->paginate(9);

        return view('front/service-details-account', compact('service','news','image','video'));

    }

    public function serviceDetailsaccountuser($id,$user_id) {

        $service = Service::with('trees')->find($id);

        $news = Blog::where('status', 'active')->where('type','news')->where('service_id', $id)->where('user_id', $user_id)->paginate(9);
        $image = Blog::where('status', 'active')->where('type','image')->where('service_id', $id)->where('user_id', $user_id)->paginate(9);
        $video = Blog::where('status', 'active')->where('type','video')->where('service_id', $id)->where('user_id', $user_id)->paginate(9);

        return view('front/service-details-account-user', compact('service','news','image','video','user_id'));

    }

    public function servicemodal($id) {

        $service = Service::find($id);
        if ($service) {
            return view('front/modal', compact('service'));
        } else {
            return response()->json(['msg' => 'faild']);
        }

    }

    public function servicesubmit(Request $request) {

        $services = Service::query();

        if ($request->name) {
            $services = $services->where('name', 'LIKE', $request->name);
        }

        if ($request->city_id) {
            $services = $services->where('city_id', $request->city_id);
        }

        if ($request->tree_id) {
            $tree_id = $request->tree_id;
            $services = $services->with('trees')->whereHas('trees', function ($q) use($tree_id){
                $q->where('tree_id', $tree_id);
            });
        }

        if ($request->datefrom && $request->dateto) {
            $services = $services->whereBetween(
                DB::raw('DATE(created_at)'),
                [
                    $request->datefrom,
                    $request->dateto
                ]
            );
        }

        $services = $services->paginate(9);

        return view('front/services', compact('services'));
    }

    public function myaccount() {

        $orders = Order::select('service_id')->where('user_id',Auth::guard('web')->user()->id)->get();
        $services = Service::whereIn('id', $orders)->with('trees')->paginate(9);

        return view('front/my-account', compact('services'));
    }

    public function booking($id) {

        if (Auth::guard('web')->check() == false) {
            return back()->with(['error' => 'عفوا يجب التسجيل اولا']);
        }

        $service = Service::with('trees')->find($id);

        return view('front/booking', compact('service'));

    }

    public function treemodel($id) {

        $tree = Tree::find($id);

        return response()->json(['data' => $tree->description]);

    }

    public function order(Request $request) {


        // dd($request->group[0]['follwers']);
        $user = User::find(Auth::guard('web')->user()->id);
        $service = Service::find($request->service_id);

        $saveOrder = Order::create([
            'user_id' => Auth::guard('web')->user()->id,
            'user' => $user,
            'service_id' => $request->service_id,
            'service' => $service,
            'status' => '0',
            'payment' => '0',
        ]);

        foreach ($request->quantity as $key => $qty_item) {
            if ($qty_item > 0) {
                $saveOrderTree = OrderTree::create([
                    'order_id' => $saveOrder->id,
                    'tree_id' => $request->tree_id[$key],
                    'service_id' => $request->service_id,
                    'user_id' => Auth::guard('web')->user()->id,
                    'qty' => $qty_item,
                    'price' => json_decode($request->tree_item[$key])->price
                ]);
            }
        }

        if ($request->hasFile('file')) {
            $users = (new FastExcel)->import($request->file('file'), function ($line) use($saveOrder,$request) {
                $firstKey = array_key_first($line);

                if($line[$firstKey]){
                    $saveOrderUser = OrderUser::create([
                        'order_id' => $saveOrder->id,
                        'service_id' => $request->service_id,
                        'user_id' => Auth::guard('web')->user()->id,
                        'name' => $line[$firstKey],
                    ]);
                }
            });
        } else {
            if ($request->group != NULL) {
                foreach ($request->group as $u => $user_item) {
                    if ($request->group[$u]['follwers']) {
                        $saveOrderUser = OrderUser::create([
                            'order_id' => $saveOrder->id,
                            'service_id' => $request->service_id,
                            'user_id' => Auth::guard('web')->user()->id,
                            'name' => $request->group[$u]['follwers'],
                        ]);
                    }

                }
            }
        }

        if($request->hasFile('payment') && $request->file('payment')->isValid()){
            $saveOrder->addMediaFromRequest('payment')->toMediaCollection('photo');
        }

        return view('front/success', compact('service','saveOrder'));
    }

    public function orderSuccess(Request $request) {

        $check_phone = substr($request->phone, 0, 4);
        $error = [];
        if ($check_phone != '9665') {
            $service = Service::find($request->service_id);
            $error = 'عفوا .. يجب ان يبدأ رقم الجوال بـ 9665';
            return view('front/order', compact('service','error'));
        }
        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'category_id' => $request->category_id,
            'service_id' => $request->service_id,
            'status' => 'unread',
        ]);

        return view('front/success', compact('order'));
    }

    public function search(Request $request) {

        $search = $request->search;

        $services = Service::where('status', 'active')->where('name', 'LIKE', "%$search%")->orderBy('id','asc')->paginate(12);
        return view('front/search', compact('services'));

    }

    public function policy() {
        return view('front/policy');
    }
}
