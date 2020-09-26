@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br><br>
                    <a type="button" href="{{ url('/product/type/add') }}" class="btn btn-outline-primary btn-lg btn-block">ADD PRODUCT TYPE</a>
                    <br>
                    <a type="button" href="{{ url('/product/details/add') }}" class="btn btn-outline-secondary btn-lg btn-block">ADD PRODUCT DETAILS</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
