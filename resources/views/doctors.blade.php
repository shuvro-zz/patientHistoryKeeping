@extends('layouts.app')

@section('doctorForm')
    <body>
            @if($errors->any())
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif
        <table class="table">
            <tr>
                
            </tr>
            <form action='insertDoctorDetails' method="post">
                {{csrf_field()}}
                <tr>
                    <td>Refer Doctor</td>
                    <td><input type="text" name="referDoctor" /></td>
                    <td><input type="submit" name="insertDoctor" value="insert" /></td>
                </tr>
            </form>
        </table>
    
    </body>
@endsection