<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GeoThreeWords
 * @package App\Models
 */
class GeoThreeWords extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public $timestamps = true;

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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
