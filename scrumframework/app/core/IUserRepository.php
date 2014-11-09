<?php
    namespace core;
    interface IUserRepository {
        public function getAllUsers();
        public function getUserById($id);
        public function create($input);
    }
