<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public $table = 'document';

    protected $fillable = [
        'Type'
    ];

    public function person() {       
        return $this->belongsToMany(Person::class, 'document_person');
    }
}
