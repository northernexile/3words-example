<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoordinateRequest;
use Illuminate\Http\JsonResponse;
use Northernexile\ThreeWords\Models\Coordinates;


/**
 * Class CoordinateController
 * @package App\Http\Controllers
 */
class CoordinateController extends Abstract3WordsApiController
{
    /**
     * @param CoordinateRequest $request
     * @return JsonResponse
     */
    public function show(
        CoordinateRequest $request
    ) :JsonResponse
    {
        try{
            $coordinates = (new Coordinates())
                ->setLatitude($request->get('latitude'))
                ->setLongitude($request->get('longitude'));

            $threeWordsData = $this->threeWords->convertFromCoordinates($coordinates);

            $response = $this->success(
                'Showing What.3.words for coordinates : lat:'.
                $coordinates->getLatitude().
                ',lon:'.
                $coordinates->getLongitude(),
                $threeWordsData
            );
        } catch (\Throwable $throwable){
            $response = $this->error($throwable->getMessage());
        } finally {
            return $response;
        }
    }
}
