{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')



<!DOCTYPE html>
<html>
    <head>
    
        <style>
            

            body{
                margin: 0;
                padding: 0;
                background: url('https://static-communitytable.parade.com/wp-content/uploads/2014/03/rethink-target-heart-rate-number-ftr.jpg') fixed;
                background-size: cover;  
                background-position: center;
                height:100%;      
            }
            font{
                font-size: 50px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
    </head>
    <body>
        @foreach($data as $key=>$value)
        <div style="position:absolute; top: 50%; left:50%;transform:translate(-50%,-50%)">
            {{'Welcome'.' '.$value->name}}
        </div>
        @endforeach
    
    </body>
</html>