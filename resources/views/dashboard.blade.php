@extends('layouts.admin')

@section('content')
    <div class="container bg-dark">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card bg-black">
                    <div class="card-header text-warning">{{ __('Dashboard') }}</div>

                    <div class="card-body text-warning">
                        @if (session('status'))
                            <div class="alert alert-success " role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
