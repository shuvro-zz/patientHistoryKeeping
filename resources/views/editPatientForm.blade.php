@extends('layouts.app')

@section('editPatient')

<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
        <table class="table">
            <tr>
                <td>S. No.</td>
                <td>Registration</td>
                <td>CustomerName</td>
                <td>Gender</td>
                <td>Age</td>
                <td>Refer Hospital</td>
                <td>Refer Doctor</td>
                <td>Diagnosis</td>
                <td>Remarks</td>
            </tr>
            @foreach($data as $key=>$value)
            <form action='editPatient' method="POST">
                {{csrf_field()}}
                <tr>                        
                    <td>{{++$i}}</td>           
                    <td>{{$value->register}}</td>         
                    <td><input type="text" name="customerName" value={{$value->customerName}} /></td>
                    <td><input type="text" name="gender" value={{$value->gender}} /></td>
                    <td><input type="number" name="age" value={{$value->age}} /></td>
                    <td><input type="text" name="referHospital" value={{$value->referHospital}} /></td>
                    <td><input type="text" name="referDoctor" value={{$value->referDoctor}} /></td>
                    <td><input type="text" name="diagnosis" value={{$value->diagnosis}} /></td>
                    <td><input type="text" name="remarks" value={{$value->remarks}} /></td>
                    <input type="hidden" name="id" value={{$value->id}} />
                    <input type="hidden" name="registration" value={{$value->register}} />
                    <td><input type="submit" name="submit" value="edit" /></td>
                </tr>
            </form>
            @endforeach
        </table>
    
    </body>

@endsection