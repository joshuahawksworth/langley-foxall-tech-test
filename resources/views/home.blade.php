@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                 
                </div>
            </div>

            <br>
            
            <form action="home" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <label>Your current prefered location: {{ $preferred_location }}</label>
                    </div>
                    <div  class="card-body">
                        <label>Change prefered location:</label>
                        <input type="text" id="preferred_location" name="preferred_location">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>

            <br>

            <a href="/weather" class="btn btn-primary"> View the weather for your prefered location</a>
        </div>
    </div>
</div>
@endsection
