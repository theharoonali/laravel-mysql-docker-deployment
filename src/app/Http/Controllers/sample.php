<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Company;
use App\Models\User;
use Session;


class sample extends Controller
{
    public function index(){
        $url = url('/home');
        if(Session::has('LoggedUser')){
            $daata = User::where('id','=', Session::get('LoggedUser'))->first();
            $title = "Customer Form!";
            $obj = array("","","","","","","");
            $company = Company::all();
            $data = compact('daata','title','obj','url','company');
            return view('welcome')->with($data);
        }else{
        $title = "Customer Form!";
        $obj = array("","","","","","","","");
        $data = compact('title','url','obj');
        return view('welcome')->with($data);}
    }
    public function view(Request $req){
        if(Session::has('LoggedUser')){
            $search = $req['search']??"";
            if($search != ""){
                $customer = Customer::where('firstname','LIKE',"%$search%")->orwhere('lastname','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->paginate(6);
            }else{
                $customer = Customer::with('company')->paginate(6);
            }
            $daata = User::where('id','=', Session::get('LoggedUser'))->first();
            $data = compact('daata','customer','search');
            return view('view')->with($data);
        }else{
            return redirect('/');
        }
    }
    public function create(Request $req){
        $req->validate(
            [
                'FirstName' => 'required',
                'LastName' => 'required',
                'Email' => 'required|email',
                'company_id' => 'required|exists:companies,company_id'
            ]
            );

        $customer = new Customer;
        $customer->firstname = $req['FirstName'];
       $customer->lastname = $req['LastName'];
       $customer->email = $req['Email'];
       $customer->phoneno = $req['PhoneNo'];
       $customer->comments = $req['Comments'];
       $customer->gender = $req['Gender'];
       $customer->company_id = $req['company_id'];
       $customer->save();

       return redirect('/home');
    }
    public function delete($id){
        Customer::find($id)->delete();
        return redirect()->back();
    }
    public function edit($id){
        
        if(Session::has('LoggedUser')){
            $daata = User::where('id','=', Session::get('LoggedUser'))->first();
            $title = "Update Customer Form!";
            $customer = Customer::find($id);
            $company = Company::all();
            $url = url('/view/update').'/'.$id;    
            $obj = array($customer->firstname,$customer->lastname,$customer->email,$customer->phoneno,$customer->comments,$customer->gender,$customer->company_id);
            $data = compact('daata','obj','url','title','company');
            return view('welcome')->with($data);
        }else{
            return redirect('home');
        }

    }
    public function update($id, Request $req){
        $req->validate(
            [
                'FirstName' => 'required',
                'LastName' => 'required',
                'Email' => 'required|email',
                'company_id' => 'required|exists:companies,company_id'

            ]
            );
        $customer = Customer::find($id);
        $customer->firstname = $req['FirstName'];
        $customer->lastname = $req['LastName'];
        $customer->email = $req['Email'];
        $customer->phoneno = $req['PhoneNo'];
        $customer->comments = $req['Comments'];
        $customer->gender = $req['Gender'];
        $customer->company_id = $req['company_id'];
        $customer->save();
        
        return redirect('view');
    }


         public function company_create(){
        $url = url('/company-create');
        $daata = User::where('id','=', Session::get('LoggedUser'))->first();
        $new = Customer::where('company_id', '=', Null)->get();
        $title = "Create Company!";
        $obj = array("","","");
        $data = compact('daata','title','obj','url');
        return view('company-create')->with($data);
    }
        public function company_submit(Request $req){
           $req->validate(
        [
            'CompanyName' => 'required',
            'CompanyEmail' => 'required|email'
        ]
        );

            $company= new Company;
            $company->companyname = $req['CompanyName'];
            $company->email = $req['CompanyEmail'];
            $company->save();
            return redirect('company-view');

    }
         public function company_view(){
         $daata = User::where('id','=', Session::get('LoggedUser'))->first();
          $title = "Company View!";
          $company = Company::with('customer')->get();
          $data = compact('daata','title','company');
         return view('company')->with($data);
    }
            public function company_delete($id){
            Customer::with('company')->where('company_id', '=', $id)->update(['company_id' => Null]);
            Company::find($id)->delete();
             return redirect()->back();
    }   
    public function company_edit($id){
      
            $daata = User::where('id','=', Session::get('LoggedUser'))->first();
            $title = "Update Company Form!";
            $company = Company::with('customer')->find($id);
            $url = url('/company-view/update').'/'.$id;    
            $obj = array($company->companyname,$company->email,$company->customer->pluck('customer_id'));
            $data = compact('daata','obj','url','title');
            return view('company-create')->with($data);
    }
    public function company_update($id, Request $req){

        $req->validate(
            [
                'CompanyName' => 'required',
                'CompanyEmail' => 'required|email'
            ]
            );

        $company = Company::with('customer')->find($id);
        $company->companyname = $req['CompanyName'];
        $company->email = $req['CompanyEmail'];
        $company->save();
        return redirect('company-view');
    }

    public function company_customers_add($id){
        $daata = User::where('id','=', Session::get('LoggedUser'))->first();
        $title = "Add Customers to!";
        $new_customer = Customer::where('company_id', '=', Null)->get();
        $data = compact('daata','title','new_customer','id');
        return view('company-customers-add')->with($data);
    }
    public function company_customers_added($customer_id, $id){
        Customer::with('company')->where('customer_id', '=', $customer_id)->update(['company_id' => $id]);
        return redirect()->back();
    }
    public function company_customers_remove($id){
        $daata = User::where('id','=', Session::get('LoggedUser'))->first();
        $title = "Remove Customers!";
        $new_customer = Customer::where('company_id', '=', $id)->get();
        $data = compact('daata','title','new_customer','id');
        return view('company-customers-remove')->with($data);
    }
    public function company_customers_removed($customer_id, $id){
        Customer::with('company')->where('customer_id', '=', $customer_id)->delete('company_id');
        return redirect()->back();
    }
    public function new(){
       $t = Company::with('customer')->pluck('companyname');
       $r = ((array) $t);
        
        return $t[1];

        
    }
}
