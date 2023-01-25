<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    public $timestamps = false;
    protected $fillable = ['Slug', 'Name', 'Email', 'Logo', 'Website'];

    public function scopeFilter($query, array $filters) {

        $query->when($filters['search'] ?? false, fn ($query, $search) => $query
                ->where('name', 'like', '%' . $search . '%')
                ->orwhere('email', 'like', '%' . $search . '%')
        );

    }


    public function employees() {
        return $this->hasMany(Employee::class);
    }
    
}