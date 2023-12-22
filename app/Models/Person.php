<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $table = 'person';

    protected $fillable = [
        'Ci',
        'DrivingLicense',
        'FirstName',
        'LastName',
        'SecondLastName',
        'BloodType',
        'CellPhone',
        'Address',
        'photo',
    ];

    public function document() {       
        return $this->belongsToMany(Document::class, 'document_person');
    }

    public function user() {       
        return $this->hasOne(User::class);
    }
}
