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
        $validator = Validator::make($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes()){

        \Mail::send('emails.template', $data, function ($message) {
            $message->from('fraan.mp@gmail.com', 'Haras Online');

            $message->to('fraan.mp@gmail.com')->subject('Mensaje de Harasonline.com');
        });
        // Redirect to page
        return response()->json(['message' => 'success']);
            //return View::make('contact');  
        }else{
            return response()->json(['message' => 'error']);
        }
    }
}