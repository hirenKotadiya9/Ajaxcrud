@extends('myweb.layouts.welcome')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Country, State, City Dropdown Demo</h2>

    <form method="POST" action="{{ route('submitForm') }}">
        @csrf
        <div class="form-group row">
            <label for="country" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <select class="form-control" name="country" id="country" required>
                    <option value="">-Select Country-</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
        Add New State
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New State</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('state.store') }}" method="POST">
                        @csrf

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="country_id" class="col-form-label">Country</label>
                            <select class="form-control" id="country_id" name="country_id" required>
                                <option value="">-Select Country-</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="state_name" class="col-form-label">State Name</label>
                            <input type="text" class="form-control" id="state_name" name="state_name" required>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save State</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
