<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;


class Company extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $primaryKey = "company_id";

    public function customer(){
        return $this->hasMany(Customer::class,'company_id','company_id');
    }
    
}



