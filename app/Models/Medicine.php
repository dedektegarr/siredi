<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_obat';
    protected $guarded = ['id_obat'];

    public function getRouteKeyName()
    {
        return 'id_obat';
    }

    public function prescription()
    {
        return $this->hasMany(MedicalPrescription::class, 'id_obat');
    }
}