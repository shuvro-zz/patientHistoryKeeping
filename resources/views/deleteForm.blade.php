@extends('layouts.app')

@section('deleteForm')

<body>
        <table class="table">
            <tr>
                <td>Registration</td>
                <td>CustomerName</td>
                <td>Gender</td>
                <td>Age</td>
                <td>Remarks</td>
                <td>Diagnosis</td>
                <td>ReferDoctor</td>
                <td>ReferHospital</td>
            </tr>
            @foreach($data as $key=>$value)
            <tr>
                <td>{{$value->register}}</td>
                <td>{{$value->customerName}}</td>
                <td>{{$value->gender}}</td>
                <td>{{$value->age}}</td>
                <td>{{$value->remarks}}</td>
                <td>{{$value->diagnosis}}</td>
                <td>{{$value->referDoctor}}</td>
                <td>{{$value->referHospital}}</td>
                <form action="deletePatient" method="POST">
                    {{csrf_field()}}
                <input type="hidden" name="id" value="{{$value->id}}" />
                <td><input type="submit" name="submit" value="delete" /></td>
                </form>
            </tr>
    @endforeach
        </table>
    
    </body>

@endsection