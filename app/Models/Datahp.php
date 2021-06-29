<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datahp extends Model
{
    use HasFactory;
    protected $fillable = [
        'merk_hp', 'tipe_hp', 'thn_produksi', 'image'
    ];
}
