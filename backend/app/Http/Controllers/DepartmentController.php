<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the departments
        $departments = Department::all();

        return view('department.index', [ 'departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //@TODO: Authentication ADMIN CAN ONLY DO THIS
        //@TODO: validate (read laravel validation)
        //@TODO: check how redirection works

        $department = new Department();
        $department->name =  Input::get('name');
        $department->save();

        // redirect
//        Session::flash('message', 'Successfully created department!');
        return Redirect('admin/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the department
        $department = Department::find($id);

        return view('department.show', [ 'department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the department
        $department = Department::find($id);

        return view('department.edit', [ 'department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //@TODO: validate (read laravel validation)
        //@TODO: check how redirection works

        $department = Department::find($id);
        $department->name =  Input::get('name');
        $department->save();

        // redirect
//        Session::flash('message', 'Successfully created department!');
        return Redirect('admin/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $department = Department::find($id);
        $department->delete();

        return Redirect::to('admin/department');
    }
}
