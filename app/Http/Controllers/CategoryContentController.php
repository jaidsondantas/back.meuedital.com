<?php

namespace App\Http\Controllers;

use App\Actions\CreateActionTrait;
use App\Actions\DeleteActionTrait;
use App\Actions\DeleteMultipleActionTrait;
use App\Actions\FindAllActionTrait;
use App\Actions\FindIdActionTrait;
use App\Actions\UpdateActionTrait;
use App\Models\CategoryContent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryContentController extends Controller
{
    use FindAllActionTrait;
    use FindIdActionTrait;
    use CreateActionTrait;
    use UpdateActionTrait;
    use DeleteActionTrait;
    use DeleteMultipleActionTrait;

    /**
     * @OA\Get(
     *     path="/category_content",
     *     tags={"CategoryContent"},
     *     summary="GET CategoryContent",
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
        return $this->findAll(new CategoryContent(), $request, CategoryContent::getAliasEntity(CategoryContent::ALIAS, 'M'));
    }

    /**
     * @OA\Get(
     *     path="/category_content/1",
     *     tags={"CategoryContent"},
     *     summary="GET CategoryContent",
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
        return $this->findId($id, new CategoryContent(), $request, CategoryContent::getAliasEntity(CategoryContent::ALIAS, 'M'));
    }


    /**
     * @OA\Tag(
     *     name="CategoryContent",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://autopecadelivery.com/api/category_content"
     *     )
     * )
     * @OA\Post(
     *     path="/category_content",
     *     summary="Registro de um novo Categoria de Conteúdo",
     *     operationId="store",
     *     tags={"CategoryContent"},
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
     *                 example={
     *                  "name": "Miami",
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
     *         @OA\JsonContent(ref="#/components/schemas/CategoryContentStoreRequest")
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
        return $this->create(new CategoryContent(), $request, CategoryContent::getAliasEntity(CategoryContent::ALIAS, 'M'));
    }

    /**
     * @OA\Tag(
     *     name="CategoryContent",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://autopecadelivery.com/api/category_content"
     *     )
     * )
     * @OA\Put(
     *     path="/category_content/1",
     *     summary="Atualizando Categoria de Conteúdo",
     *     operationId="store",
     *     tags={"CategoryContent"},
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
     *                 example={
     *                  "name": "Miami",
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
     *         @OA\JsonContent(ref="#/components/schemas/CategoryContentStoreRequest")
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
        return $this->update($id, new CategoryContent(), $request, CategoryContent::getAliasEntity(CategoryContent::ALIAS, 'M'));
    }

    /**
     * @OA\Delete(
     *     path="/category_content/1",
     *     summary="Deletando Categoria de Conteúdo",
     *     operationId="store",
     *     tags={"CategoryContent"},
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
        return $this->delete($id, new CategoryContent(), CategoryContent::getAliasEntity(CategoryContent::ALIAS, 'F'), $request);
    }

    /**
     * @OA\Delete(
     *     path="/category_content",
     *     summary="Deletando Categoria de Conteúdo",
     *     operationId="store",
     *     tags={"CategoryContent"},
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
        return $this->deleteMultiple($request, new CategoryContent(), CategoryContent::getAliasEntity(CategoryContent::ALIAS, 'M'));
    }
}
