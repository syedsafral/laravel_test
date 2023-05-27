@extends('layouts.app')
@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items ">
                    @if(session('erorr'))
                        <div class="alert alert-danger">
                            {{session('erorr')}}
                        </div>
                    @endif
                    <h3 class="text-center">Create A new Password</h3>
                    <p class="text-center">Fill in the data below.</p>
                    <form class="requires-validation" method="post" action="{{ route('reset.password') }}">
                    @csrf
                    <div class="col-md-12">
                        <input class="form-control" type="password" name="password" placeholder="Password" >
                        @if($errors->has('password'))
                            <div class="error text-danger ">{{ $errors->first('password') }}</div>
                         @endif
                     </div>
                    <div class="col-md-12">
                        <input class="form-control" type="password" name="password_confirmtion" placeholder="Confirm Password" >
                        @if($errors->has('password_confirmtion'))
                        <div class="error text-danger ">{{ $errors->first('password_confirmtion') }}</div>
                     @endif 
                     </div>
                     <input type="text" name="token" hidden value="{{$token}}">

                       <div class="col-md-3 ">
                           <button id="submit" type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
