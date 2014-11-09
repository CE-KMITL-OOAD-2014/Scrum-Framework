<?php

use core\IUserRepository as IUserRepository;
class FormController extends BaseController
{
    protected $users;

    public function __construct(IUserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $data = Input::all();
        $this->users->create($data);
    }
}
