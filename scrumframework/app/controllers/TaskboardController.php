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
            $taskboard->name = Input::get('boardname');
            $taskboard->teams = Input::get('team');
            $taskboard->list0 = array();
            $taskboard->list1 = array();
            $taskboard->list2 = array();
            $taskboard->list3 = array();

            //Find teams that map team root.
            $team = Team::find($taskboard->teams);

            //Save taskboards into team.
            $taskboard = $team->taskboards()->save($taskboard);
            $taskboard->save();
            return Redirect::route('main');
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
        $deletedtaskboard = $deletedtaskboard->taskboards()->find($bid);
        $deletedtaskboard->delete();

        return Redirect::route('main');
    }

}
