<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable =['county_id','name'];


    public function county()
    {
        return $this->belongsTo(County::class);
    }
    public function employees()
    {
        return $this->hashMany(Employee::class);
    }
}