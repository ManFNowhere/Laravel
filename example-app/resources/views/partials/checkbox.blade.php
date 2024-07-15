<form class="d-flex flex-row flex-wrap" id="weatherForm" action="/weather/show" method="post">
    @csrf
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="parameter[]" id="exampleCheckbox1" value="temperature_2m">
        <label class="form-check-label" for="exampleCheckbox1">
            Temperature 2m
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="parameter[]" id="exampleCheckbox2" value="rain">
        <label class="form-check-label" for="exampleCheckbox2">
            Rain
        </label>
    </div>
    <div class="form-check"> 
        <input class="form-check-input" type="checkbox" name="parameter[]" id="exampleCheckbox3" value="showers">
        <label class="form-check-label" for="exampleCheckbox3">
            Shower
        </label>
    </div>
    <div class="form-check"> 
        <input class="form-check-input" type="checkbox" name="parameter[]" id="exampleCheckbox4" value="pressure_msl">
        <label class="form-check-label" for="exampleCheckbox4">
            Sealevel Pressure
        </label>
    </div>
    <div class="form-check"> 
        <input class="form-check-input" type="checkbox" name="parameter[]" id="exampleCheckbox5" value="surface_pressure">
        <label class="form-check-label" for="exampleCheckbox5">
            Surface Pressure
        </label>
    </div>
    <div class="form-check"> 
        <input class="form-check-input" type="checkbox" name="parameter[]" id="exampleCheckbox6" value="wind_speed_10m">
        <label class="form-check-label" for="exampleCheckbox6">
            Wind Speed (10m)
        </label>
    </div>
</form>
