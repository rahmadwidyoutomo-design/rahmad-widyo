<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'image',
        'url', 'github_url', 'tech_stack', 'status', 'order',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function getTechStackArrayAttribute(): array
    {
        return $this->tech_stack ? array_map('trim', explode(',', $this->tech_stack)) : [];
    }
}
