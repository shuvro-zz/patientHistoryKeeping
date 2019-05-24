@extends('layouts.app')

@section('insertPatientDetails')
<body>
        @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <table class="table">
        <tr>
            
        </tr>
        <form action='insertPatient' method="GET">
            {{csrf_field()}}
            
                <input type="hidden" name="registration" value={{$registration}} />
            
            <tr>
                <td>CustomerName</td>
                <td><input type="text" name="customerName" /></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><select name="gender">
                    <option >Male</option>
                    <option >Female</option>
                    <option >Others</option>
                </select></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="number" name="age" /></td>
            </tr>
            <tr>
                <td>Refer Hospital</td>
                
                <td><select type="text" name="referHospital" >
                        @foreach($referHospital as $key=>$value)
                    <option value="{{$value->id}}">
                        {{$value->referHospitals}}
                    </option>

                    </option>
                    @endforeach
                    </select>
                </td>
                
            </tr>
            <tr>
                <td>Refer Doctor</td>
                <td><select type="text" name="referDoctor">
                    @foreach($referDoctor as $key=>$value)
                    <option value="{{$value->id}}">
                        {{$value->referDoctors}}
                    </option>
                    @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Diagnosis</td>
                <td><select type="text" name="diagnosis">
                        @foreach($diagnosis as $key=>$value)
                        <option value="{{$value->id}}">
                            {{$value->diagnosis}}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Appointment Date</td>
                <td><input type="datetime-local" name="appointmentDate" /></td>
            </tr>
            <tr>
                <td>Remarks</td>
                <td><textarea type="text" name="remarks" ></textarea></td>
            </tr>
                <td><input type="submit" name="submit" value="Register" /></td>
            </tr>
        </form>
    </table>

</body>
@endsection