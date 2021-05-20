
<div class="card">
    <div class="card-header">{{ __('7 Weather Day Forcast ' . $details["details"]["message"]) }}</div>
        <div class="card-body d-flex flex-wrap justify-content-center">
            <hr>
            @for ($x = 0; $x <= 6; $x++)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header text-center h4 font-weight-bold">
                            <b>{{ __(ucwords($details["days_of_week"][$x])) }}</b>
                        </div>
                        <div class="card-body ">
                            <div class="h5 text-center">
                                {{ ucwords($details["details"]["weather_response"]["daily"][$x]["weather"][0]["description"]) }}
                            </div>
                            <label>Min Temp: <b>{{ round ($details["details"]["weather_response"]["daily"][$x]["temp"]["min"]) }}°C</b></label>
                            <br>
                            <label>Max Temp: <b>{{ round ($details["details"]["weather_response"]["daily"][$x]["temp"]["max"]) }}°C</b></label>
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            @endfor
        </div>
    </div>
</div>