<?php
/**
 * Company: Etton Group
 * User: zubkov.n
 * Date: 29.03.2020
 */

namespace services;


use models\User;
use Rakit\Validation\Validator;

class UserRegistrationService
{
    public $errors = [];

    public function run($data)
    {
        $validation = (new Validator())->validate($data, [
            'name' => 'required',
            'email' => 'required|email',
            'password'              => 'required|min:6',
            'confirm_password'      => 'required|same:password',
//            'avatar'                => 'required|uploaded_file:0,300M,png,jpeg',
        ]);
        $validation->setMessages([
            'name' => 'Имя',
            'required' => ':attribute не заполнено',
            'email' => ':email Некорректный email',
            'same' => 'Пароли не совпадают',
//            'uploaded_file' => 'Картинка для аватара должна быть в формате загружена в
//            формате png или jpg и размером не более 300 мегабайт'
        ]);
        if ($validation->fails()) {
            $this->errors = $validation->errors->all();
            return false;
        }
        User\User::create($data);
        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}