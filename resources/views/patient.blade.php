@extends('layouts.app')

@section('patient')

<body>
    <table class="table">
        <tr>
            <td>S.No</td>
            <td>Registration</td>
            <td>CustomerName</td>
            <td>Gender</td>
            <td>Age</td>
            <td>Refer Hospital</td>
            <td>Refer Doctor</td>
            <td>Diagnosis</td>
            <td>appointment Date</td>
            <td>Registered Date</td>
            <td>Updatded Date</td>
            <td>Remarks</td>
        </tr>
        @foreach($patients as $key=>$value)
        <form action="insertFollowups" method="GET">
        <tr>
            <td>{{++$i}}</td>
            <td>{{$value->register}}</td>
            <td>{{$value->customerName}}</td>
            <td>{{$value->gender}}</td>
            <td>{{$value->age}}</td>
            <td>@foreach($hos as $key=>$result)
            {{$result->referHospitals}}
                @endforeach
            </td>
            <td>
                @foreach($doc as $key=>$result)
            {{$result->referDoctors}}
                @endforeach
            </td>
            <td>
                @foreach($dia as $key=>$result)
            {{$result->diagnosis}}
                @endforeach
            </td>
            <td>{{$value->appointmentDate}}</td>
            <td>{{$value->created_at}}</td>
            <td>{{$value->updated_at}}</td>
            <td>{{$value->remarks}}</td>
            <input type="hidden" name="id" value={{$value->id}} />
            <td><input type="submit" name="followup" value="Followup" /></td>
        </tr>
        </form>
        @endforeach
    </table>


</body>
@endsection