<?php
namespace  App\Repositories;

use App\Models\Question;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Facades\PayloadFactory;
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

        $factory = JWTFactory::customClaims([
            'sub'   => env('JWT_SECRET'),
        ]);
        $payload = $factory->make();
        $user->remember_token = JWTAuth::encode($payload);
        $user->save();

        return $user;
    }
}
