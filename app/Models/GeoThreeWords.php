<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeoThreeWords
 * @package App\Models
 */
class GeoThreeWords extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
      'latitude',
      'longitude',
      'three_words'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'latitude'=>'string',
        'longitude'=>'string',
    ];
}
