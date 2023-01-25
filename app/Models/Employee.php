<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    public $timestamps = false;
    protected $fillable = ['FirstName','LastName','Company_id', 'Email', 'PhoneNumber'];

    public function store() {
        request() ->validate([
            'FirstName' => [ 'required' , 'max:255' ],
            'LastName' => [ 'required' , 'max:255' ],
            'Email' => [ 'email' , 'max:255' ] ,
            'PhoneNumber' => [ 'max:255' ]
        ]);
    }
     
    public function company() {
        return $this->belongsTo(Company::class, 'Company_id');
    }
}
