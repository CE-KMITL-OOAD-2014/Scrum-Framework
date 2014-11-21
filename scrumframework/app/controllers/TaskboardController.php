<?php

class TaskboardController extends \BaseController {

    public function create()
    {
        //Get inout data.
        $data = Input::all();
        $boardname = Input::get('boardname');
        $team = Input::get('team');

        //Create rule for crate teams.
        $rules = array(
            'boardname' => 'required|min:1|max:32'
        );

        //Make validator
        $validator = Validator::make($data, $rules);

        //If fails redirect to /
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/')->withErrors($validator);
        }
        else{
            //Create new board. 
            $taskboard = new Taskboard;
            if($taskboard->store($data)){
                return Redirect::route('main');
            }else{
                return "Can't add board.";
            }
        }
    }

    //Get Boardname in Team.
    public function processGetTaskboard($tid=null, $bid=null)
    {
        $team = Team::find($tid);
        if($team===null){return 'No Team Found.';}
        $team = $team->taskboards()->find($bid); 
        $boardname = $team['name'];
        return $boardname; 
    }

    //Default access => Get board in JSON format, Have board id => show view.
    public function getTaskboard($tid=null, $bid=null)
    {
        if($bid==null)
        {
            $taskboards = Auth::user()->teams()->get();
            return Response::json($taskboards->toArray());
        }
        else
        {
            $boardname =  self::processGetTaskboard($tid, $bid);
            return View::make('login', array('boardname'=> $boardname,'boardid' => $bid, 'teamid' => $tid, 'email' => Auth::user()->email));
        }
    }


    public function deleteTaskboard($tid=null, $bid=null)
    {
        //DELETE FROM TASKBOARDS COLLECTIONS.
        $deletedtaskboard = Team::find($tid);
        $deletedtaskboard->deleteboard($bid);
        return Redirect::route('main');
    }

    public function getjsonboard($tid=null, $bid=null)
    {
        $taskboards = Auth::user()->teams()->get();
        $team=$taskboards->find($tid);
        $board = $team->taskboards->find($bid);
        return Response::json($board);
    }

     public function getjsonteam($tid=null, $bid=null)
    {
        $taskboards = Auth::user()->teams()->get();
        $team=$taskboards->find($tid);
        return Response::json($team);;
    }

}
