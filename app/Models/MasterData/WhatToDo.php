<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatToDo extends Model
{
    use HasFactory;
    protected $table = 'md_what_to_do';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'image',
        'created_by',
        'updated_by',
    ];
}
