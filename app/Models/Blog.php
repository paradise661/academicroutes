<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'slug', 'image', 'banner', 'description', 'seo_title', 'seo_description', 'seo_keywords', 'seo_schema',  'status'];

    public function blogcategory()
    {
        return $this->belongsToMany(Blog::class, 'category_blogs', 'blog_id', 'category_id');
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}
}
