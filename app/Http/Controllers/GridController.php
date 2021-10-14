<?php

namespace App\Http\Controllers;


use App\Http\Requests\GridRequest;
use Illuminate\Http\JsonResponse;
use Northernexile\ThreeWords\Models\Coordinates;

/**
 * Class GridController
 * @package App\Http\Controllers
 */
class GridController extends Abstract3WordsApiController
{
    /**
     * @param GridRequest $request
     * @return JsonResponse
     */
    public function show(
        GridRequest $request
    ) :JsonResponse
    {
        try{
            $start = (new Coordinates())
                ->setLatitude($request->get('start.latitude'))
                ->setLongitude($request->get('start.longitude'));
            $stop = (new Coordinates())
                ->setLatitude($request->get('stop.latitude'))
                ->setLongitude($request->get('stop.longitude'));

            $threeWordsData = $this->threeWords->gridSection($start,$stop);

            $response = $this->success(
                'Showing What.3.words grid',
                $threeWordsData
            );
        } catch (\Throwable $throwable){
            $response = $this->error($throwable->getMessage());
        } finally {
            return $response;
        }
    }
}
