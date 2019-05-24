@extends('layouts.app')

@section('hospitalsForm')
<body>
        @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <table class="table">
        <tr>
            
        </tr>
        <form action='insertHospitalDetails' method="post">
            {{csrf_field()}}
            <tr>
                <td>Refer Hospital</td>
                <td><input type="text" name="referHospital" /></td>
                <td><input type="submit" name="insertHospital" value="insert" /></td>
            </tr>
        </form>
    </table>

</body>
@endsection