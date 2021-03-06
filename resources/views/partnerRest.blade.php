@extends('master')
@section ("content")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Become Our Partner') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/shopStore') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant/Shop Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="S_Name" value="{{ old('Name') }}" required autocomplete="Name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="S_Description" class="col-md-4 col-form-label text-md-right">{{ __('Shop Description') }}</label>

                            <div class="col-md-6">
                                <input id="S_Description" type="text" class="form-control @error('S_Description') is-invalid @enderror" name="S_Description" value="{{ old('S_Description') }}" required autocomplete="S_Description" autofocus>

                                @error('S_Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="S_Category" value="Food and Beverage">

                        <input type="hidden" class="form-control" name="Dine_In" value="1">
                        <input type="hidden" class="form-control" name="Delivery" value="1">
                        <input type="hidden" class="form-control" name="Pick_Up" value="1">
                        <input type="hidden" class="form-control" name="S_Status" value="2">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Already have an account') }}
                                    </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
