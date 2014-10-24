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
        $rules = array(
            'boardname' => 'required|min:1|max:64'
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/')->withErrors($validator);
        }

        else {
            $taskboard = new Taskboard;
            $taskboard->name = Input::get('boardname');
            $currentUser = Auth::user();
            $taskboard = $currentUser->taskboards()->save($taskboard);
            $taskboard->save();

            $email = Auth::user()->email;
            Session::flash('email',$email);
            Session::flash('boardname',$boardname);
            return View::make('login')->withInput(Input::except('password'));
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
            $boardname = $taskboards->name;
            $boardid = $taskboards->_id;
            return View::make('login', array('boardname'=> $boardname,'boardid' => $boardid));
            //return 'boardname='.$boardname;
            //return Response::json($taskboards->toArray());
        }
    }

    public function getAuthorizedUser()
    {
        // TODO : [In Progress] query list of Taskboard Administrators
        $authedUsers =  Taskboard::first()->authorizedUsers;
        return Response::json($authedUsers);
    }

    public function deleteTaskboard()
    {
        // if($taskboard = null)
        //     $taskboard = Auth::user()->taskboards()->first()


        // return "TODO : delete taskboard, detach from user";
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
