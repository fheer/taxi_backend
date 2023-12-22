<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cab extends Model
{
    use HasFactory;

    public $table = 'cab';

    protected $fillable = [
        'Model',
        'LicensePlate',
        'CarChassis',
        'Color',
        'Left',
        'Right',
        'Front',
        'Back',
        'Up',
        'CarBandId',
        'CompanyId',
        'PersonId'
    ];

    public function carbrand() {
        return $this->belongsTo(CarBrand::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function person() {
        return $this->belongsTo(Person::class);
    }
}
