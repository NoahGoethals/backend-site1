<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer', 'published_at', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    protected $casts = [
        'published_at' => 'datetime',
    ];
    
}