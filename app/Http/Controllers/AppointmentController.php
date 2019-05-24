<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class AppointmentController extends Controller
{
    public function insertFollowups(Request $request){
        $data = DB::table('phpatients')->where(["id"=>$request->id])->get();
        return view('insertFollowups',compact('data'));
    }

    public function insertPatientFollowups(Request $request){
        $Validator = Validator::make($request->all(),[
            "register"=>"required",
            "customerName"=>"required",
            "appointment"=>"required"
        ],[
            "register.required"=>"Patientid should be filled",
            "appointment.required"=>"Appointment should be filled"
        ]);
        if($Validator->fails()){
            return redirect("insertFollowups")->withErrors($Validator);
        }else{
        $data = DB::table('phappointments')->insert(
            ["registration"=>$request->register, "customerName"=>$request->customerName, "Followup"=>$request->appointment,"nepaliAppo"=>$request->NepaliAppo,"Remarks"=>$request->remarks]
        );
    }
        if($data){
            $inserted = "Record inserted";
            return view('insertAppointments',compact('inserted'));
        }
        else{
            $inserted = "Record could not be inserted";
            return view('insertAppointments',compact('inserted'));
        }
    }

    public function patientAppointment(){
        $data = DB::table('phappointments')->get();
        $i=0;
        return view('patientAppointment',compact('data','i'));
    }
    public function diagnosis(){
        return view('diagnosis');
    }
    public function editAppointments(Request $request){
        $Validator = Validator::make($request->all(),[
            "Followup"=>"required"
        ],
        [
            "Followup.required"=>"Appointment should be filled"
        ]
    );
        if($Validator->fails()){
            return redirect("editPatientAppointments")->where(['id'=>$request->id])->withErrors($Validator);
        }else{
            $data = DB::table('phappointments')->where(["id"=>$request->id])->update(
                ["Followup"=>$request->Followup, "nepaliAppo"=>$request->nepaliAppo,"Remarks"=>$request->remarks]
            );
        }
        
        if($data){
            $updated = "Table has been updated";
            return view("appointmentUpdateMessage",compact("updated"));
        }
        else{
            $updated = "Table could not be updated";
            return view("appointmentUpdateMessage",compact("updated"));
        }
    }

    public function deleteAppointments(){
        $data = DB::table('phappointments')->get();
        $i=0;

        return view('deleteAppointments',compact('data','i'));
    }

    public function editAppointmentForm(Request $request){
        $data = DB::table('phappointments')->where(["id"=>$request->id])->get();
        $i=0;
        return view('editAppointmentForm',compact('data','i'));
    }

    public function deleteAppointmentForm(Request $request){
        $data = DB::table('phappointments')->where(["id"=>$request->id])->delete();
            $deleted = "Row has been deleted";
            return view("deleteAppointmentsMessage", compact("deleted"));
    }
    public function fanda(Request $request){
        $status = DB::table('phstatuses')->get();
        $types = DB::table('phtypes')->get();
        $id = $request->id;
        $name = $request->name;
        $register = $request->register;
        return view('fanda',compact('id','name','register','status','types'));
    }

    public function fillFanda(Request $request){
        $exists = DB::table('fandas')->where(['Registration'=>$request->register])->first();
        if(!$exists){
        $data = DB::table('fandas')->insert(["Registration"=>$request->register,"appointment"=>$request->appointment, "refer_idType"=>$request->fanda,"refer_idSta"=>"issued","remarks"=>$request->remarks]);
        $customer = DB::table('phpatients')->where(["register"=>$request->register])->get();

        if($data){
        $patient = DB::table('fandas')->where(["Registration"=>$request->register])
                ->join('phtypes','phtypes.id','=','fandas.refer_idType')
                ->select('fandas.*','phtypes.types')
                ->get();
    
            return view('fandaMessage', compact('patient','customer'));
        }
    
    }
}
    public function showStatus(Request $request){
        $customer = DB::table('phpatients')->where(["register"=>$request->register])->get();
        $patient = DB::table('fandas')->where(["Registration"=>$request->register])
                ->join('phtypes','phtypes.id','=','fandas.refer_idType')
                ->select('fandas.*','phtypes.types')
                ->get();            
        
                return view('fandaMessage', compact('patient','customer'));
    }
}
