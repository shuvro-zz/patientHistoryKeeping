@extends('layouts.app')

@section('insertPatientAppointments')
@if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
<table class="table">
        <tr>
            <td>Registration</td>
            <td>Customer Name</td>
            <td>Followup</td>
            <td>NepaliAppo</td>
            <td>Remarks</td>
        </tr>
        @foreach($data as $key=>$value)
        <form action="insertPatientFollowups" method="POST">
            {{csrf_field()}}
            <tr>
                <td>{{$value->register}}</td>
                <td>{{$value->customerName}}</td>
                <td><input type="date" name="appointment" /></td>
                <td><input type="text" name="NepaliAppo" /></td>
                <td><input type="text" name="remarks" /></td>
                <input type="hidden" name="register" value={{$value->register}} />
                <input type="hidden" name="customerName" value={{$value->customerName}} />
                <td><input type="submit" name="submit" value="insert" /></td>
            </tr>
        </form>
        @endforeach
</table>
@endsection