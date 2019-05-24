@extends('layouts/app')

@section('diagnosisForm')
<body>
        @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <table class="table">
        <tr>
            
        </tr>
        <form action='insertDiagnosisDetails' method="post">
            {{csrf_field()}}
            <tr>
                <td>Diagnosis</td>
                <td><input type="text" name="diagnosis" /></td>
                <td><input type="submit" name="disgnosis" value="insert" /></td>
            </tr>
        </form>
    </table>

</body>
@endsection