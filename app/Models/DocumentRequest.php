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

    public function docsInRequest()
    {
        return $this->hasMany(Docsinrequest::class);
    }
}
