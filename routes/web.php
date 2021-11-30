<?php

use App\Models\Department;
use App\Models\Product;
use App\Models\Advertsment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use app\Http\Middleware\isAdmin;
use Illuminate\Http\Client\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('locale/{locale}',function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
})->name('switch.lang');  //add name to router

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/payment', 'ProductController@payment');
Route::post('/filterDate', 'OrderController@filterDate');
// Route::get('/home', 'HomeController@index');

Route::get('/fillData', function () {
    return view('fillData');
});


/*Route::get('/', function(){
    if(Auth::check()){
        if(Auth::User()->name == "admin"){
            return redirect('/departments');
        }
    }
    $products = Product::orderBy('created_at','DESC')->take(8)->with('karat')->get();
    // dd($products[0]->Karat->key);
    // $products = Product::with('karat')->get();
    // dd($products);
    $departments = Department::all();
    $advertsments = Advertsment::all();
    $prices = json_decode(file_get_contents('http://sabayiks.net/kw/public/api/feed'), true);
    foreach ($prices as $key => $value) {
        $prices[$key] = str_replace(',' , '', $value);
    }
    return view('welcome',compact('products','prices','departments'));
})->name('admin');*/

Route::middleware(['isAdmin'])->group(function () {
	Route::resources([
		'departments'		=> 'DepartmentController',
		'categories'		=> 'CategoryController',
		'karats'			=> 'KaratController',
		'products'			=> 'ProductController',
		'orders'			=> 'OrderController',
		'advertsments'		=> 'AdvertsmentController',
	]);
	Route::get('/orders', 'OrderController@index')->name('admin.orders.index');
});
Route::get('/filter/{dept_id}', 'ProductController@filter');



Route::get('/', function(){

function sendNotification(){
    $url ="https://fcm.googleapis.com/fcm/send";

    $fields=array(
        "to"=>'e3VDjTKUkzfGYgcR1mf0TD:APA91bFJHp30pq9ftE_5tMdHlo0YRERoHR0KXLXegjcFhMKPwIPyf2jUYxf_wEBe1EVEyXfRc7LUuRtSZ9oST_CBjalOy8dGTfA1R8dP0b7wepj3FKS3BxsesN3Ahe5__Ys_lMjLzHXM',
        "notification"=>array(
            "body"=>'hello',
            "title"=>'Sabayik',
            "icon"=>'https://firebasestorage.googleapis.com/v0/b/laravel-firebase-39c14.appspot.com/o/SAP%2Fbanner-item-05.jpg?alt=media&token=6ddbc2da-107a-4dca-89ee-7cf92c42b528',
            "click_action"=>"https://google.com"
        )
    );

    $headers=array(
        'Authorization: key=AAAAC3zd48o:APA91bEyRKDrDe9IGlO1iUBOz-nySaroeCFdjKUvDSnHYzopnWaELHr3nIkjqJzwfBGZyY4mLlNPkP7Q3QHQXvWVd2GkLCBR5s9_RLzPZPZNwVGikfPxaoLXiZ3rTl16RPh2sLDMvg5A',
        'Content-Type:application/json'
    );

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result=curl_exec($ch);
    print_r($result);
    curl_close($ch);
}
sendNotification();

});

Route::get('/notifications', function(){
    return view('admin.notifications.addNotification');
});


Route::get('/success', function () {
    return view('success');
});
Route::get('/error', function () {
    return view('error');
});

Route::get('/orderDetails/{flag}',function($flag){
    if($flag=='1'){
        return view('orderDetails');
    }
    return redirect('/');
});
Route::get('/prices/{key}', 'ProductController@get_current_price');
Route::get('payment/{id}', function ($id) {
    return view('payment');
});

Route::get('/socialMedia', function () {
    $obj = DB::table('socialMedia')->first();

});


Route::post('/socialMedia',function(Request $request){

    DB::table('social_medial_links')
    ->where('name', 'whatsapp')
    ->update([
        'link' => $request->whatsapp
    ]);
    DB::table('social_medial_links')
    ->where('name', 'facebook')
    ->update([
        'link' => $request->facebook
    ]);
    DB::table('social_medial_links')
    ->where('name', 'instgram')
    ->update([
        'link' => $request->instgram
    ]);
    DB::table('social_medial_links')
    ->where('name', 'twitter')
    ->update([
        'link' => $request->twitter
    ]);
    DB::table('social_medial_links')
    ->where('name', 'telegram')
    ->update([
        'link' => $request->telegram
    ]);
    DB::table('social_medial_links')
    ->where('name', 'youtube')
    ->update([
        'link' => $request->youtube
    ]);
});

Route::get('filtered_orders/{statusValue}','OrderController@filterStatus');

