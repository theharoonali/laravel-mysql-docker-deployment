@extends('layouts.main')

@section('main-content')

<body class="bg-light">
    <div class="container mt-5" >
      <h2 class="text-center ms-5 mb-5">Companies!<a href="{{ route('company-create') }}">
        <button class="font-weight-bold btn ms-3 btn-success float-end " >Add New Company</button></a>
        <a href="{{ url('view') }}">
          <button class="font-weight-bold btn btn-dark float-end" >View Customers</button></a>
      </h2>
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">ID.</th>
                <th scope="col">Company Name</th>
                <th scope="col">Email</th>
                <th scope="col">Customer</th>
                <th scope="col">Add Customers</th>
                <th scope="col">Remove Customers</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($company as $data)
              <tr>
                <td>{{$data->company_id}}</td>
                <td>{{$data->companyname}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->customer->pluck('firstname')}}</td>
                <td class="text-center"><a href="{{ url('company-customers-add')}}/{{$data->company_id}} "><button class="btn btn-primary btn-sm">Add</button></a></td>
                <td class="text-center"><a href="{{ url('company-customers-remove')}}/{{$data->company_id}}"><button class="btn btn-danger btn-sm">Remove</button></a></td>
                <td class="text-center"><a href="{{url('/company-view/edit')}}/{{$data->company_id}}"><button class="btn btn-primary btn-sm">Edit</button></a></td>
                <td class="text-center"><a href="{{url('/company-view/delete')}}/{{$data->company_id}}"><button class="btn btn-danger btn-sm">Delete</button></a></td>
              </tr>
              @endforeach  
                
              </tr>
            </tbody>
          </table>
    </div> 


@endsection





  