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
        return $this->belongsToMany('User', 'email', 'teams', 'teamMembers');
    }
   
      public function taskboards()
    {
        return $this->embedsMany('Taskboard');
    }

    public function addpo($name)
    {
        if($this->po==null){
            $this->po = array($name);
        }
        else{
            $temp = $this->po;
            array_push($temp, $name);
            $this->po = $temp;   
        }
        $this->save();
        return true;
    }

     public function addtm($name)
     {
        if($this->tm==null){
            $this->tm = array($name);
        }
        else{
            $temp = $this->tm;
            array_push($temp, $name);
            $this->tm = $temp;   
        }
        $this->save();
        return true;
    }

    public function checkuser($name)
    {
        $check = User::where('email',$name)->get();
        if(User::where('email',$name)->get()!="[]")
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}
