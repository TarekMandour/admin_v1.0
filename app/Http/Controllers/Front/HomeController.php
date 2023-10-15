<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;
use App\Models\Blog;
use App\Models\Page;
use App\Models\BranchGift;
use App\Models\Contact;
use App\Models\Slider;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;

class HomeController extends Controller
{
    public function index() {

        $vision_ar = Page::where('name_en', 'about')->pluck('vision_ar')->first();
        $vision_en = Page::where('name_en', 'about')->pluck('vision_en')->first();
        $message_ar = Page::where('name_en', 'about')->pluck('massage_ar')->first();
        $message_en = Page::where('name_en', 'about')->pluck('massage_en')->first();
        $mission_ar = Page::where('name_en', 'about')->pluck('mission_ar')->first();
        $mission_en = Page::where('name_en', 'about')->pluck('mission_en')->first();

        return view('front/index', compact('vision_ar', 'vision_en', 'message_ar', 'message_en', 'mission_ar', 'mission_en'));
    }

    public function changLang(Request $request) {
        if (app()->getLocale() == 'ar') {
            App::setLocale('en');
            session()->put('locale', 'en');
        }else{
            App::setLocale('ar');
            session()->put('locale', 'ar');
        }
        
        

        return redirect()->back();
    }

    public function about() {

        $about = Page::where('name_en', 'about')->first();

        return view('front/about', compact('about'));
    }

    public function login() {

        return view('front/login');
    }

    public function contact(Request $request) {

        return view('front/contact');
    }

    public function contactSubmit(Request $request) {

        $rule = [
            'name' => 'required|string|max:255',
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
            'content' => $request->content,
            'status' => 'unread',
        ]);

        return redirect()->back()->with('message', 'تم الارسال بنجاح ')->with('status', 'success');
    }

    public function blogs() {

        $news = Blog::where('status', 'active')->where('category_id', 1)->where('type','news')->paginate(9);
        $images = Blog::where('status', 'active')->where('category_id', 1)->where('type','image')->paginate(9);
        $videos = Blog::where('status', 'active')->where('category_id', 1)->where('type','video')->paginate(9);

        return view('front/blogs', compact('news','images','videos'));
    }


    public function blogDetails($id) {

        $blog = Blog::find($id);

        return view('front/blog_details', compact('blog'));

    }

    public function education() {

        $books = Blog::where('status', 'active')->where('category_id', 2)->where('type','books')->paginate(9);
        $images = Blog::where('status', 'active')->where('category_id', 2)->where('type','image')->paginate(9);
        $videos = Blog::where('status', 'active')->where('category_id', 2)->where('type','video')->paginate(9);

        return view('front/education', compact('books','images','videos'));
    }

    public function gifts($id) {

        $gifts = BranchGift::where('is_active', 1)->where('branch_id', $id)->paginate(8);

        return view('front/gifts', compact('gifts'));
    }

    public function terms() {

        $terms = Page::where('name_en', 'terms')->get();

        return view('front/terms', compact('terms'));
    }

    public function privacy() {

        $privacy = Page::where('name_en', 'privacy')->get();

        return view('front/privacy', compact('privacy'));
    }
    
    public function booking($id) {

        if (Auth::guard('web')->check() == false) {
            return back()->with(['error' => 'عفوا يجب التسجيل اولا']);
        }

        $service = Service::with('trees')->find($id);

        return view('front/booking', compact('service'));

    }

}
