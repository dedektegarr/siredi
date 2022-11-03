<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poly extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_poli';
    protected $keyType = 'char';
    public $incrementing = false;

    public function doctor() {
        return $this->hasMany(Doctor::class, 'id_poli');
    }
}
