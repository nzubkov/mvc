<?php
/**
 * Company: Etton Group
 * User: zubkov.n
 * Date: 29.03.2020
 */

use PHPUnit\Framework\TestCase;
require dirname(dirname(__DIR__)) . './constants.php';
require ROOT_DIR . 'vendor/autoload.php';
require ROOT_DIR . 'bootstrap.php';

class RegistrationTest extends TestCase
{
    public function testController()
    {
        $controller = new \controllers\UserController([
            'name' => 'Nikolay'
        ]);
        $this->assertInstanceOf(\controllers\UserController::class, $controller);
    }

    public function testSignUp()
    {
        $email = 'zubkov2@mail.ru';
        $controller = new \controllers\UserController([
            'name' => 'Nikolay',
            'age' => 32,
            'email' => $email,
            'password' => '1234567',
            'confirm_password' => '1234567'
        ]);
        $controller->signup();
        $this->assertNotNull(\models\User\User::where(['email' => $email]));
    }
}
