<?php

class LoginController extends BaseController
{
    public function index()
    { 
        $credentials = Input::only('email', 'password');
        $remember = Input::has('remember');
        if (Auth::attempt($credentials)) {
            $email = Auth::user()->email;         
            Session::flash('email',$email);
        return Redirect::intended('main')->withInput(Input::except('password'));
        }
      //  $email = Input::flashExcept('password');
       return Redirect::to('/');
    }
}