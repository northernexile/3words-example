<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponse;

/**
 * Class AbstractApiController
 * @package App\Http\Controllers
 */
abstract class AbstractApiController extends Controller
{
    use ApiResponse;
}
