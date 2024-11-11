<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function adminNotificationUpdate() {
        $data['getRecord'] = User::get();
        return view('admin.notification.update', $data);
    }

    public function adminNotificationSend(Request $request) {
        // dd($request->all());
        $saveDB = new Notification;
        $saveDB->userId = trim($request->userId);
        $saveDB->title = trim($request->title);
        $saveDB->message = trim($request->message);
        $saveDB->save();
        
        $user = User::where('id', '=', $request->userId)->first();
        // dd($user);
        // dd($user->token);
        if (!empty($user->token)) {
            try {
                $serverKey = "Please Set Your Firebase Server Key";
                $token = $user->token;

                $body['title'] = $request->title;
                $body['message'] = $request->message;
                $body['body'] = $request->message;

                $url = "https://fcm.googleapis.com/fcm/send";
                $notification = array('title' => $request->title, 'body' => $request->message,);
                $arrayToSend = array('to' => $token, 'data' => $body, 'priority' => 'high');
                $json1 = json_encode($arrayToSend);
                $headers = array();
                $headers[] = 'Content-Type: application/json';
                $headers[] = 'Authorization: key=' .$serverKey;
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $response = curl_exec($ch);
                curl_close($ch);

            } catch (Exception $e) {
                echo $e;
            }
        }
        return redirect('admin/notification')->with('success', 'Notification Send Successfully.');
    }
}
