<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\Models\User;


class AuthController extends Controller
{
   /**
    * Create a new AuthController instance.
    *
    * @return void
    */
   public function __construct()
   {
     $this->middleware('jwt.verify', ['except' => ['login', 'register']]);
   }


   /**
    * Get a JWT via given credentials.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function login()
   {
        $credentials = request(['email', 'password']);

        $token = auth()->attempt($credentials);

        if($token === false){

            return response()->json(['error' => 'Unauthorized'], 401);

        }
        
        return $this->respondWithToken($token);

   }


   /**
    * Get the authenticated User.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function me()
   {
       return response()->json(auth()->user());
   }


   /**
    * Log the user out (Invalidate the token).
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function logout()
   {
       auth()->logout();

       return response()->json(['message' => 'Successfully logged out']);
   }


   /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function refresh()
   {
       return $this->respondWithToken(auth()->refresh());
   }


   /**
    * Get the token array structure.
    *
    * @param  string $token
    *
    * @return \Illuminate\Http\JsonResponse
    */
   protected function respondWithToken($token)
   {
       return response()->json([
           'access_token' => $token,
           'token_type' => 'bearer',
           'expires_in' => auth('api')->factory()->getTTL() * 60
       ]);
   }
	

   public function register(Request $request){
    	
	$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // notification("Gagal Register",$validator->errors()->toArray());
        // // print_r( $validator->errors()->toArray());
        // die();

	// if($validator->fails()){
    //     return response()->json([
    //         'status' => 'error',
    //         'success' => false,
    //         'error' =>
    //         $validator->errors()->toArray()
    //     ], 400);
    // }
		try{
	$user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
		
	return response()->json([
	    'message' => 'User created.',
            'user' => $user
        ]);	
    }catch(\Exception $e){
        notification("Gagal Register",$e);
        return response()->json([
            'message' => 'User failed created.',
            ],400);	

    
 }
   }
	
}