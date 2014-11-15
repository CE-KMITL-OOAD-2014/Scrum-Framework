<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Taskboard extends Eloquent {

    protected $collection = 'taskboards';
    protected $connection = 'mongodb';

    /*	Update taskboard when angularJS post to SprintnameController
		Delete, Create new Array and Assign board values.*/
    public function updateboard($data){
        $this->delete('list0');
        $this->unset('list0');

        $this->delete('list1');
        $this->unset('list1');

        $this->delete('list2');
        $this->unset('list2');

        $this->delete('list3');
        $this->unset('list3');

        $this->list0 = array();
        $this->list1 = array();
        $this->list2 = array();
        $this->list3 = array();

        $this->list0 = $data['list0'];
        $this->list1 = $data['list1'];
        $this->list2 = $data['list2'];
        $this->list3 = $data['list3'];
        $this->save();
    }
}


