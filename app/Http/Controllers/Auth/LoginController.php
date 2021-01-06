<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use Session;
use Hash;
class LoginController extends Controller
{
    /*
    * default method
    */
    public function index(Request $request){
   
        return view('auth/login');

    }

    /*
    * Register as a superadmin
    */

    public function register(Request $request){
   
        return view('auth/register');

    }





}
