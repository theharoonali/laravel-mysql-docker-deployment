@extends('layouts.main')

@section('main-content')
  <body class="bg-light ">
    <div class="container mt-5" >

      <h2 class="text-center mb-5">{{$title}}<a href="{{url('view')}}">@if(Session::has('LoggedUser'))<button class="font-weight-bold btn btn-dark float-end" >View</button>@endif</a></h2>

     <form action="{{$url}}" method="POST">
      @csrf
     <div class="row">
      <div class="col-md-6">
        <label for="FirstName" class="form-label">First Name</label>
        <input class="form-control mb-3 rounded" name="FirstName" type="text" value="{{$obj[0]}}">
      </div>
      <div class="col-md-6">
        <label for="LastName" class="form-label">Last Name</label>
        <input class="form-control mb-3 rounded" name="LastName" type="text" value="{{$obj[1]}}">
      </div>
     </div>

      <div class="row">
       <div class="col-md-6">
        <label for="Email" class="form-label">Email</label>
        <!-- Laravel Missing Field Hadndling -->
        <span class="text-danger">
          @error('Email')
              {{$message}}
          @enderror
        </span>
        <input class="form-control mb-3 rounded" placeholder="name@example.com" name="Email" type="email" value="{{$obj[2]}}">
        </div>
        <div class="col-md-3">
          <label for="company_id" class="form-label">Company</label>
          <!--<input class="form-control mb-3 rounded " name="company_id" type="tel" placeholder="Company" value="{$obj[6]}}">-->
          <select class="form-select" aria-label="Default select example" name="company_id" >
            <option selected disabled>Select Company</option>
            @foreach($company as $company)
            <option value="{{$company->company_id}}" {{($obj[6]==$company->company_id)? 'selected' : ''}}>ID:{{$company->company_id}} - <strong>{{$company->companyname}}</strong></option>
            @endforeach
          </select>
          <span class="text-danger">
            @error('company_id')
                {{$message}}
            @enderror
          </span>
         </div>

         
      <div class="col-md-3">
        <label for="PhoneNo" class="form-label">Phone Number (+92)</label>
        <input class="form-control mb-3 rounded " name="PhoneNo" type="tel" placeholder="3001234567" pattern="[0-9]{10}" value="{{$obj[3]}}">
       </div>
     </div>


       <div class="row">
        <div class="col-md-12">
          <label for="Comment" class="form-label">Comment</label>
          <textarea type="text" name="Comments" rows="3" class="form-control mb-3 rounded">{{$obj[4]}}</textarea>
        </div>
        </div>

       <div class="row">
        <div class="col-md-3 mb-3">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Gender" id="" value="Male" {{($obj[5]=="Male")? 'checked' : ''}}>  
            <label class="form-check-label" for="Male">Male</label>
          </div>
          <div class="form-check form-check-inline">            
            <input class="form-check-input" type="radio" name="Gender" id="" value="Female" {{$obj[5]=="Female" ? 'checked' : ''}}>
            <label class="form-check-label" for="Female">Female</label>
          </div> 
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Gender" id="" value="Other" {{$obj[5]=="Other" ? 'checked' : ''}}>
            <label class="form-check-label" for="Other">Other</label>
          </div>
        </div>
       </div>


      <div class="row">
      <div class="col-md-12">
      <button class="btn btn-primary" type="submit">Submit</button></div>
     </div>

    
    </form>
    </div> 

  @endsection