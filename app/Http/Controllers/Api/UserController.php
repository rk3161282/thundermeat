<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use App\Models\Users;
use Webpatser\Uuid\Uuid;
use Validator;
use DB;
use Log;

class UserController extends Controller
{
  public function __construct()
  {

  }
  /**
  * Use to provide login functionality
  * @param string $email
  * @param string $password
  * @return json
  */
  public function login(Request $request){
    $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
    // validate reuested payload is json type or not
    if ($data == null) {
        return response()->json(['status'=>400,"authenticate"=>false,"message"=>"No payload was found. Please refer to our API documentation."],200);
    }
    //Define the validation rules
    $rules = [
      'email'=>'required|email',
      'password'=>'required',
    ];
    //Call validation
    $validator = Validator::make($data, $rules);
    //validation fails
    if($validator->fails()){
      Log::info('UserController login: Mandatory field validations failed.');
      return response()->json(['status'=>400,'message'=>'Mandatory field validation failed. Please check and re-submit.'.print_r($validator->errors()->all(),true)],200);
    }
    //get email and password from $data
    $email = $data['email'];
    $password = $data['password'];
   // check whether user is found in a table -- User
    $user = Users:: where(['email'=>$email])->first();
    if(!$user){
        //user email not found
        return response()->json(['status'=>404,"message"=>"User was not found"],200);
    }else{
      //user email found-->next check for active
      if(!$user->status){
        //not active
        return response()->json(['status'=>403,"message"=>"User is disabled"],200);
      }else{
        //active-->next check for password
        $password = $this->validPassword($password,$user->password);
        if(!$password){
          //not matched password
          return response()->json(['status'=>401,"authenticate"=>false,"message"=>"User/Password combination is wrong"],401);
        }else{
          //matched password also (email)-->next get all roles
          
          $jwtToken = $this->jwt($user->email,$user->uuid);
          $user->updated_at = date("Y-m-d H:i:s");
          $user->token = $jwtToken;
          $user->save();
          $dataToInsert = [
            'uuid'=>$user->uuid,
            'access_token'=>$jwtToken,
            'disabled'=>0,
            'requestor_ip_address'=> $_SERVER['REMOTE_ADDR'],
            'created_at'=>date('Y-m-d H:i:s'),
            'last_used_at'=>date('Y-m-d H:i:s')
        ];
        //Store this access_token in the database table - user_access_tokens
        DB::table('user_access_tokens')->insert($dataToInsert);
          return response()->json(['status'=>200,"message"=>"Login Successfully","data"=>["uuid"=>$user->uuid,"token"=>$jwtToken,"role"=>$user->role,"name"=>$user->name,"email"=>$user->email,"phone"=>$user->phone]],200);
        }
      }
    }
  }

    /**
     * Validate password.
     *
     * @param string $inputPassworsd
     * @param string $storedPassword
     * @return boolean
     */
  public function validPassword($inputPassworsd,$storedPassword){
     return (md5($inputPassworsd)==$storedPassword)?true:false;
  }
    /**
     * Create a new token.
     *
     * @param  \App\User   $user
     * @return string
     */
  public function jwt($email, $uuid) {
      $payload = [
          'iss' => "thunder-meat", // Issuer of the token
          'sub' => [$email,$uuid], // Subject of the token
          'iat' => time(), // Time when JWT was issued.
          'exp' => time() + 60*60 // Expiration time
      ];

      // As you can see we are passing `JWT_SECRET` as the second parameter that will
      // be used to decode the token in the future.
      return JWT::encode($payload, env('JWT_SECRET'));
  }

   /**
  * Use to provide create functionality
  * @param string $name
  * @param string $email
   * @param string $phone
  * @param string $password
  * @return json
  */

  public function createAccount(Request $request){
    $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
    // validate reuested payload is json type or not
    if ($data == null) {
        return response()->json(['status'=>400,"authenticate"=>false,"message"=>"No payload was found. Please refer to our API documentation."],200);
    }
    //Define the validation rules password_confirmation
    $rules = [
      'name' => 'required|min:3|max:50',
      'email' => 'required|email',
      'phone' => 'required',
      'password' => 'required|confirmed|min:6',
      'role' => 'required',
    ];
    //Call validation
    $validator = Validator::make($data, $rules);
    //validation fails
    if($validator->fails()){
      Log::info('UserController Register: Mandatory field validations failed.');
      return response()->json(['status'=>400,'message'=>'Mandatory field validation failed. Please check and re-submit.'],200);
    }
   
    //get email and password from $data
    $name = $data['name'];
    $phone = $data['phone'];
    $email = $data['email'];
    $password = md5($data['password']);
    $role = $data['role'];
    //  //check user email or phone with specific role
    $user = Users::where(['email'=>$email,'role'=>$role])->first();
     if($user){
       return response()->json(['status'=>400,'message'=>'User Email Already exits.'],200);
     }
     $user = Users::where(['phone'=>$phone,'role'=>$role])->first();
     if($user){
       return response()->json(['status'=>400,'message'=>'User Phone Already exits.'],200);
     }
     $uuid = Uuid::generate()->string;
     $jwtToken = $this->jwt($email, $uuid);
   // check whether user is found in a table -- User
    $user = new Users();
    $user->uuid = $uuid;
    $user->name = $name;
    $user->email = $email;
    $user->phone = $phone;
    $user->password = $password;
    $user->role = $role;
    $user->status = 1; 
    $user->token = $jwtToken;
    $user->save();
    if(!$user){
      
        //user email not found
        return response()->json(['status'=>404,"message"=>"User not register yet"],200);
    }else{
        $dataToInsert = [
            'uuid'=>$uuid,
            'access_token'=>$jwtToken,
            'disabled'=>0,
            'requestor_ip_address'=> $_SERVER['REMOTE_ADDR'],
            'created_at'=>date('Y-m-d H:i:s'),
            'last_used_at'=>date('Y-m-d H:i:s')
        ];
        //Store this access_token in the database table - user_access_tokens
        DB::table('user_access_tokens')->insert($dataToInsert);
      return response()->json(['status'=>200,"message"=>"User Registration done","data"=>array("id"=>$user->id,"uuid"=>$user->uuid,"token"=>$jwtToken,"roles"=>$user->role,"name"=>$user->name,"email"=>$user->email,"phone_number"=>$user->phone)],200);
    }
  }

  /**
   * Handle user Logout process
   * @param  \Illuminate\Http\Request  $request
   * @return json
   */

  public function logout(Request $request){
    //get user token
    $token = $request->header('X-AUTH-TOKEN');
    $update = Users::where(['token'=>$token])->update(['token'=>'']);
    DB::table('user_access_tokens')->where('access_token',$token)->update(['disabled'=>1]);
    if($update){
      Log::info('UserController logout: user token '.$token.' logged out successfully.');
      return response()->json(['status'=>200,'message'=>'You have logout successfully'],200);
    }else{
      Log::info('UserController logout: user token '.$token.' failed to logged.');
      return response()->json(['status'=>500,'message'=>'Something went wrong. Please try again.'],200);
    }

  }

}
