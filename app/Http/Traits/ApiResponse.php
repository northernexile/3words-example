<?php


namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

/**
 * Trait ApiResponse
 * @package App\Http\Traits
 */
trait ApiResponse
{
    /**
     * @param string|null $message
     * @param array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success(?string $message=null,$data=[],$code = 200) :JsonResponse
    {
        return response()->json([
            'status'    =>  'Success',
            'message'   =>  $message ?? '',
            'data'      =>  $data
        ],$code);
    }

    /**
     * @param string|null $message
     * @param int $code
     * @return JsonResponse
     */
    protected function error(?string $message = null,$code=500)
    {
        return response()->json([
            'status'=>'Error',
            'message'=>$message ?? '',
        ],$code);
    }
}
