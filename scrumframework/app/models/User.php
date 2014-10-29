<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    //	protected $table = 'users';
    protected $collection = 'users';
    protected $connection = 'mongodb';


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function teams()
    {
        return $this->belongsToMany('Team', null, 'teamMembers', 'teams');
    }
    
    public function validate()
    {
        $data = Input::all();
         $rules = array(
        'email' => 'required|email|min:5|max:32|unique:users', //don't forget to add unique:users rule
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password' 
        );
         $validator = Validator::make($data, $rules);
        if ($validator->passes()) return true;
        $this->errors = $validator->messages();
        return false;
    }
}
