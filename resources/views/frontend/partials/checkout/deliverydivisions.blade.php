<select class="form-select">
    <option selected>Select </option>
    @foreach ($divisions as $division)
        <option value="{{ $division->id }}" onchange="loadDistrict();">{{ $division->name }}</option>
    @endforeach
</select>
