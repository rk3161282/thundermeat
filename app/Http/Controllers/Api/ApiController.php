<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Sliders;
use App\Models\Category;
use App\Models\Shop;
use Validator;
use Log;
use DB;

class ApiController extends Controller
{
  public function __construct()
  {

  }
 
  /*
  * All Sliders Info
   * @return json
  */
  public function sliders(Request $request){
    $sliderInfo = Sliders::select('link')->where('published',1)->get();
    return response()->json(['status'=>200,"message"=>"Fetch all slider","data"=>$sliderInfo],200);
  }

  /*
  * All Categories List
   * @return json
  */
  public function categories(Request $request){
    $allcategorylist = Category::select('id','name','icon')->where('status',1)->get();
    return response()->json(['status'=>200,"message"=>"Fetch all Meat Categories","data"=>$allcategorylist],200);
  }

  /*
  * All Shops Details
   * @return json
  */

  public function shopslist(Request $request){
    $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
    // validate reuested payload is json type or not
    if ($data == null) {
        return response()->json(['status'=>400,"authenticate"=>false,"message"=>"No payload was found. Please refer to our API documentation."],200);
    }
    //Define the validation rules
    $rules = [
      'cat_id'=>''
    ];
    //Call validation
    $validator = Validator::make($data, $rules);
    //validation fails
    if($validator->fails()){
      Log::info('ApiController shoplist: Mandatory field validations failed.');
      return response()->json(['status'=>400,'message'=>'Mandatory field validation failed. Please check and re-submit.'],200);
    }

    $cat_id = $data['cat_id'];
    if(!empty($cat_id)){
      $allshoplist = Shop::select('*')->get();
    }else{
      $allshoplist = Shop::select('*')->get();
    }
    return response()->json(['status'=>200,"message"=>"Fetch all Meat Categories","data"=>$allshoplist],200);

  }

}
