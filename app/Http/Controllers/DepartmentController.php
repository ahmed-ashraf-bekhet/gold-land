<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();

        return view('admin.department.index', ['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $department = Department::create($request->only([
            'title_en',
            'title_ar',
        ]));

        return redirect()->back()->with(['success'=>__('Created Successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);

        if (!$department) 
            return entityNotFound();

        return new DepartmentResource($department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        if (!$department) 
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        return view('admin.department.edit', ['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::find($id);

        if (!$department) 
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        $department->update($request->only([
            'title_en',
            'title_ar',
        ]));

        return redirect()->back()->with(['success' => __('Updated Successfully') ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        if (!$department) 
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);
        // Session::flash('message', "Special message goes here");

        $department->delete();

        return redirect()->back()->with(['success' => __('Deleted Successfully') ]);
    }
}
