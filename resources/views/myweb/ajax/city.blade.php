@extends('myweb.layouts.welcome')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Country, State, City Dropdown Demo</h2>
    <form>
        <div class="form-group row">
            <label for="country" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" name="country" id="country">
                    <option value="">-Select-</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="state" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
                <select class="form-control" name="state" id="state" disabled>
                    <option value="">-Select-</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <select class="form-control" name="city" id="city" disabled>
                    <option value="">-Select-</option>
                </select>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("#country").change(function () {
            let countryId = $(this).val();

            if (countryId) {
                $("#state").prop("disabled", false);
                $.ajax({
                    url: "{{ route('getStates') }}",
                    method: "POST",
                    data: {
                        country_id: countryId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $("#state").html(data);
                        $("#city").html('<option value="">-Select-</option>');
                        $("#city").prop("disabled", true);
                    }
                });
            } else {
                $("#state").html('<option value="">-Select-</option>');
                $("#state").prop("disabled", true);
                $("#city").html('<option value="">-Select-</option>');
                $("#city").prop("disabled", true);
            }
        });
        $("#state").change(function () {
            let stateId = $(this).val();

            if (stateId) {
                $("#city").prop("disabled", false);
                $.ajax({
                    url: "{{ route('getCities') }}",
                    method: "POST",
                    data: {
                        state_id: stateId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $("#city").html(data);
                    }
                });
            } else {
                $("#city").html('<option value="">-Select-</option>');
                $("#city").prop("disabled", true);
            }
        });
    });
</script>
@endsection
