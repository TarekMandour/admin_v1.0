<?php

namespace App\Http\Controllers\SupervisorDashboard;

use App\Helpers\Constant;
use App\Http\Requests\Website\Notification\ReadRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Supervisor;

class WebNotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('supervisor');
    }

    public function index()
    {
        return route('index');
    }

    public function storeToken(Request $request)
    {
        auth('supervisor')->user()->update(['device_token'=>$request->token]);
        $notifications = App\Models\Notification::where('destination_type', 1)->where('destination_id', auth('supervisor')->user()->id)->whereNull('read_at');
        $page = view('supervisor.layouts.notifications', ['notifications'=>$notifications->limit(10)->get()])->render();
        return response()->json(['message'=>'Token successfully stored.', 'page'=> $page]);
    }

    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = Supervisor::whereNotNull('device_token')->pluck('device_token')->all();

        $serverKey = 'AAAAOm6MBz4:APA91bFLeJevDPjbYOju1ieVXT9kBsPzmuhMGVm8IH3Eiz3qZ0wgWJVrCwoD-ZIhb14-wSioGEbMiYs0ZkaXxOCSBHqpRPu_tKNtY1q6R7sDoDARq7tiSvdHgOwFDRZs2S7mMI7TytHX';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        // FCM response
        dd($result);
    }
    public function read(Request $request, $id)
    {
        $Notification = Notification::where('destination_type',1)->where('id',$id)->first();
        if($Notification){
            $Notification->update(array('read_at'=>now()));
            return redirect()->route('supervisor.messages.show', $Notification->ref_id)->with([__('messages.updated_successful')]);
        }
        return redirect()->back()->with([__('messages.object_not_found')]);
    }
}
