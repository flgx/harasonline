<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use Validator;
class ContactController extends Controller
{
    
    public function sendEmail(Request $request){
         //Get all the data and store it inside Store Variable
        $data = $request->all();
        //Validation rules
        $rules = array (
            //'first_name' => 'required', uncomment if you want to grab this field
            'email' => 'required|email',
            'consulta' => 'required|min:5'
        );

        //Validate data
        $validator = Validator::make ($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes()){

           Mail::send('emails.template',array('nombre'=>$request('nombre'),'email'=>$request('email'),'mensajex'=>$request('consulta')), $data, function($message) use ($data)
            {
                //$message->from($data['email'] , $data['first_name']); uncomment if using first name and email fields 
                $message->from('fraan.mp@gmail.com', 'feedback contact form');
                //email 'To' field: cahnge this to emails that you want to be notified.                    
                $message->to('fraan.mp@gmail.com', 'John')->cc('feedback@gmail.com')->subject('feedback form submit');

            });
            // Redirect to page
           return redirect()->route('front.index')
            ->with('message', 'Your message has been sent. Thank You!');


            //return View::make('contact');  
        }else{
            //return contact form with errors
            return redirect()->route('front.index')
             ->with('error', 'Feedback must contain more than 5 characters. Try Again.');
        }
    }
}
