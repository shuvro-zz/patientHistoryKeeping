@extends('layouts.app')

@section('searchPatient')
 <body>
    <table class="table">
            <tr>
                <td>S.No</td>
                <td>Registration</td>
                <td>CustomerName</td>
                <td>Gender</td>
                <td>Age</td>
                <td>Appointment Date</td>
                <td>Refer Doctor</td>
                <td>Refer Hospital</td>
                <td>Diagnosis</td>
                <td>Remarks</td>
            </tr>
    @foreach($data as $key=>$value)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$value->register}}</td>
                <td>{{$value->customerName}}</td>
                <td>{{$value->gender}}</td>
                <td>{{$value->age}}</td>
                <td>{{$value->appointmentDate}}</td>
                <td>{{$value->referDoctors}}</td>
                <td>{{$value->referHospitals}}</td>
                <td>{{$value->diagnosis}}</td>
                <td>{{$value->remarks}}</td>
                <form action="fanda" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$value->id}}" />
                    <input type="hidden" name="register" value="{{$value->register}}" />
                    <input type="hidden" name="name" value="{{$value->customerName}}" />
                <td><input type="submit" name="submit" value="Appointment/Followup" /></td>
                </form>
                <form action="showStatus" method="post">
                        {{csrf_field()}}
                    <input type="hidden" name="register" value="{{$value->register}}" />
                    <td><input type="submit" name="submit" value="View" /></td>
                </form>
            </tr>
    @endforeach
        </table> 
    </body>
    {{ $data->appends(request()->except('page'))->links() }}
@endsection