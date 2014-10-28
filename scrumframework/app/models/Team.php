<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Team extends Eloquent {

    protected $collection = 'teams';
    protected $connection = 'mongodb';

    public function getTeam()
    {
        return $this;
    }

    public function teamMembers()
    {
        return $this->belongsToMany('User', null, 'teams', 'teamMembers');
    }
    /*
    public function taskboards()
    {
        return $this->belongsToMany('Taskboard', null, 'teams', 'taskboards');
    }
    */
      public function taskboards()
    {
        return $this->embedsMany('Taskboard');
    }
}
