<?php

namespace App\Models\ContentManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentMaster extends Model
{
    use HasFactory;
    protected $table = 'cms_content_master';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'code',
        'name',
        'description',
        'created_by',
        'updated_by',
    ];
}
