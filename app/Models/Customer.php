<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
    'cus_fname',
    'cus_lname',
    'cus_email'
    ];

    protected $casts = [
        'cus_dob' => 'date'
    ];

}
