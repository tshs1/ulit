@extends('layouts.app')

@section('content')
    <div class="bgcolor">
        <div class="child">
        <div class="rounded">
            <div class="card colorT">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body" >
                    <form method="POST" action="{{ route('register') }}" >
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fullname(Surname, First name, Middle name)') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lrn" class="col-md-4 col-form-label text-md-right">{{ __('LRN') }}</label>

                            <div class="col-md-6">
                                <input id="lrn" step="any" type="number" class="form-control" name="lrn" value="{{ old('lrn') }}" required autofocus>
                                <!-- @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" step="any" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autofocus>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">    
                            <label for="is_male" class="col-md-4 col-form-label text-md-right">{{ __('Show selected Section') }}</label>
                            <div  class="col-md-6">
                                <select class="form-control" id="is_male" name="is_male" required focus>
                                    <option value="1" selected>Male</option>  
                                    <option value="0" >Female</option>  
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height(meter)') }}</label>

                            <div class="col-md-6">
                                <input id="height" step="any" type="number" class="form-control" name="height" value="{{ old('height') }}" required autofocus>
                                <!-- @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="weight"  class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input id="weight" step="any" type="number" class="form-control" name="weight" value="{{ old('weight') }}" required autofocus>
                                <!-- @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="form-group row">    
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Show selected Section') }}</label>
                            <div  class="col-md-6">
                                <select class="form-control" id="selectUser" name="selectUser" required focus>
                                    <option value="" disabled selected>Please select Section</option>  
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="hidden" id="role_id" name="role_id" value="3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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


@section('javascript')
<script type="module" src="{{ asset('js/actors/sections/index.js') }}"></script>
<!-- <script type="text/javascript">
    const options = { method, headers: { 'Content-Type': 'application/json', enctype: "multipart/form-data" } }; //, mimeType: "multipart/form-data"
const query =await fetch('api/user/test',options)
consol.log(query)
let arr =["dsa",'asd']
arr.forEach(element => {
let sel =$("#selectUser")
    $('<option>', {
        html:element
    }).appendTo(sel)
});
  </script> -->
@endsection