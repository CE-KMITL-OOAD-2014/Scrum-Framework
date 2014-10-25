<?php

class TeamController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        $data = Input::all();
        $name = Input::get('teamname');
        $rules = array(
            'teamname' => 'required|min:3|max:64'
        );
        $validator = Validator::make($data, $rules);

        if($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::to('/')->withErrors($validator);
        }
        else
        {
            $team = new Team;
            $team->name = Input::get('teamname');
            $creator = Auth::user();
            $team->master = $creator->_id;
            $team = $creator->teams()->save($team);
            $team->save();

            return Redirect::route('main');
        }
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
