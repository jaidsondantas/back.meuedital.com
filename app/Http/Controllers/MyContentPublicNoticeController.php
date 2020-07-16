<?php

namespace App\Http\Controllers;

use App\Actions\CreateActionTrait;
use App\Actions\DeleteActionTrait;
use App\Actions\DeleteMultipleActionTrait;
use App\Actions\FindAllActionTrait;
use App\Actions\FindIdActionTrait;
use App\Actions\Models\Where;
use App\Actions\UpdateActionTrait;
use App\Models\CategoryContent;
use App\Models\MyContentPublicNotice;
use App\Models\TypeKnowledge;
use App\Services\QueryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\NoticeContentOfficeController;

class MyContentPublicNoticeController extends Controller
{
    use FindAllActionTrait;
    use FindIdActionTrait;
    use CreateActionTrait;
    use UpdateActionTrait;
    use DeleteActionTrait;
    use DeleteMultipleActionTrait;

    /**
     * @OA\Get(
     *     path="/my_content_public_notice",
     *     tags={"MyContentPublicNotice"},
     *     summary="GET MyContentPublicNotice",
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
        $data = $this->findAll(new MyContentPublicNotice(), $request, MyContentPublicNotice::getAliasEntity(MyContentPublicNotice::ALIAS, 'M'));

        if (json_decode($data->content())->total > 0) {
            $typeKnowledges = [];
            $categoryContents = [];
            $data = json_decode($data->content());

            foreach ($data->entity->my_content_public_notices as $key => $myContent) {
                $typeKnowledges[$key] = $myContent->type_knowledge;
                $categoryContents[$key] = $myContent->category_content;
            }

            $dataFinal = [];

            $typeKnowledges = QueryService::myArrayUnique($typeKnowledges);
            $categoryContents = QueryService::myArrayUnique($categoryContents);

            foreach ($typeKnowledges as $key => $typeKnowledge) {
                $dataFinal['type_knowledge'][$key] = [
                    'id' => $typeKnowledge->id,
                    'name' => $typeKnowledge->name,
                    'category_content' => []
                ];
                foreach ($categoryContents as $keyCategoryContent => $category) {
                    $dataFinal['type_knowledge'][$key]['category_content'][$keyCategoryContent] = [
                        'id' => $category->id,
                        'name' => $category->name,
                        'my_contents' => []
                    ];

                    foreach ($data->entity->my_content_public_notices as $keyContent => $myContent) {
                        if ($typeKnowledge->id == $myContent->type_knowledge->id && $myContent->category_content->id == $category->id) {
                            $dataFinal['type_knowledge'][$key]['category_content'][$keyCategoryContent]['my_contents'][] = $myContent;
                        }
                    }
                }


            }
            $data->entity = $dataFinal;
            return response()->json($data);
        }
        return $data;

    }

    /**
     * @OA\Get(
     *     path="/my_content_public_notice/1",
     *     tags={"MyContentPublicNotice"},
     *     summary="GET MyContentPublicNotice",
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
        return $this->findId($id, new MyContentPublicNotice(), $request, MyContentPublicNotice::getAliasEntity(MyContentPublicNotice::ALIAS, 'M'));
    }


    /**
     * @OA\Tag(
     *     name="MyContentPublicNotice",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://autopecadelivery.com/api/my_content_public_notice"
     *     )
     * )
     * @OA\Post(
     *     path="/my_content_public_notice",
     *     summary="Registro de um novo Itens do meu edital",
     *     operationId="store",
     *     tags={"MyContentPublicNotice"},
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
     *                  "name": "Superior",
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
     *         @OA\JsonContent(ref="#/components/schemas/MyContentPublicNoticeStoreRequest")
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
        $noticeContentOfficeController = new NoticeContentOfficeController();
        $contents = $noticeContentOfficeController->find($request)->all();

        $myContentPublicNotice = [];

        foreach ($contents as $key => $content) {
            $myContentPublicNotice[$key] =
                [
                    'status' => false,
                    'candidate_id' => $request->input('candidate_id'),
                    'public_tender_notice_id' => $request->input('public_tender_notice_id'),
                    'office_id' => (int)$request->input('office_id'),
                    'content_id' => $content->contentId,
                    'category_content_id' => $content['category_content_id'],
                    'type_knowledge_id' => $content['type_knowledge_id'],
                    'created_by' => auth()->user()->id
                ];
        }

        $candidateId = $request->input('candidate_id');
        $officeId = $request->input('office_id');
        $publicTenderNotice = $request->input('public_tender_notice_id');

        $request->query->add(
            ['where' =>
                "{\"and\":{\"candidate_id\": \"eq:$candidateId\", \"office_id\": \"eq:$officeId\", \"public_tender_notice_id\": \"eq:$publicTenderNotice\"},\"or\":{}}"
            ]);

        $request->query->add(['per_page' => 1000]);
        $request->query->add(['page' => 1]);
        $request->query->add(['limit' => "10"]);
        $request->query->add(['order' => "{\"created_at\": \"ASC\"}"]);

        $itExists = $this->find($request);

        if($itExists && $itExists->original->total == 0){
            MyContentPublicNotice::insert($myContentPublicNotice);
            $data = $this->find($request);
        }else{
            $data = $itExists;
        }

        return response()->json($data->original, 200);
//        return $this->create(new MyContentPublicNotice(), $request, MyContentPublicNotice::getAliasEntity(MyContentPublicNotice::ALIAS, 'M'));
    }

    /**
     * @OA\Tag(
     *     name="MyContentPublicNotice",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://autopecadelivery.com/api/my_content_public_notice"
     *     )
     * )
     * @OA\Put(
     *     path="/my_content_public_notice/1",
     *     summary="Atualizando Itens do meu edital",
     *     operationId="store",
     *     tags={"MyContentPublicNotice"},
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
     *                  "name": "Superior",
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
     *         @OA\JsonContent(ref="#/components/schemas/MyContentPublicNoticeStoreRequest")
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
        return $this->update($id, new MyContentPublicNotice(), $request, MyContentPublicNotice::getAliasEntity(MyContentPublicNotice::ALIAS, 'M'));
    }

    /**
     * @OA\Delete(
     *     path="/my_content_public_notice/1",
     *     summary="Deletando Itens do meu edital",
     *     operationId="store",
     *     tags={"MyContentPublicNotice"},
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
        return $this->delete($id, new MyContentPublicNotice(), MyContentPublicNotice::getAliasEntity(MyContentPublicNotice::ALIAS, 'M'), $request);
    }

    /**
     * @OA\Delete(
     *     path="/my_content_public_notice",
     *     summary="Deletando Itens do meu edital",
     *     operationId="store",
     *     tags={"MyContentPublicNotice"},
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
        return $this->deleteMultiple($request, new MyContentPublicNotice(), MyContentPublicNotice::getAliasEntity(MyContentPublicNotice::ALIAS, 'M'));
    }
}
