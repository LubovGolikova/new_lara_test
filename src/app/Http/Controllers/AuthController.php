<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;
//use Validator;
class AuthController extends Controller
{
    private $userService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->userService = $userService;
    }

//    /**
//     * Get a JWT via given credentials.
//     *
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function login(Request $request){
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|email',
//            'password' => 'required|string|min:6',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json($validator->errors(), 422);
//        }
//
//        if (! $token = auth()->attempt($validator->validated())) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
//
//        return $this->createNewToken($token);
//    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
   public function register(UserRequest $request) {
       //return response()->json('xvxcvxcv!@!!@');

   //public function register(Request $request) {

  //     $requestValidated = Request::createFrom($request, new UserRequest());

//       return response()->json('xvxcvxcv');


//        $validator = Validator::make($request->all(), [
//            'username' => 'required|string|between:2,100',
//            'email' => 'required|string|email|max:100|unique:users',
//            'avatar_path' =>['required','mimes:jpeg,bmp,png'],
//            'password' => 'required|string|confirmed|min:6',
//        ]);
//
//        if($validator->fails()){
//            return response()->json($validator->errors()->toJson(), 400);
//        }
//
//        $user = User::create(array_merge(
//            $validator->validated(),
//            ['password' => bcrypt($request->password)]
//        ));
//
//        return response()->json([
//            'message' => 'User successfully registered',
//            'user' => $user
//        ], 201);

/////////////////
///
       $validated = $request->validated();

        $user = $this->userService->create($validated);
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);

  }

}
