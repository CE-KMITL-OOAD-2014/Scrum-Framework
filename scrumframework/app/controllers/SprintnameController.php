<?php

class SprintnameController extends BaseController {

    /*Store List from AngularJS to MongoDB
    List0 => Product Backlog.
    List1 => To DO.
    List2 => Doing.
    List3 => Done.*/
    public function store()
    {
        $data = Input::all();
        $team = Team::find($data['team']);
        $board = $team->taskboards();
        $boardid = $data['board'];
        
        $currentboard = $board->find($data['board']);
        $currentboard->updateboard($data);
    }

}
