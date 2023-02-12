<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotofocation;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Notification;

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

    public function updatedoctor($id){
        $data = Doctor::find($id);

        return view('admin.update_doctor', compact('data'));
    }

    public function editdoctor(Request $request, $id){
        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage',$imagename);

            $doctor->image=$imagename;
        }

        $doctor->save();

        return redirect()->back()->with('message','Doctor edited Succesful!');

    }

    public function emailview($id){
        $data = Appointment::find($id);

        return view('admin.email_view', compact('data'));
    }

    public function sendemail(Request $request, $id){
        $data = Appointment::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::send($data, new SendEmailNotofocation($details));

        return redirect()->back()->with('message','Notificartion Send Successful!');


    }
}
