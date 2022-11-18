<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $roles = Permission::orderBy('id','DESC')->paginate(5);
        return view('permission.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('permission.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'slug' =>'required'
        ]);
    
        $role = Permission::create(['name' => $request->input('name'),'slug' =>$request->input('slug')]);
    
        return redirect()->route('permission.index')
                        ->with('success','Permission created successfully');
    }
}
