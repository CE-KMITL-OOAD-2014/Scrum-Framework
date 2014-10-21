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
        $rules = array(
            'name' => 'required|min:1|max:64';
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/taskboard')->withErrors($validator);
        }

        else {
            $taskboard = new Taskboard;

            $taskboard->name = Input::get('name');

            $taskboard->save();

            return 'Taskboard was saved';
        }
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
