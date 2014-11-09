<?php
    use core\validator\UserValidator as UserValidator;
    namespace core;
    class UserRepository implements IUserRepository{
        public function getAllUsers()
        {
            return User::all();
        }
        public function getUserById($id)
        {
            return User::find($id);
        }
        public function create($input)
        {
            $validator = new UserValidator;
            $validator.validate($input);
            if($validator->fails()) {
                $messages = $validator->messages();
                return Redirect::to('/')->withErrors($validator->getMessageArray());
            }
            else {
                $userEloquent = new User;
                $userEloquent->email = $user->email;
                $userEloquent->password = Hash::make($user->password);
                $userEloquent->save();
                return "Registration Successful";
            }
        }
    }
