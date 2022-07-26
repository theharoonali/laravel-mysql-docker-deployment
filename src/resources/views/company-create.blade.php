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
       <form action="{{$url}}" method="POST">
        @csrf
       <div class="row">
        <div class="col-md-12">
          <label for="CompanyName" class="form-label">Company Name</label>
          <span class="text-danger">
            @error('CompanyName')
              {{$message}}
            @enderror
          </span>
          <input class="form-control mb-3 rounded" name="CompanyName" type="text" value="{{$obj[0]}}">
        </div>
       </div>
  
        <div class="row">
         <div class="col-md-12">
          <label for="Email" class="form-label">Company Email</label>
          <span class="text-danger">
            @error('CompanyEmail')
              {{$message}}
            @enderror
          </span>
          <!-- Laravel Missing Field Hadndling -->
          <input class="form-control mb-3 rounded" placeholder="name@example.com" name="CompanyEmail" type="email" value="{{$obj[1]}}">
          </div>
       </div>

      <!-- <div class="row">
        <div class="col-md-12">
          <label for="customer" class="form-label">Customers</label>
          <input type="text" name="customer" class="form-control mb-3 rounded" value="">
          foreach ($new as $two)
          <tr>
            <td>$two->customer_id</td>
          </tr>
          endforeach
        </div>
        </div>


         <label for="Email" class="form-label"><h5>Select Customers:</h5></label>
      <div class="checkbox-inline">
        <input type="checkbox" class="form-check-input" id="check1" name="CompanyComments[]" value="1" >
        <label class="form-check-label" for="check1">Option 1</label>
      </div>
      <div class="checkbox-inline">
        <input type="checkbox" class="form-check-input" id="check2" name="CompanyComments[]" value="2">
        <label class="form-check-label" for="check2">Option 2</label>
      </div>  

      
  
     <div class="row">
        <div class="col-md-12">
          <label for="Comment" class="form-label">Comment</label>
          <textarea type="text" name="CompanyComments" rows="3" class="form-control mb-3 rounded"></textarea>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
        <label>Customers</label>
        <select class="form-control selectpicker" multiple name="cust">
          <option selected disabled>Select Customers</option>
          foreach ($new as $two)
          <option>
            <tr value="{$two->customer_id}}">{$two->customer_id}}</tr>
          </option>
          endforeach
        </select> 

        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">Customer_ID</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Company_ID</th>
              <th scope="col">Add</th>
              <th scope="col">Remove</th>
            </tr>
          </thead>
          <tbody>
            php
            $i=1;    
            endphp
            foreach($new as $two)
            <tr>
              <td>{$two->customer_id}}</td>
              <td>{$two->firstname}}</td>
              <td>{$two->company_id}}</td>
              <td class="text-center"><a href=""><button class="btn btn-primary btn-sm">Add</button></a></td>
              <td class="text-center"><a href=""><button class="btn btn-danger btn-sm">Remove</button></a></td>
            </tr>
            endforeach  
              
            </tr>
          </tbody>
        </table>

        </div>
      </div> -->

        <div class="row">
        <div class="col-md-12 mt-3">
        <button class="btn btn-primary" type="submit">Submit</button></div>
       </div>
  
      
      </form>
      </div> 

    </div> 


@endsection





  