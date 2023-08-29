<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\SessionModel;
use App\Models\Semester;

class DepartmentAdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('departmentadmin.dashboard');
    }
    public function makesession()
    {
        $d = Department::all();
        return view('departmentadmin.makesession', compact('d'));
    }
    public function sessioncreate(Request $r)
    {
        $s = new SessionModel();
        $s->year = $r->year;
        $s->batch = $r->batch;
        $s->dept_id = $r->dept_id;
        if ($s->save()) {
            return redirect()->back()->with('success', 'You successfully create new session');
        } else {
            return redirect()->back()->with('fail', 'Failed to create new session');
        }
    }
    public function allsession()
    {
        $s = SessionModel::all();
        $d = Department::all();
        return view('departmentadmin.allsession', compact('s', 'd'));
    }
    public function editsession($id)
    {
        $s = SessionModel::find($id);
        $d = Department::all();
        return view('departmentadmin.editsession', compact('s', 'd'));
    }
    public function updatesession(Request $r, $id)
    {
        $s = SessionModel::find($id);
        $s->year = $r->year;
        $s->batch = $r->batch;
        $s->dept_id = $r->dept_id;
        if ($s->save()) {
            return redirect()->back()->with('success', 'successfully update new session');
        } else {
            return redirect()->back()->with('fail', 'Failed to update new session');
        }
    }
    public function deletesession($id)
    {
        SessionModel::find($id)->delete();
        return redirect('department/allsession');
    }

    public function createsemester()
    {
        $s = SessionModel::all();
        $d = Department::all();
        return view('departmentadmin.makesemester', compact('s','d'));
    }
    public function addsemester(Request $r)
    {
        $sem = new Semester();
        $sem->name = $r->name;
        $sem->session_id = $r->session_id;
        $sem->dept_id=$r->dept_id;
        if($sem->save()){
            return redirect()->back()->with('success', 'You successfully create new session');
        }else{
            return redirect()->back()->with('fail', 'Failed to create new session');
        }
    }
    public function showsemester(){
        $s = SessionModel::all();
        $sem =Semester::all();
        $d=Department::all();

        return view('departmentadmin.allsemester',compact('s','sem','d'));
    }
}
