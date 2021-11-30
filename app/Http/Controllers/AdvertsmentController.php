<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertsment;

class AdvertsmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertsments = Advertsment::get();
        return view('admin.advertsment.index', ['advertsments'=>$advertsments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertsment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adv = new Advertsment;
        $adv->image_url = $request->image_url;
        $adv->save();
        return redirect('/advertsments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertsment = Advertsment::find($id);

        if (!$advertsment)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);
        // Session::flash('message', "Special message goes here");

        $advertsment->delete();

        return redirect()->back()->with(['success' => __('Deleted Successfully') ]);
    }
}
