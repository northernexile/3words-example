<?php


namespace App\Http\Controllers;

use Northernexile\ThreeWords\ThreeWords;

/**
 * Class Abstract3WordsApiController
 * @package App\Http\Controllers
 */
abstract class Abstract3WordsApiController extends AbstractApiController
{
    /**
     * @var ThreeWords
     */
    protected $threeWords;

    /**
     * CoordinateController constructor.
     * @param ThreeWords $threeWords
     */
    public function __construct(ThreeWords $threeWords)
    {
        $this->threeWords = $threeWords;
    }
}
