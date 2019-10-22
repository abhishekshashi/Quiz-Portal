@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Test') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('options') }}">
                        @csrf
                        @csrf
                        <h3>Adding options to Question : {{ $questions->question }} </h3>

                        <div class="form-group row">
                            <label for="option" class="col-md-4 col-form-label text-md-right">{{ __('option') }}</label>

                            <div class="col-md-6">
                                <input id="option" type="text" class="form-control @error('option') is-invalid @enderror" name="option" value="{{ old('option') }}" required autocomplete="option" autofocus>

                                @error('option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isCorrect" class="col-md-4 col-form-label text-md-right">{{ __('isCorrect') }}</label>

                            <div class="col-md-6">
                                <input id="isCorrect" type="text" class="form-control @error('isCorrect') is-invalid @enderror" name="isCorrect" value="{{ old('isCorrect') }}" required autocomplete="isCorrect" data-container=".row" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Must be at 0 or 1">

                                @error('isCorrect')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit and add more Options') }}
                                </button>
                            </div>

                        </div>
                    </form>
                    <a href="{{ route('questions') }}"> <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add more questions to current Test') }}
                                </button>
                            </div></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
