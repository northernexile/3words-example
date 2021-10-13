<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGeoThreeWordsRequest;
use App\Http\Requests\UpdateGeoThreeWordsRequest;
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

    /**
     * @param GeoThreeWords $geo
     * @return JsonResponse
     */
    public function show(GeoThreeWords $geo) :JsonResponse
    {
        try{
            $response = $this->success('Showing Geo to What.3.words ID:'.$geo->id,$geo);
        } catch (\Throwable $throwable){
            $response = $this->error($throwable->getMessage(),$throwable->getCode() ?? 500);
        } finally {
            return $response;
        }
    }

    /**
     * @param CreateGeoThreeWordsRequest $request
     * @return JsonResponse
     */
    public function create(CreateGeoThreeWordsRequest $request) :JsonResponse
    {
        try{
            $geo = GeoThreeWords::create(
                $request->only([
                    'latitude','longitude','three_words'
                ])
            );

            $response = $this->success('Created Geo to What.3.words ID:'.$geo->id,$geo,201);
        } catch (\Throwable $throwable){
            $response = $this->error($throwable->getMessage(),$throwable->getCode() ?? 500);
        } finally {
            return $response;
        }
    }

    /**
     * @param UpdateGeoThreeWordsRequest $request
     * @param GeoThreeWords $geo
     * @return JsonResponse
     */
    public function update(UpdateGeoThreeWordsRequest $request,GeoThreeWords $geo) :JsonResponse
    {
        try{
            $geo->update(
                $request->only([
                    'latitude','longitude','three_words'
                ])
            );

            $response = $this->success('Updated Geo to What.3.words ID:'.$geo->id,$geo,201);
        } catch (\Throwable $throwable){
            $response = $this->error($throwable->getMessage(),$throwable->getCode() ?? 500);
        } finally {
            return $response;
        }
    }
}
