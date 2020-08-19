<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['date',
        'build_id',
        'desc',
        'stage',
        'document',
        'document_scan',
        'images',
        'note',
        ];

    public function build()
    {
        return $this->belongsTo(Build::class);
    }

    public function histories()
    {
        $this->hasMany(History::class);
    }
}








