<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Product;
use App\Models\Advertsment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::User()->name == "admin"){
                return redirect('/departments');
            }
        }
        $products = Product::with('karat')->orderBy('id', 'DESC')->get();
        $departments = Department::all();
        $advertsments = Advertsment::all();
        $prices = json_decode(file_get_contents('http://sabayiks.net/kw/public/api/feed'), true);
        foreach ($prices as $key => $value) {
            $prices[$key] = str_replace(',' , '', $value);
        }
        // dd($prices);
        return view('home',compact('products','prices','departments','advertsments'));
    }

    public function socialMedia(Request $request)
    {
    DB::table('social_media_links')
    ->where('name', 'whatsapp')
    ->update([
        'link' => $request->whatsapp
    ]);
    DB::table('social_media_links')
    ->where('name', 'facebook')
    ->update([
        'link' => $request->facebook
    ]);
    DB::table('social_media_links')
    ->where('name', 'instgram')
    ->update([
        'link' => $request->instgram
    ]);
    DB::table('social_media_links')
    ->where('name', 'twitter')
    ->update([
        'link' => $request->twitter
    ]);
    DB::table('social_media_links')
    ->where('name', 'telegram')
    ->update([
        'link' => $request->telegram
    ]);
    DB::table('social_media_links')
    ->where('name', 'youtube')
    ->update([
        'link' => $request->youtube
    ]);
    return redirect('/socialMedia');
    }
    }
