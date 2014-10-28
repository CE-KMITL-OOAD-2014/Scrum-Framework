<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Taskboard extends Eloquent {

    protected $collection = 'taskboards';
    protected $connection = 'mongodb';
/*
    public function authorizedUsers()
    {
        return $this->belongsToMany('User', null, 'taskboards', 'authedusers');
    }
      public function teams()
    {
        return $this->belongsToMany('Team', null, 'taskboards', 'teams');
    }
*/
    

}
