@extends('layouts.app')
@section('content')
<table class="table table-hover">
  <thead class="fw-bold">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
       ?>
    @foreach ($categories as $category)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $category->name }}</td>
      
    </tr>
      
    @endforeach
    
  </tbody>
</table>
@endsection