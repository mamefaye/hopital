<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }

    public function upload(Request $request){
        $doctor=new Doctor;

        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage', $imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');

    }

    public function showappointment(){
        $data=Appointment::all();
        return view('admin.showappointment',compact('data'));
    }

    public function approved($id)
    {
        $data=Appointment::find($id);
        $data->status='approved';
        $data->save();

        return redirect()->back()->with('message', 'Appointment Approved!');
    }

    public function canceled($id){
        $data=Appointment::find($id);
        $data->status='canceled';
        $data->save();

        return redirect()->back()->with('message', 'Appointment Canceled!');
    }

    public function showdoctor(){
        $data = Doctor::all();

        return view('admin.showdoctor',compact('data'));
    }

    public function deletedoctor($id){
        $data = Doctor::find($id);
        $data->delete();

        return redirect()->back()->with('message','Doctor Canceled Succesful!');
    }
}
