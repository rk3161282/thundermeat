<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Log;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class JWTVerifierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $accessToken = $request->header('X-AUTH-TOKEN'); #custom header- jwt acess token
		//X-AUTH-TOKEN not provided in request 
        if(empty($accessToken)){
            LOG::info('JWTVerifierMiddleware: Authentication information  X-AUTH-TOKEN is missing or blank');
            return response()->json(['status'=>400,'message'=>'Authentication Information was not supplied.'],200);
        }
		//decode jwt-return 401 when unable to decode.
		try{
           $decoded = JWT::decode($accessToken, env('JWT_SECRET'), array('HS256'));
         }catch(\Exception $e){
			 return response()->json(['status'=>401,'message'=>'Unauthorised'],200);
         }
		 //valid signed token here-now check it is in our record and should not be disabled
		 $uuid = $decoded->sub[0];
		//  $result = DB::table('user_access_tokens')->where(['uuid'=> $uuid,'access_token'=>$accessToken,'disabled'=>0])->exists();
		//  if(!$result){
		// 	 return response()->json(['status'=>401,'message'=>'Unauthorised1'],200);
		//  }
		 DB::table('user_access_tokens')->where(['uuid'=> $uuid,'access_token'=>$accessToken,'disabled'=>0])->update(['last_used_at'=>date('Y-m-d H:i:s')]);
		return $next($request);
    }

}
