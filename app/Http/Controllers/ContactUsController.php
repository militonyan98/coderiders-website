<?php

namespace App\Http\Controllers;
use App\Mail\CoderidersContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Helpers\SubscriptionHelper as SubscriptionHelper;
use App\Support;
use Error;
use \ReCaptcha\ReCaptcha as ReCaptcha;

class ContactUsController extends Controller
{

    public function index(){
        return view('ContactUs');
    }
    public function send(Request $request){
        $secret = env('RECAPTCHA_V3_SECRET');
        $response = (new ReCaptcha($secret))
        ->verify($request->input('recaptcha'), $request->ip());

        if (!$response->isSuccess()) {
            abort(404);
        }
        $path = null;
        if($request->file('file')!=null){
            $path = $request->file('file')->store('public');
        }

        $request->validate([
            'clientName' => 'required',
            'email' => 'email|required',
            'company' => 'required',
            'message' => 'required',
            'phoneNumber' => 'nullable|regex:/[0-9+\-()]{8,}/'
        ]);

        $support = new Support;
        $support->name = $request->clientName;
        $support->email = $request->email;
        $support->company = $request->company;
        $support->message = $request->message;
        $support->job_title = $request->jobTitle;
        $support->phone = $request->phoneNumber;
        $support->file = $path;

        $support->save();

        $data = [
            'name' => $request->clientName,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phoneNumber,
            'jobTitle' => $request->jobTitle,
            'messageContent' => $request->message,
            'remoteIP' => $request->ip(),
            'title'=>'CodeRiders Support System'
        ]; 
        
        Mail::to('militonyan.hermine@gmail.com')->send(new CoderidersContactMail($data));
    }

    public function subscribe(Request $request)
    {
        $token = env('MAIL_PASSWORD','none');
        $email = $request->email;

        $subscription = new SubscriptionHelper($email);
        $subscription->subscribe($token);
    }
}
