<?php

class TeamController extends \BaseController {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        $name = Input::get('teamname');
        $rules = array(
            'teamname' => 'required|min:3|max:64|unique:teams,name'
        );
        $validator = Validator::make($data, $rules);

     //   return json_encode($validator);
        if($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::to('main')->withErrors($validator);
        }
        else
        {
            $team = new Team;
            $team->name = Input::get('teamname');
            $team->master =  Auth::user()->email;
            $team =  Auth::user()->teams()->save($team);
            $team->save();
            return Redirect::route('main');
        }
    }

     public function getTeam($id=null)
    {
        if($id==null)
        {
            $teams = Auth::user()->teams()->get();
            return Response::json($teams->toArray());
        }
    /*    else
        {
            $taskboards = Taskboard::find($id);
            if($taskboards==null){return Redirect::route('404');}
            $boardname = $taskboards->name;
            //return View::make('login', array('boardname'=> $boardname));
            return View::make('login', array('boardname'=> $boardname,'boardid' => $id));
            //return 'boardname='.$boardname;
            //return Response::json($taskboards->toArray());
        }*/
    }

    public function adduser()
    {
         //Find Team for add role and member in team collection.
        $teamid = Input::get('teamid');
        $team = Team::find($teamid);
        $teammember = Input::get('emailmember');
        if($team->checkuser($teammember))
        {
            if(Input::get('role')=='po')
            {
                $team->addpo($teammember);
            }
            else if(Input::get('role')=='tm')
            {
                $team->addtm($teammember);
            }
            $team->addTeaminUsers($teammember,$teamid);
            $team->addUserInteamMembers($teammember,$teamid);
            
              return Redirect::to('/main');
        }
         

         //Find member in users collection for add team.
        return "Can't add this email.";
    }

    public function deletepo($tid, $poname)
    {
        //Delete in Teams Collection.
        $team = Team::find($tid);
        $team->deletepo($poname);
          $team->deleteInteamMembers($poname);
        //Delete in Users Collection.
         if(!($team->findInTm($poname) && ($team->findInMaster($poname))))
        {
            $user = User::where('email', $poname)->first();
            $user->deleteteams($poname);
        }
        return Redirect::to('/main');       
    }

      public function deletetm($tid, $tmname)
    {
        //Delete in Teams Collection.
        $team = Team::find($tid);
        $team->deletetm($tmname);
        $team->deleteInteamMembers($tmname);

        //Delete in Users Collection.
        if(!($team->findInPo($tmname) && ($team->findInMaster($tmname))))
        {
            $user = User::where('email', $tmname)->first();
            $user->deleteteams($tmname);
        }

        return Redirect::to('/main');       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
   public function show($id)
   {
        
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
