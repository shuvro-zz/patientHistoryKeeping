@extends('layouts.app')

@section('fanda')
    <body>
        <table class="table">
            <form action="fillFanda" method="post">
                {{csrf_field()}}
                <tr>
                    <td>{{$register}}</td>
                    <td>Registration</td>
                </tr>
                <tr>
                    <td>Appointment/Followup Datetime</td>                    
                    <td><input type="datetime-local" name="appointment" /></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select type="text" name="fanda">
                            @foreach($types as $key=>$value)
                                <option value="{{$value->id}}">{{$value->types}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Remarks</td>
                    <td>
                        <textarea type="text" name="remarks"></textarea>
                    </td>
                    <input type="hidden" name="register" value={{$register}} />
                    <input type="hidden" name="name" value={{$name}} />
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="insert" /></td>
                </tr>
            </form>
        </table>
    </body>
@endsection