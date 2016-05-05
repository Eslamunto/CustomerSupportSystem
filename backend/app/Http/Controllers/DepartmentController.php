<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Facades\Session as Session;

class DepartmentController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the departments
        if(Auth::user()->role == 0) {
            $departments = Department::all();

            return view('department.index', ['departments' => $departments, ]);
        }
        else {
            return redirect('/admin');
        }
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
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/department')
                ->withErrors($validator);
        } else {
            $department = new Department();
            $department->name =  Input::get('name');
            $department->save();

            Session::flash('message', 'Department  ' . $request->name . ' was created Successfully !');
            return Redirect('admin/department');
        }
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

        return view('admin.department.show', [ 'department' => $department]);
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

        return view('admin.department.edit', [ 'department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/department')
                ->withErrors($validator);
        }
        else {
            $department = Department::find($id);
            $department->name = Input::get('name');
            $department->save();

            // redirect
//        Session::flash('message', 'Successfully created department!');

            return Redirect('admin/department');
        }
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
    public function getDepartments(){
        $departments = Department::all();
        return $departments->toJson();
    }
}
