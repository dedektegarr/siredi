<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    
    protected $guarded = ['id_rekmed'];

    public function getRouteKeyName()
    {
        return 'id_rekmed';
    }
}
