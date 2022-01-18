<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements LoggableInterface
{
    use HasFactory;

    protected $fillable = [
        'author_email',
        'message'
    ];

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function convertToLoggableString(): string
    {
        return "Comment with id {$this->id}";
    }

    public function getData(): array
    {
        return [
            'id' => $this->id,
            'author_email' => $this->author_email,
            'message' => $this->message,
        ];
    }
}
