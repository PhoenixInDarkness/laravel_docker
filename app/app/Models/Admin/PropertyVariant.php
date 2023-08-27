<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyVariant extends Model
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

    protected $fillable = ['ad_id', 'property_id', 'value'];

    public function propety()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

    public function getPropertyName()
    {
        return $this->propety()->first()->name;
    }
}
