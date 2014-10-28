<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Taskboard extends Eloquent {

    protected $collection = 'taskboards';
    protected $connection = 'mongodb';

}
