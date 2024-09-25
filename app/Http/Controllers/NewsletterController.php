<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Newsletter;
use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'             => 'required|email',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'data' => $validator->errors()]);
            }
            $request['token'] = base64_encode($request->email) . time();
            $updatedDetails  = Newsletter::updateOrCreate(['email' => $request->email], ['token' => $request['token']]);
            if (isset($updatedDetails)) {
                Mail::to($request->email)->send(new NewsletterMail($request['token']));
            }
            return response()->json(['status' => true, 'message' => 'Please Check Your Mail For Subscribe']);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => $e->getMessage()]);
        }
    }

    public function verify($token)
    {
        $decryptToken = getDecryptId($token);
        $subscriber_data = Newsletter::where('token', $decryptToken)->where('updated_at', '>=', Carbon::now()->subDay()->toDateTimeString())->first();
        if (isset($subscriber_data) && $subscriber_data->status == 0) {
            $already = false;
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();
            return redirect(route('thank.you', compact(var_name: 'already')));
        } else if (isset($subscriber_data) && $subscriber_data->status == 1) {
            $already = true;
            return redirect(route('thank.you', compact(var_name: 'already')));
        } else {
            return redirect(route('error'));
        }
    }
}
