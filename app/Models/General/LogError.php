<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogError extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'method',
        'uri',
        'user',
        'http_code',
        'error_code',
        'message',
        'request_body',
    ];
}
