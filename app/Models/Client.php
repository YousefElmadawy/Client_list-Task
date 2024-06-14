<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'email',
        'phone',
        'country_id'
    ];
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    public function scopeFilter(Builder $builder, $filters)
    {

        $builder->when($filters['name_en'] ?? false, function ($builder, $value) {
            $builder->where('clients.name_en', 'LIKE', "%{$value}%");
        });
        $builder->when($filters['name_ar'] ?? false, function ($builder, $value) {
            $builder->where('clients.name_ar', 'LIKE', "%{$value}%");
        });
        $builder->when($filters['phone'] ?? false, function ($builder, $value) {
            $builder->where('clients.phone', 'LIKE', "%{$value}%");
        });
    }
}
