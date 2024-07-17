<?php

namespace App\Models\ContentManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentDetail extends Model
{
    use HasFactory;
    protected $table = 'cms_content_details';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'id_master', 'code', 'type', 'class', 'name', 'content_id', 'content_en', 'sequence', 'description', 'style', 'image', 'link_title', 'link_url', 'is_active', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
