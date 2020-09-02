<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = [
        'name',
        'statement',
        'apu',
        'act',
        'project',
        'type_id',
        'address',
        'area',
        'solution',
        'note',
        'longitude',
        'latitude',
        'legality',
        'certificate',
        'category',
        'inn'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}



