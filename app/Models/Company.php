<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $table = 'company';
    
    protected $fillable = [
        'Nit',
        'CompanyName',
        'OperatingLicense',
        'Address',
        'Phone',
        'logo'
    ];

    public function cab() {
        return $this->belongsTo(Cab::class);
    }

    public function person() {
        return $this->belongsTo(Person::class);
    }
}
