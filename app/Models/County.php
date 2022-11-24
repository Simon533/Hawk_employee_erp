<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;
    protected $fillable =['county_code','name'];


    public function employees()
    {
        return $this->hashMany(Employee::class);
    }
    public function locations()
    {
        return $this->hashMany(Location::class);
    }
}
