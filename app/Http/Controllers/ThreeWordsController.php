<?php

namespace App\Http\Controllers;

use App\Models\GeoThreeWords;
use Illuminate\Http\JsonResponse;

/**
 * Class ThreeWordsController
 * @package App\Http\Controllers
 */
class ThreeWordsController extends AbstractApiController
{
    /**
     * @return JsonResponse
     */
    public function index() :JsonResponse
    {
        try{
            $response = $this->success('Listing encoded Geo to What.3.Words',GeoThreeWords::all());
        } catch (\Throwable $throwable) {
            $response = $this->error($throwable->getMessage(),$throwable->getCode() ?? 500);
        } finally {
            return $response;
        }
    }
}
