<?php

namespace App\Http\Controllers;

use App\Actions\CreateActionTrait;
use App\Actions\DeleteActionTrait;
use App\Actions\DeleteMultipleActionTrait;
use App\Actions\FindAllActionTrait;
use App\Actions\FindIdActionTrait;
use App\Actions\UpdateActionTrait;
use App\Models\PublicTenderNoticeXOffice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PublicTenderNoticeXOfficeController extends Controller
{
    use FindAllActionTrait;
    use FindIdActionTrait;
    use CreateActionTrait;
    use UpdateActionTrait;
    use DeleteActionTrait;
    use DeleteMultipleActionTrait;

    /**
     * @OA\Get(
     *     path="/public_tender_notice_office",
     *     tags={"PublicTenderNoticeXOffice"},
     *     summary="GET PublicTenderNoticeXOffice",
     *     @OA\Parameter(
     *          ref="#/components/parameters/Authorization"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/order"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/limit"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/page"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/where"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/context"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/per_page"
     *     ),
     *      @OA\Parameter(
     *          ref="#/components/parameters/populate"
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Example not found"
     *     ),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\Schema(
     *              type="object",
     *              example={"code": 400, "message": "Bad Request"},
     *              @OA\Property(property="code", type="integer", description="Error code"),
     *              @OA\Property(property="message", type="string", description="Error description"),
     *          ),
     *      )
     * )
     *
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function find(Request $request)
    {
        return $this->findAll(new PublicTenderNoticeXOffice(), $request, PublicTenderNoticeXOffice::getAliasEntity(PublicTenderNoticeXOffice::ALIAS, 'M'));
    }

    /**
     * @OA\Get(
     *     path="/public_tender_notice_office/1",
     *     tags={"PublicTenderNoticeXOffice"},
     *     summary="GET PublicTenderNoticeXOffice",
     *     @OA\Parameter(
     *          ref="#/components/parameters/Authorization"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/context"
     *     ),
     *      @OA\Parameter(
     *          ref="#/components/parameters/populate"
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Example not found"
     *     ),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\Schema(
     *              type="object",
     *              example={"code": 400, "message": "Bad Request"},
     *              @OA\Property(property="code", type="integer", description="Error code"),
     *              @OA\Property(property="message", type="string", description="Error description"),
     *          ),
     *      )
     * )
     *
     * Display a listing of the resource.
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function show($id, Request $request)
    {
        return $this->findId($id, new PublicTenderNoticeXOffice(), $request, PublicTenderNoticeXOffice::getAliasEntity(PublicTenderNoticeXOffice::ALIAS, 'M'));
    }


    /**
     * @OA\Tag(
     *     name="PublicTenderNoticeXOffice",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://autopecadelivery.com/api/public_tender_notice_office"
     *     )
     * )
     * @OA\Post(
     *     path="/public_tender_notice_office",
     *     summary="Registro de um novo Edital e Estado",
     *     operationId="store",
     *     tags={"PublicTenderNoticeXOffice"},
     *
     *     @OA\Parameter(
     *          ref="#/components/parameters/Authorization"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/populate"
     *     ),
     *
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="initials",
     *                     type="string"
     *                 ),
     *                @OA\Property(
     *                     property="country_id",
     *                     type="string"
     *                 ),
     *                 example={
     *                  "name": "Miami",
     *                  "initials": "MI",
     *                  "country_id": 1,
     *                      }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PublicTenderNoticeXOfficeStoreRequest")
     *     ),
     *     @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\Schema(
     *          type="object",
     *          example={"code": 400, "message": "Bad Request"},
     *          @OA\Property(property="code", type="integer", description="Error code"),
     *          @OA\Property(property="message", type="string", description="Error description"),
     *          ),
     *      )
     * )
     * @param Request $request
     * @return null
     */
    public function store(Request $request)
    {
        return $this->create(new PublicTenderNoticeXOffice(), $request, PublicTenderNoticeXOffice::getAliasEntity(PublicTenderNoticeXOffice::ALIAS, 'M'));
    }

    /**
     * @OA\Tag(
     *     name="PublicTenderNoticeXOffice",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://autopecadelivery.com/api/public_tender_notice_office"
     *     )
     * )
     * @OA\Put(
     *     path="/public_tender_notice_office/1",
     *     summary="Atualizando Cardo do Edital",
     *     operationId="store",
     *     tags={"PublicTenderNoticeXOffice"},
     *
     *     @OA\Parameter(
     *          ref="#/components/parameters/Authorization"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/populate"
     *     ),
     *
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="initials",
     *                     type="string"
     *                 ),
     *                @OA\Property(
     *                     property="country_id",
     *                     type="string"
     *                 ),
     *                 example={
     *                  "name": "Miami",
     *                  "initials": "MI",
     *                  "country_id": 1,
     *                      }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PublicTenderNoticeXOfficeStoreRequest")
     *     ),
     *     @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\Schema(
     *          type="object",
     *          example={"code": 400, "message": "Bad Request"},
     *          @OA\Property(property="code", type="integer", description="Error code"),
     *          @OA\Property(property="message", type="string", description="Error description"),
     *          ),
     *      )
     * )
     * @param Request $request
     * @param $id
     * @return null
     */
    public function updateEntity(Request $request, $id)
    {
        return $this->update($id, new PublicTenderNoticeXOffice(), $request, PublicTenderNoticeXOffice::getAliasEntity(PublicTenderNoticeXOffice::ALIAS, 'M'));
    }

    /**
     * @OA\Delete(
     *     path="/public_tender_notice_office/1",
     *     summary="Deletando Edital e Estado",
     *     operationId="store",
     *     tags={"PublicTenderNoticeXOffice"},
     *
     *     @OA\Parameter(
     *          ref="#/components/parameters/Authorization"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/populate"
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\Schema(
     *          type="object",
     *          example={"code": 400, "message": "Bad Request"},
     *          @OA\Property(property="code", type="integer", description="Error code"),
     *          @OA\Property(property="message", type="string", description="Error description"),
     *          ),
     *      )
     * )
     *
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy($id, Request $request)
    {
        return $this->delete($id, new PublicTenderNoticeXOffice(), PublicTenderNoticeXOffice::getAliasEntity(PublicTenderNoticeXOffice::ALIAS, 'M'), $request);
    }

    /**
     * @OA\Delete(
     *     path="/public_tender_notice_office",
     *     summary="Deletando Edital e Estado",
     *     operationId="store",
     *     tags={"PublicTenderNoticeXOffice"},
     *
     *     @OA\Parameter(
     *          ref="#/components/parameters/Authorization"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/populate"
     *     ),
     *     @OA\Parameter(
     *          ref="#/components/parameters/where"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\Schema(
     *          type="object",
     *          example={"code": 400, "message": "Bad Request"},
     *          @OA\Property(property="code", type="integer", description="Error code"),
     *          @OA\Property(property="message", type="string", description="Error description"),
     *          ),
     *      )
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroyMultiple(Request $request)
    {
        return $this->deleteMultiple($request, PublicTenderNoticeXOffice::class, PublicTenderNoticeXOffice::getAliasEntity(PublicTenderNoticeXOffice::ALIAS, 'M'));
    }
}
