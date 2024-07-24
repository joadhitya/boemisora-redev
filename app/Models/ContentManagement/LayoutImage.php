<?php

namespace App\Models\ContentManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutImage extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'id_master',
        'sequence',
        'name',
        'height',
        'width',
        'type',
        'image',
        'created_by',
        'updated_by',
    ];
}
