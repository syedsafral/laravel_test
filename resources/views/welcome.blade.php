@extends('layouts.app')
@section('contant')
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
                       
                       <a class="mb-2" href="{{ route('register.form') }}">Create a new Register</a>&nbsp; &nbsp;
                       <a class="mb-2" href="">Forgot Password</a>
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
