<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class SuperAdminController extends Controller
{
  //
  public function dashboard()
  {
    return view('superadmin.dashboard');
  }
  public function logout(Request $request)
  {
    $request->session()->flush();
    return redirect('login');
  }

  public function departmentcreate()
  {
    $e = Employee::all();
    return view('superadmin.createdepartment', compact('e'));
  }
  public function makedepartment(Request $r)
  {
    $d = new Department();
    $d->name = $r->name;
    $d->aliase = $r->aliases;
    if ($d->save()) {
      return redirect()->back()->with('success', "Successfully create new department");
    } else {
      return redirect()->back()->with('fail', "Failed to create new department");
    }
  }
  public function editdepartment($id)
  {
    $e = Employee::all();
    $d = Department::find($id);
    return view('superadmin.editdepartment', compact('d'));
  }
  public function updatedepartment(Request $r, $id)
  {
    $d = Department::find($id);
    $d->name = $r->name;
    $d->aliase = $r->aliases;
   
    if ($d->save()) {
      return redirect()->back()->with('success', "Successfully update new department");
    } else {
      return redirect()->back()->with('fail', "Failed to update new department");
    }
  }
  public function deletedepartment($id)
  {
    Department::find($id)->delete();
    return redirect('admin/viewdepartment');
  }
  public function showdepartment()
  {
    $d = Department::all();
    return view('superadmin.seealldepartment', compact('d'));
  }
  public function showemployee()
  {
    $d = Employee::all();
    return view('superadmin.seeallemp', compact('d'));
  }
  public function accept($id){
    $e=Employee::find($id);
    if($e->verified && !($e->status)){
        $e->status=true;
        $e->save();
        return redirect()->back()->with('succcess','Accept the user successfully');
    }else{
        return redirect()->back()->with('failed','User not verified the email yet');
    }
  }
  public function delete($id)
  {
    Employee::find($id)->delete();
    return redirect('admin/showemployee');
  }

  public function viewteacher($id){
    $d=Department::find($id);
    $e=Employee::where('department','=',$d->name)->get();
    return view('superadmin.assignadmin',compact('e'));
  }
  public function editrole($id){
    $e=Employee::find($id);
    $e->role='Department Admin';
    if($e->save()){
      return redirect()->back()->with('succcess','Change the role successfully');
    }else{
      return redirect()->back()->with('fail','Fail to Change the role');
    }
  }
  public function updaterole($id){
    $e=Employee::find($id);
    $e->role='teacher';
    if($e->save()){
      return redirect()->back()->with('succcess','Change the role successfully');
    }else{
      return redirect()->back()->with('fail','Fail to Change the role');
    }
  }
}
