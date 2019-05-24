<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use app\Phpatient;

class PatientController extends Controller
{
    public function patient(){
        $patients = DB::table('phpatients')->get();
        $i = 0;
        foreach($patients as $parent=>$child){
            $doc = DB::table('referdoctors')->where(['id'=>$child->refer_idDoc])->get();
            $hos = DB::table('referhospitals')->where(['id'=>$child->refer_idHos])->get();
            $dia = DB::table('diagnoses')->where(['id'=>$child->refer_idDia])->get();
        }
        return view('patient',compact('patients', 'i','doc','hos','dia'));
}

    public function insertPatientDetails(){
        $data = DB::table('phpatients')->get();
        $diagnosis = DB::table('diagnoses')->get();
        $referDoctor = DB::table('referdoctors')->get();
        $referHospital = DB::table('referhospitals')->get();
        if ($data->isEmpty()) {
            $registration = 101;
         }else{
                $data = DB::table('phpatients')->orderBy('created_at','DESC')->first();
                $registration = $data->register;
                $registration++;
         }                    
        
        return view('insertPatientDetails',compact('registration','diagnosis','referDoctor','referHospital'));
    }
    public function insertPatient(Request $request){
        $Validator = Validator::make($request->all(),[
            "customerName"=>"required|unique:phpatients"
        ],[
            "customerName.required"=>$request->customerName. "already exists in the database"
        ]);
        if($Validator->fails()){
            return redirect("insertPatientDetails")->withErrors($Validator);
        }else{
            if($request->appointmentDate !=""){
                DB::table('fandas')->insert(["Registration"=>$request->registration,"appointment"=>$request->appointmentDate, "refer_idType"=>"1","refer_idSta"=>"issued","remarks"=>$request->remarks]);
            }
            $data = DB::table('phpatients')->insert(
                ["customerName"=>$request->customerName, "gender"=>$request->gender, "age"=>$request->age,
                "remarks"=>$request->remarks, "refer_idDoc"=>$request->referDoctor, "refer_idHos"=>$request->referHospital,
                "refer_idDia"=>$request->diagnosis, "appointmentDate"=>$request->appointmentDate,
                "register"=>$request->registration]
            );
        }
        if($data){
            $patients = DB::table('phpatients')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->where('phpatients.customerName','LIKE','%'.$request->customerName. '%')
                ->select('phpatients.*','referdoctors.referDoctors','referhospitals.referHospitals','diagnoses.diagnosis')
                ->get();
            return view('insertMessage', compact('patients'));
        }
        else{
            $inserted = "Row could not be inserted";
            return view('insertMessage', compact('inserted'));
        }
    }
    public function editPatientForm(){
        $data = DB::table('phpatients')->get();
        $i = 0;
        return view('editPatientForm',compact('data','i'));
    }

    public function editPatient(Request $request){
        $Validator = Validator::make($request->all(),[
            "customerName"=>"required",
            "gender"=>"required",
            "age"=>"required"
        ]);
        if($Validator->fails()){
            return redirect("editPatientForm")->withErrors($Validator);
        }else{
            $data = DB::table('phpatients')->where(["id"=>$request->id])->update(
                ["customerName"=>$request->customerName, "gender"=>$request->gender, "age"=>$request->age,
                 "remarks"=>$request->remarks, "diagnosis"=>$request->diagnosis, "referDoctor"=>$request->referDoctor, 
                 "referHospital"=>$request->referHospital, "register"=>$request->registration]
            );
        }
        
        if($data){
            $updated = "Table has been updated";
            return view("updateMessage",compact("updated"));
        }
        else{
            $updated = "Table could not be updated";
            return view("updateMessage",compact("updated"));
        }
    }

    public function deleteForm(){
        $data = DB::table('phpatients')->get();
        return view('deleteForm',compact('data'));
    }

    public function deletePatient(Request $request){
        $data = DB::table('phpatients')->where(["id"=>$request->id])->delete();
            $deleted = "Row has been deleted";
            return view("deleteMessage", compact("deleted"));
        }

   
    public function searchPatient(Request $request){
        if($request->choice == 'Name'){        
        $data = DB::table('phpatients')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->where('phpatients.customerName','LIKE','%'.$request->search. '%')
                ->select('phpatients.*','referdoctors.referDoctors','referhospitals.referHospitals','diagnoses.diagnosis')
                ->paginate(10);
        }
        elseif($request->choice == 'Registration Number'){
                $data = DB::table('phpatients')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->where('phpatients.register','LIKE','%'.$request->search. '%')
                ->select('phpatients.*','referdoctors.referDoctors','referhospitals.referHospitals','diagnoses.diagnosis')
                ->paginate(10);
    }
        return view('searchPatient', compact('data'));
}
}



