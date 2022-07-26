
@extends('layouts.main')

@section('main-content')

<body class="bg-light">
    <div class="container mt-5" >
      <h2 class="text-center ms-5 mb-5">{{$title}}<a href="{{ route('company-view') }}">
        <button class=" font-weight-bold btn ms-3 btn-dark float-end" >View Companies</button></a>
        <a href="{{ url('view') }}">
          <button class=" font-weight-bold btn btn-dark float-end" >View Customers</button></a>
      </h2>

      <div class="container mt-5" >

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">Customer_ID</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Add</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i=1;    
          @endphp
          @foreach($new_customer as $two)
          <tr>
            <td>{{$two->customer_id}}</td>
            <td>{{$two->firstname}}</td>
            <td>{{$two->email}}</td>
            <td class="text-center"><a href="{{url('/company-customers-add')}}/{{$two->customer_id}}/add/{{$id}}"><button class="btn btn-primary btn-sm">Add</button></a></td>
          </tr>
          @endforeach  
            
          </tr>
        </tbody>
      </table>  
      
      </div> 

    </div> 


@endsection





  