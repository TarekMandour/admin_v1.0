<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources\TicketsResource;
use App\Models\User;
use App\Models\Ticket;
use DataTables;
use Validator;

class ApiController extends Controller
{

    // #################   Employee App   ####################

    public function checkbarcode($barcode)
    {
        $data = Ticket::where('barcode', $barcode)->orderBy('id', 'DESC')->first();
        if (!$data){
            return response(['status' => 401, 'msg' => 'تم بنجاح', 'data' => NULL]);
        } else {
            $ticket = Ticket::where('barcode', $barcode)->orderBy('id', 'DESC')->first();
            $ticket->update(['bdg' => ($ticket->bdg + 1)]);
            return response(['status' => 200, 'msg' => 'تم بنجاح', 'data' => $data]);
        }
    }

    // #################   User App   ####################

    public function login(Request $request)
    {

        $rule = [
            'username' => 'required',
            'password' => 'required|min:6',
        ];
        $validate = Validator::make($request->all(), $rule);

        if ($validate->fails()) {

            return response(['status' => 401, 'msg' => $validate->messages()->first(), 'data' => NULL]);
        } else {
            $client = User::where('phone', $request->username)->first();

            if (!empty($client)) {
                if (Hash::check($request->password, $client->password)) {

                    if ($client->is_active != 1) {
                        return response(['status' => 401, 'msg' => "الحساب غير مفعل", 'data' => NULL]);
                    }

                    Auth::attempt(['phone' => $request->username, 'password' => $request->password, 'is_active' => $client->is_active]);

                    return response(['status' => 200, 'msg' => 'تم بنجاح', 'data' => $client]);

                } else {
                    return response(['status' => 401, 'msg' => 'كلمة المرور غير صحيحة', 'data' => NULL]);

                }
            } else {
                return response(['status' => 401, 'msg' => 'لا بوجد حساب لهذا المستخدم', 'data' => NULL]);

            }

        }

    }

    public function ticketsList ($user_id) {

        $results = Ticket::where('user_id', $user_id)->orderBy('id', 'asc')->get();

        if (count($results) > 0) {
            $results = TicketsResource::collection($results)->response()->getData(true);
            return response(['status' => 200, 'msg' => 'تم بنجاح', 'data' => $results]);
        } else {
            $results = TicketsResource::collection($results)->response()->getData(true);
            return response(['status' => 401, 'msg' => 'عفوا لا يوجد نتائج', 'data' => $results]);
        }

    }

}
