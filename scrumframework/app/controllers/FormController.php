<?php

class FormController extends BaseController
{

    public function index()
    { 
        $data = Input::all();
        $rules = array(
        'email' => 'required|email|min:5|max:32', //don't forget to add unique:users rule
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password' 
        );
         $validator = Validator::make($data, $rules);

    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/')->withErrors($validator);
    } else {
        // validation successful ---------------------------

        $user = new User;
        $user->email    = Input::get('email');
        $user->password = Hash::make(Input::get('password'));

        // save
        $user->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        //return Redirect::to('/');
        return 'Data was saved';
        //return Response::make('User created! Hurray!');        
        }
    }
}