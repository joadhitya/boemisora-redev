<?php

namespace App\Models\ContentManagement;

use App\Models\MasterData\CategoryBlog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'cms_blogs';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'id_category',
        'title',
        'headline',
        'keyword',
        'slug',
        'short_description',
        'content_id',
        'content_en',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'date_archieve',
        'is_favorite',
    ];

    protected $dates = ['date_archieve', 'deleted_at'];

    // public function category()
    // {
    //     return $this->belongsTo(CategoryBlog::class, 'id_category');
    // }
}
