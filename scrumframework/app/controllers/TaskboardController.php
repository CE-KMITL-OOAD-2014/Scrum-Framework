<?php

class TaskboardController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Input::all();
        $boardname = Input::get('boardname');
        $team = Input::get('team');
        $rules = array(
            'boardname' => 'required|min:1|max:32'
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/')->withErrors($validator);
        }

        else {
            $taskboard = new Taskboard;
            $taskboard->name = Input::get('boardname');
            $taskboard->teams = Input::get('team');
          //  $teams = Team::all();
            $team = Team::find($taskboard->teams);
            //->taskboards()->save($team);
           // Team::find($taskboard->teams)->taskboards = $taskboard->_id;
            //$taskboard =  Team::find($taskboard->teams)->taskboards->save($taskboard);
         //   $taskboard = $team->taskboards()->save(array('taskboards' => $taskboard ));
         //   $taskboard =  $team->save($taskboard);
                           // $team=$team->save($taskboard);
        //   $taskboard=->taskboards->save($taskboard);
                $team = Auth::user()->teams()->save($team->taskboards());
              //  $team->taskboards = $taskboard->id;
               // $team->save();
          //  $team->save($taskboard->id);
       //     $team = $team->taskboards->save($taskboard);
          //  $team->taskboards = $team->save($taskboard);   //Yes

            $taskboard->save();

            $email = Auth::user()->email;
            Session::flash('email',$email);
            Session::flash('boardname',$boardname);
            //return View::make('login')->withInput(Input::except('password'));
           // return Response::json($team->toArray());
     //return var_dump($team);
           // return Redirect::route('main');
            return $team;
        }
    }

    public function getTaskboard($id=null)
    {
        if($id==null)
        {
            $taskboards = Auth::user()->taskboards()->get();
            return Response::json($taskboards->toArray());
        }
        else
        {
            $taskboards = Taskboard::find($id);
            if($taskboards==null){return Redirect::route('404');}
            $boardname = $taskboards->name;
            //return View::make('login', array('boardname'=> $boardname));
            return View::make('login', array('boardname'=> $boardname,'boardid' => $id));
            //return 'boardname='.$boardname;
            //return Response::json($taskboards->toArray());
        }
    }

    public function getAuthorizedUser()
    {
        // TODO : [In Progress] query list of Taskboard Administrators
        $authedUsers =  Taskboard::first()->authorizedUsers;
        return Response::json($authedUsers);
        // foreach( $authedUsers as $user)
        // {
        //     return $user;
        // }
    }

    public function deleteTaskboard($id=null)
    {
        //DELETE FROM TASKBOARDS COLLECTIONS.
        $deletedtaskboard = Taskboard::find($id);
        $deletedtaskboard->delete();

        //DELETE TASKBOARDS FIELD FROM USER COLLECTIONS.
        $user = Auth::user();
        $user->pull('taskboards',$id);

        return Redirect::route('main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
