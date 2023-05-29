@extends('layouts.app')
@section('content')
<div class="form-body mx-auto">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items ">
                    @if(session('erorr'))
                        <div class="alert alert-danger">
                            {{session('erorr')}}
                        </div>
                    @endif
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{session('message')}}
                        </div>
                    @endif
                    <h3 class="text-center">Register Today</h3>
                    <p class="text-center">Fill in the data below.</p>
                    <form class="requires-validation" method="post" action="{{ route('login') }}">
                    @csrf
                        <div class="col-md-12 mb-4">
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" >
                             
                        </div>

                       <div class="col-md-12">
                          <input class="form-control" type="password" name="password" placeholder="Password" required>
                           
                       </div>
                       
                       <span>Not an Account? <a class="mb-2" href="{{ route('register.form') }}">Register</a>&nbsp; &nbsp;</span>
                       <a class="mb-2" href="{{ route('forgot.password') }}">Forgot Password</a>
                       <div class="col-md-3 ">
                           <button id="submit" type="submit" class="btn btn-primary">Loin In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
