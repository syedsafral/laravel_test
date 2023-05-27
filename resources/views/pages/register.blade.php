@extends('layouts.app')
@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items ">
                    <h3 class="text-center">Register Today</h3>
                    <p class="text-center">Fill in the data below.</p>
                    <form class="requires-validation" method="post" action="{{ route('register') }}" >
                      @csrf
                        <div class="col-md-12">
                           <input class="form-control" type="text" value="{{old('name')}}" name="name" placeholder="Name" >
                           @if($errors->has('name'))
                                <div class="error text-danger ">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="col-md-12 mb-4">
                            <input class="form-control" type="email" value="{{old('email')}}" name="email" placeholder="E-mail Address" >
                            @if($errors->has('email'))
                               <div class="error text-danger ">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                       


                       <div class="col-md-12">
                          <input class="form-control" type="password" value="{{old('password')}}" name="password" placeholder="Password" >
                           @if($errors->has('password'))
                               <div class="error text-danger ">{{ $errors->first('password') }}</div>
                           @endif
                       </div>



              
                      <span>Already have an Account? <a class="mb-2" href="{{ route('login.form') }}">Login</a></span>
                        <div class="col-md-3 float-end">
                            <button id="submit" type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
