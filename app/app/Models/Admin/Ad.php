<?php

namespace App\Models\Admin;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Ad extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title', 'description', 'category_id', 'block', 'price', 'city'];

    public function getPreviewPhoto ()
    {
        $photo = $this->photo()->first();

        if ($this->photo()->first()) {
            return 'storage/' . $photo->file_path;
        } else {
            return null;
        }
    }

    public function getAllPhotos()
    {
        $photos = $this->photo()->get();
        $urls = [];

        foreach ($photos as $photo) {
            $urls[] = 'storage/' . $photo->file_path;
        }

        return $urls;
    }

    public function photo(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyVariants()
    {
        return $this->hasMany(PropertyVariant::class);
    }
}
