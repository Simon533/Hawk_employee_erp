<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    protected $fillable =['location_id','name'];

    public function location()
    {
    return $this->belongsTo(Location::class);
}
public function employees()
{
    return $this->hashMany(Employee::class);
}
}
