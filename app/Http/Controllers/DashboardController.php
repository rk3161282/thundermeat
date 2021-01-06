<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use Session;
use Hash;
class DashboardController extends Controller
{
    /*
    * default method
    */
    public function index(Request $request){
   
        return view('admin/dashboard');

    }



}
