<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Psr\Log\LoggerInterface;

class Article extends Model implements LoggableInterface
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'image',
        'published_at',
        'excerpt',
        'blog_category_id',
        'seo_title',
        'seo_description',
    ];

    public function getImageUrlAttribute(){
        return Storage::url($this->image);
    }

    public  function category(){
        return $this->belongsTo(BlogCategory::class);
    }

    public  function blogTags(){
        return $this->belongsToMany(BlogTag::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function convertToLoggableString(): string
    {
        return "Article with id {$this->id}";
    }

    public function getData(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
