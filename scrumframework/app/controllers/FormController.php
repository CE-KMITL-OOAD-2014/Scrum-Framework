<?php

class FormController extends BaseController
{

    public function index()
    { 
            $data = Input::all();
            $rules = array(
                'email' => 'required|email|min:5|max:32',
                'password' => 'required|same:password_confirmation|min:6|max:64',
                'password_confirmation' => 'required' 
            );   
        $validator = Validator::make($data, $rules);
        if($validator->passes()){
            return 'Data was saved';
        }
        
        return Redirect::to('/')->withErrors($validator);
    }
}