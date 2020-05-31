<?php

namespace App\Http\Controllers;

use App\Actions\Traits\ParameterTrait;
use App\Http\Controllers\Traits\MessagesTraits;
use App\Services\QueryServiceTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *     title="CheckList",
 *     version="0.0.1",
 *     @OA\Contact(
 *         email="contato@jaidsondantas.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Server(
 *     description="Server location {{wamp}}",
 *     url="http://back.checklist.com/api"
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * ),
 *
 */
class Controller extends BaseController
{
    use ParameterTrait, QueryServiceTrait, MessagesTraits;


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
