<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generateddoc extends Model
{
    use HasFactory;

    public function docsinrequest()
    {
        return $this->belongsTo(Docsinrequest::class, 'docsinrequest_id');
    }
}
