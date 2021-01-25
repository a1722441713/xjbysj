<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use Mail;
use App\Mail\SendForm;

class EmailController extends Controller
{
    public function showEmailForm(){
        return view('backend.email');
    }

    public function send(Request $request){
        $form = Form::findOrFail($request->get('form_id'));
        $form_url = $form->url;
        $to_address = $request->get('email');
        Mail::to($to_address)->send(new SendForm($form_url));
        return redirect()->route('send.email.form')->with('success', '邮件发送成功！');
    }
}
