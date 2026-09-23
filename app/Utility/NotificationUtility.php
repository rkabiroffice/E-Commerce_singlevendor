<?php

namespace App\Utility;

use App\Mail\InvoiceEmailManager;
use App\Models\User;
use App\Models\SmsTemplate;
use App\Http\Controllers\OTPVerificationController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderNotification;
use App\Models\FirebaseNotification;
use App\Models\Order;

class NotificationUtility
{
    public static function sendOrderPlacedNotification(Order $order, ?\stdClass $request = null): void
    {
        //sends email to customer with the invoice pdf attached
        $array['view'] = 'emails.invoice';
        $array['subject'] = translate('A new order has been placed') . ' - ' . $order->code;
        $array['from'] = env('MAIL_FROM_ADDRESS');
        $array['order'] = $order;
        try {
            Mail::to($order->user->email)->queue(new InvoiceEmailManager($array));
            Mail::to($order->orderDetails->first()->product->user->email)->queue(new InvoiceEmailManager($array));
        } catch (\Exception $e) {

        }

        if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'order_placement')->first()->status == 1) {
            try {
                $otpController = new OTPVerificationController;
                $otpController->send_order_code($order);
            } catch (\Exception $e) {

            }
        }

        //sends Notifications to user
        self::sendNotification($order, 'placed');
        if ($request !=null && get_setting('google_firebase') == 1 && $order->user->device_token != null) {
            $notification = new \stdClass();
            $notification->device_token = $order->user->device_token;
            $notification->title = "Order placed !";
            $notification->text = "An order {$order->code} has been placed";

            $notification->type = "order";
            $notification->id = $order->id;
            $notification->user_id = $order->user->id;

            self::sendFirebaseNotification($notification);
        }
    }

    public static function sendNotification(Order $order, string $order_status): void
    {
        $admin_id = \App\Models\User::where('user_type', 'admin')->value('id');
        $users = User::findMany(array_filter([$order->user->id, $admin_id]));

        $order_notification = array();
        $order_notification['order_id'] = $order->id;
        $order_notification['order_code'] = $order->code;
        $order_notification['user_id'] = $order->user_id;
        $order_notification['status'] = $order_status;

        Notification::send($users, new OrderNotification($order_notification));
    }

    public static function sendFirebaseNotification(\stdClass $req): void
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array
        (
            'to' => $req->device_token,
            'notification' => [
                'body' => $req->text,
                'title' => $req->title,
                'sound' => 'default' /*Default sound*/
            ],
            'data' => [
                'item_type' => $req->type,
                'item_type_id' => $req->id,
                'click_action' => 'FLUTTER_NOTIFICATION_CLICK'
            ]
        );

        //$fields = json_encode($arrayToSend);
        $headers = array(
            'Authorization: key=' . env('FCM_SERVER_KEY'),
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        curl_close($ch);

        $firebase_notification = new FirebaseNotification;
        $firebase_notification->title = $req->title;
        $firebase_notification->text = $req->text;
        $firebase_notification->item_type = $req->type;
        $firebase_notification->item_type_id = $req->id;
        $firebase_notification->receiver_id = $req->user_id;

        $firebase_notification->save();
    }
}
