@extends('layouts.app')
@include('layouts.auth_layout')

@section('content')
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
{{--                    @foreach(Route::current() as $link)--}}
{{--                        <a href="{{ $link }}">This is a link</a>--}}
{{--                    @endforeach--}}
{{--                    <div>--}}
                        {{(Route::current()->getPrefix())}}
{{--                    </div>--}}
                    <form method="POST" action="{{ route('signin') }}">
                        @csrf

                        @error('error')
                        <div class="alert text-danger mb-0 p-0 text-center">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <div class="alert text-danger mb-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <div class="alert text-danger mb-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
