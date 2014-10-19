<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Moloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $collection = 'users';
    protected $connection = 'mongodb';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function getAuthIndentifier() {
        // body...
        return $this->getKey();
    }
    public function getAuthPassword() {
        return $this->password;
    }
    public function getReminderEmail() {
        return $this->email;
    }
}
