<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $primaryKey = "customer_id";
    
    public function company(){
        return $this->hasMany(Company::class,'company_id','company_id');
    }

}