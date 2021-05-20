@extends('layouts.app')
@section('content')
<style>
a.days{
    text-decoration: unset;
    color: black;
}
a.days .card:hover{
    margin-top: -5px;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($location_found == true)
                <div class="card">
                    <div class="card-header">{{ __('7 Weather Day Forcast ' . $message) }}</div>
                        <div class="card-body d-flex flex-wrap justify-content-center">
                        @for ($x = 0; $x <= 6; $x++)
                            <div class="col-md-3">
                                <a class="days" href="/weather/{{ strtolower($days_week[$x]) }}/{{ $x }}">
                                    <div class="card">
                                        <div class="card-header text-center h4 font-weight-bold">
                                            {{ __(ucwords($days_week[$x])) }}
                                        </div>
                                        <div class="card-body ">
                                            <div class="h5 text-center">
                                                {{ ucwords($response["daily"][$x]["weather"][0]["description"]) }}
                                            </div>
                                            <hr>
                                            <label>Min Temp: <b>{{ round ($response["daily"][$x]["temp"]["min"]) }}°C</b></label>
                                            <br>
                                            <label>Max Temp: <b>{{ round ($response["daily"][$x]["temp"]["max"]) }}°C</b></label>
                                            <br>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                        @endfor
                    </div>
                </div>
            @elseif($location_found == false)
                <div class="card">
                    <div class="card-header">{{ __($message) }}</div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

