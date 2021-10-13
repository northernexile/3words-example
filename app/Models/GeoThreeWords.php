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

    protected $appends = [
        'coordinates'
    ];

    /**
     * @return array
     */
    public function getCoordinatesAttribute() :array
    {
        return [
            'latitude'=> (is_null($this->latitude))
                ? null
                : floatval($this->latitude),
            'longitude'=> (is_null($this->longitude))
                ? null
                : floatval($this->longitude),
        ];
    }
}
