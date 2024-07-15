<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'refference_id',
        'method',
        'uri',
        'user',
        'module',
        'activity',
        'request_body',
        'old_data',
        'new_data'
    ];
}
