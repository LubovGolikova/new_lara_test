<?php
namespace  App\Repositories;

use App\Models\Question;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function create(array $data)
    {
        $user = new User;

        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->avatar_path = isset($data['avatar_path']) ? $data['avatar_path'] : null;
        $user->password = Hash::make($data['password']);

        $creds = array();
        $creds["email"] =$user->email;
        $creds["password"] =$user->password;

        $user->remember_token = JWTAuth::attempt($creds);
        $user->save();

        return $user;
    }
}
