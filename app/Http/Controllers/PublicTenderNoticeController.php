<?php

namespace App\Http\Controllers;

use App\Actions\CreateActionTrait;
use App\Actions\DeleteActionTrait;
use App\Actions\DeleteMultipleActionTrait;
use App\Actions\FindAllActionTrait;
use App\Actions\FindIdActionTrait;
use App\Actions\UpdateActionTrait;
use App\Models\PublicTenderNotice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PublicTenderNoticeController extends Controller
{
    use FindAllActionTrait;
    use FindIdActionTrait;
    use CreateActionTrait;
    use UpdateActionTrait;
    use DeleteActionTrait;
    use DeleteMultipleActionTrait;

    /**
     * @OA\Get(
     *     path="/public_tender_notice",
     *     tags={"PublicTenderNotice"},
     *     summary="GET PublicTenderNotice",
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
        return $this->findAll(new PublicTenderNotice(), $request, PublicTenderNotice::getAliasEntity(PublicTenderNotice::ALIAS, 'M'));
    }

    /**
     * @OA\Get(
     *     path="/public_tender_notice/1",
     *     tags={"PublicTenderNotice"},
     *     summary="GET PublicTenderNotice",
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
        return $this->findId($id, new PublicTenderNotice(), $request, PublicTenderNotice::getAliasEntity(PublicTenderNotice::ALIAS, 'M'));
    }


    /**
     * @OA\Tag(
     *     name="PublicTenderNotice",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://autopecadelivery.com/api/public_tender_notice"
     *     )
     * )
     * @OA\Post(
     *     path="/public_tender_notice",
     *     summary="Registro de um novo Editais",
     *     operationId="store",
     *     tags={"PublicTenderNotice"},
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
     *                  @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="year",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="organ_id",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="examination_board_id",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="status_public_tender_notice_id",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="created_by",
     *                     type="string"
     *                 ),
     *                 example={
     *                  "name": "Concurso SEDF",
     *                  "description": "Pense um pouco e responda: quantas janelas de oportunidades de fato significativas abrem-se durante uma vida?",
     *                  "year": "2020",
     *                  "organ_id": 2,
     *                  "examination_board_id": 1,
     *                  "status_public_tender_notice_id": 1,
     *                  "created_by": 2,
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
     *         @OA\JsonContent(ref="#/components/schemas/PublicTenderNoticeStoreRequest")
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
        return $this->create(new PublicTenderNotice(), $request, PublicTenderNotice::getAliasEntity(PublicTenderNotice::ALIAS, 'M'));
    }

    /**
     * @OA\Tag(
     *     name="PublicTenderNotice",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://autopecadelivery.com/api/public_tender_notice"
     *     )
     * )
     * @OA\Put(
     *     path="/public_tender_notice/1",
     *     summary="Atualizando Editais",
     *     operationId="store",
     *     tags={"PublicTenderNotice"},
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
     *                  @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="year",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="organ_id",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="examination_board_id",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="status_public_tender_notice_id",
     *                     type="string"
     *                 ),
     *                  @OA\Property(
     *                     property="created_by",
     *                     type="string"
     *                 ),
     *                 example={
     *                  "name": "Concurso SEDF",
     *                  "description": "Pense um pouco e responda: quantas janelas de oportunidades de fato significativas abrem-se durante uma vida?",
     *                  "year": "2020",
     *                  "organ_id": 2,
     *                  "examination_board_id": 1,
     *                  "status_public_tender_notice_id": 1,
     *                  "created_by": 2,
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
     *         @OA\JsonContent(ref="#/components/schemas/PublicTenderNoticeStoreRequest")
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
        return $this->update($id, new PublicTenderNotice(), $request, PublicTenderNotice::getAliasEntity(PublicTenderNotice::ALIAS, 'M'));
    }

    /**
     * @OA\Delete(
     *     path="/public_tender_notice/1",
     *     summary="Deletando Editais",
     *     operationId="store",
     *     tags={"PublicTenderNotice"},
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
        return $this->delete($id, new PublicTenderNotice(), PublicTenderNotice::getAliasEntity(PublicTenderNotice::ALIAS, 'M'), $request);
    }

    /**
     * @OA\Delete(
     *     path="/public_tender_notice",
     *     summary="Deletando Editais",
     *     operationId="store",
     *     tags={"PublicTenderNotice"},
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
        return $this->deleteMultiple($request, PublicTenderNotice::class, PublicTenderNotice::getAliasEntity(PublicTenderNotice::ALIAS, 'M'));
    }
}
