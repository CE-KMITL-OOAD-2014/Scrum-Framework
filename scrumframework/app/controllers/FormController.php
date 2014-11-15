<?php

class FormController extends BaseController
{

    public function index()
    { 
        $data = Input::all();
        $rules = array(
        'email' => 'required|email|min:5|max:32|unique:users', //don't forget to add unique:users rule
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password' 
        );
         $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('/')->withErrors($validator);
        }else{
            // validation successful ---------------------------
            $user = new User;
            $user->store($data);
            return 'Data was saved';        
        }
    }
}