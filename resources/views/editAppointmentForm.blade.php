@extends('layouts.app')

@section('editPatientAppointments')
<table class="table">
        <tr>
            <td>S.No</td>
            <td>Registration</td>
            <td>Customer Name</td>
            <td>Followup</td>
            <td>Nepali Appo</td>
            <td>Remarks</td>
        </tr>
        @foreach($data as $key=>$value)
        <form action="editAppointments" method="POST">
            {{csrf_field()}}
            <tr>
                <td>{{++$i}}</td>
                <td>{{$value->registration}}</td>
                <td>{{$value->customerName}}</td>
                <td><input type="date" name="Followup" value={{$value->Followup}} /></td>
                <td><input type="text" name="nepaliAppo" value={{$value->nepaliAppo}} /></td>
                <td><input type="text" name="remarks" value={{$value->Remarks}} /></td>
                <input type="hidden" name="id" value={{$value->id}} />
                <td><input type="submit" name="submit" value="update" /></td>
            </tr>
        </form>
        @endforeach
</table
@endsection