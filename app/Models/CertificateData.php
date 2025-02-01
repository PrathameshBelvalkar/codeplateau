<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateData extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'certificate_code',
        'course_code',
    ];
}
