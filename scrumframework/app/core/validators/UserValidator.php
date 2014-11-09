<?php
    namespace core\validator;
    class UserValidator {
        private $rules;
        private $validator;
        public $messages;

        public function validate($input)
        {
            $rules = array(
            'email' => 'required|email|min:5|max:32|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
            );
            $validator = Validator::make($input, $rules);
            if ($validator->passes()) {
                return true;
            }
            $this->errors = $validator->messages();
            $this->messages = $validator->getMessageBag()->getMessages();
            return false;
        }

        public function getMessageArray()
        {
            return $validator->getMessageBag()->getMessage();
        }

        public function messages()
        {
            return $this->errors;
        }

        public function fails()
        {
            return $validator->fails();
        }

        public function passes()
        {
            return $validator->passes();
        }
    }
