@extends('layouts.app')

@section('insertMessage')
<body>
    @foreach($patients as $key=>$value)
    
        <div style="position:absolute; top:60%; left:50%; transform:translate(-50%,-50%)">                
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"> <strong>Registration</strong>&nbsp&nbsp&nbsp&nbsp {{$value->register}}</div><br>
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Customer Name </strong>&nbsp&nbsp&nbsp&nbsp {{$value->customerName}}</div><br>
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Gender</strong>&nbsp&nbsp&nbsp&nbsp {{$value->gender}}</div><br>
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Age</strong>&nbsp&nbsp&nbsp&nbsp {{$value->age}}</div><br>
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Refer Doctor</strong>&nbsp&nbsp&nbsp&nbsp {{$value->referDoctors}}</div><br>
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Refer Hospital</strong>&nbsp&nbsp&nbsp&nbsp {{$value->referHospitals}}</div><br>
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Diagnosis</strong>&nbsp&nbsp&nbsp&nbsp {{$value->diagnosis}}</div><br>
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Remarks</strong>&nbsp&nbsp&nbsp&nbsp {{$value->remarks}}</div><br>
        </div>
    @endforeach    
    </body>
@endsection