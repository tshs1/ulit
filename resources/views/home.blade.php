@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Road To be fit and Healthy') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   {{ Auth::user()->todo }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/actors/students/index.js') }}"></script>
@endsection