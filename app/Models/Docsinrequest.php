<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docsinrequest extends Model
{
    use HasFactory;

    protected $table = "docsinrequest";

    protected $fillable = [
        'documentrequest_id',
        'doctype_id',
    ];

    public function docRequest()
    {
        return $this->belongsTo(Documentrequest::class);
    }
}
