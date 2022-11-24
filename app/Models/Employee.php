<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['first_name','last_name','address','address','zip_code','birt_date','date_hired','id_no','county_id',
    'location_id','town_id','department_id'];
    public function County()
    {
        return $this->belongsTo(County::class);
    }
    public function location()
    {
    return $this->belongsTo(Location::class);
    }
    public function town()
    {
    return $this->belongsTo(Town::class);
    }
    public function department()
    {
    return $this->belongsTo(Department::class);
    }
}
