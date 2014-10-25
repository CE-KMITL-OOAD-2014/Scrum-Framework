<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Team extends Eloquent {

    protected $collection = 'taskboards';
    protected $connection = 'mongodb';

    public function getTeam()
    {
        return $this;
    }

    public function teamMembers()
    {
        return $this->belongsToMany('User', null, 'teams', 'teamMembers');

    }

}
