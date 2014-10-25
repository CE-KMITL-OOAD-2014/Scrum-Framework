<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Taskboard extends Eloquent {

    protected $collection = 'teams';
    protected $connection = 'mongodb';

    public function authorizedUsers()
    {
        return $this->belongsToMany('User', null, 'taskboards', 'authedusers');
    }

}
