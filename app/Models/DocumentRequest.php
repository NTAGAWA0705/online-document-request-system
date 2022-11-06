<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentrequest extends Model
{
    use HasFactory;

    protected $table = "documentrequests";

    protected $fillable = [
        'status',
        'student_id'
    ];

    public function docsinrequest()
    {
        return $this->hasMany(Docsinrequest::class);
    }

    public function proof()
    {
        return $this->hasOne(ProofOfPayment::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function approval()
    {
        return $this->hasMany(Approval::class);
    }
}
