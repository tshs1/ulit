@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header with border colorT">
        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-new"><i class="fa fa-plus"></i></a>
            <h1 class="text-center ">Roles</h1>
        </div>
        <div class="card-body bodyT">
            <table class="table table-hover">
            <th>#</th>
            <th>Name</th>
            <th>Display name</th>
            <th>Action</th>  
            <tbody id="table-main"></tbody>          
            </table>
            @include('actors.roles.modal')
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/actors/roles/index.js') }}"></script>
@endsection