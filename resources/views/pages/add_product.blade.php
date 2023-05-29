@extends('layouts.app')
@section('content')

<form class="container" id="add_product" action="{{ route('store.product') }}" method="post">
    @csrf
    <div class="container ">

        <div class="form-row">
          <div class="form-group col-md-4 err_msg">
            <label for="inputEmail4">Name</label>
            <input type="text" value="{{@$product->name}}" class="form-control" name="name" id="inputEmail4" placeholder="Name">
          </div>
          <div class="form-group col-md-4 err_msg">
            <label for="id_label_single">Category</label>
            <select id="id_label_single" name="category_id" class="form-control js-example-basic-single ">
              <option value="" selected >Select Category</option>
              @foreach ($categories as $category)
              
              <option value="{{$category->id}}" {{ @$product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
              @endforeach
            </select>
        </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-4 err_msg">
              <label for="inputAddress">Price</label>
              <input type="text"  value="{{ @$product->price }}"class="form-control" oninput="validateDecimalInput(event)" name="price" id="decimalInput" placeholder="Price">
            </div>
            <div class="form-group col-md-4 err_msg">
              <label for="inputAddress2">Quantity</label>
              <input type="number" value="{{ @$product->quantity }}" class="form-control" name="quantity" id="inputAddress2" placeholder="Quantity">
            </div>
        </div>
        
        <input type="text" name="created_by" hidden  value="{{$user_id}}">
        <div class="form-row">
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>


  

  
@endsection