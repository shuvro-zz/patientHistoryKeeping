@extends('layouts.app')

@section('fandaMessage')
<body>
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%)">
        @foreach($patient as $key=>$value)
           <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"> <strong>Registration</strong>&nbsp&nbsp&nbsp&nbsp {{$value->Registration}}</div><br>
            @foreach($customer as $k=>$v)
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Patient Name</strong>&nbsp&nbsp&nbsp&nbsp {{$v->customerName}}</div><br>
                                @endforeach
                                <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Appointment Date </strong>&nbsp&nbsp&nbsp&nbsp {{$value->appointment}}</div><br>
                                <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Type</strong>&nbsp&nbsp&nbsp&nbsp {{$value->types}}</div><br>
                                <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Remarks</strong>&nbsp&nbsp&nbsp&nbsp {{$value->remarks}}</div><br>
            @endforeach
    </div>
 </body>
@endsection