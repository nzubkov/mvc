<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:41
 */
namespace models\User;
use Illuminate\Database\QueryException;
use models\Model;

class Users extends Model
{
    const ADULT_AGE = 18;
    protected $table = 'users';
    protected $fillable = ['email', 'password', 'name', 'age', 'avatar'];
    
    public static function create($userData)
    {
        $user = new self();
        $user->email = $userData['email'];
        $user->password = $userData['password'];
        $user->name = !empty($userData['name']) ? $userData['name'] : '';
        $user->age = $userData['age'];
        $user->avatar = !empty($userData['avatar']) ? $userData['avatar'] : '';
        try{
            $user->save();
        } catch (QueryException $exception){
            throw new UserException($exception->getMessage());
        }
    }

    public function getAll($sort = 'desc')
    {
        $users = self::orderBy('age', strtoupper($sort))->get();
        foreach ($users as $user) {
            $user->adult = self::isAdult($user->age) ? 'Совершеннолетний' : 'Несовершеннолетний';
        }
        return $users;
    }

    private static function isAdult($age)
    {
        return $age > self::ADULT_AGE;
    }

    public static function login($login, $password)
    {
        return self::where([
            ['email', '=', $login],
            ['password', '=' , $password]
        ]
        )->get()[0];
    }
}