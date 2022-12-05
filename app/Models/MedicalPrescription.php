<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalPrescription extends Model
{
    use HasFactory;

    protected $guarded = ['id_resep'];
    protected $primaryKey = 'id_rekmed';
}