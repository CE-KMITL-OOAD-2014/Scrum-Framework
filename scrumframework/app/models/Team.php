<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Team extends Eloquent {

    protected $collection = 'taskboards';
    protected $connection = 'mongodb';

    public function getT()
    {
        return $this;
    }

}
