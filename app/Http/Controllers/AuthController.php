<?php

namespace App\Http\Controllers;


use App\Models\Candidate;
use App\User;
use Carbon\Carbon;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    /**
     * @OA\Tag(
     *     name="Auth",
     *     description="Credentials object",
     *     @OA\ExternalDocumentation(
     *         description="Credentials object",
     *         url="http://back.meuedital.com/api/oauth"
     *     )
     * )
     * @OA\Post(
     *     path="/auth/register",
     *     summary="Register new User",
     *     operationId="register",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password_confirmation",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="client_id",
     *                     type="string"
     *                 ),
     *                 example={
     *                      "name": "Jaidson",
     *                      "email": "jaidsondantas@gmail.com",
     *                      "password": "123",
     *                      "password_confirmation": "123",
     *                      "client_id": 1
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
     *         @OA\JsonContent(ref="#/components/schemas/UserStoreRequest")
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
     */

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
        ];

        $validator = Validator::make($request->all(), $rules, $this->getArrayMessagesValidate());
        if ($validator->fails()) {
            return response()->json(['message' => $validator->getMessageBag()], 400);
        }

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'firebaseUid' => $request->input('firebaseUid'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->save();

        if ($user && $request->input('password') == null) {
            $candidate = new Candidate([
                'name' => $request->input('name'),
                'user_id' => $user->id,
                'createdBy' => $user->id
            ]);

            $candidate->save();
        }

        return response()->json([
            'message' => 'Usuário criado com sucesso.',
            'entity' => $user
        ], 201);
    }

    /**
     * @OA\Post(
     *     path="/auth/login",
     *     summary="Generate new Token",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"email": "jaidsondantas@gmail.com", "password": "123"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserStoreRequest")
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
     * @return \Illuminate\Contracts\Support\MessageBag|\Illuminate\Http\JsonResponse|\Illuminate\Support\MessageBag
     */
    public function login(Request $request)
    {
        $auth = app('firebase.auth');

        $token = $request->headers->get('TokenApiGoogle');

        try {
            $verifiedIdToken = $auth->verifyIdToken($token);

        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'message' => 'Unauthorized - Can\'t parse the token: ' . $e->getMessage()
            ], 401);
        } catch (InvalidToken $e) {
            return response()->json([
                'message' => 'Unauthorized - Token is invalide: ' . $e->getMessage()
            ], 401);
        }

        $uid = $verifiedIdToken->getClaim('sub');

        $user = User::where('firebaseUid', $uid)->first();


        if ($user == null) {
            $request->request->add(['firebaseUid' => $uid]);
            $request->request->add(['name' => $verifiedIdToken->getClaim('email')]);
            $request->request->add(['email' => $verifiedIdToken->getClaim('email')]);

            $this->register($request);
        }

        $isCandidate = Candidate::where('user_id', $user->id)->first();

        if ($isCandidate == null) {
            $candidateData = new Candidate();

            $candidateData->name = $user->name;
            $candidateData->user = $user->id;
            $candidateData->createdBy = $user->id;

            $candidateData->save();
        }

        $user = User::where('firebaseUid', $uid)->first();

        $createToken = $user->createToken('Token de Acesso');
        $token = $createToken->accessToken;

        $createToken->token->expires_at = Carbon::now()->addDays(30);
        if ($request->remember_me) {
            $createToken->token->expires_at = Carbon::now()->addDays(30);
        }

        $createToken->token->save();

        return response()->json([
            'user' => $user->id,
            'accessToken' => $token,
            'tokenType' => 'Bearer',
            'expiresAt' => Carbon::parse(
                $createToken->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * @OA\Post(
     *     path="/auth/login_adm",
     *     summary="Generate new Token",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"email": "jaidsondantas@gmail.com", "password": "123"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserStoreRequest")
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
     * @return \Illuminate\Contracts\Support\MessageBag|\Illuminate\Http\JsonResponse|\Illuminate\Support\MessageBag
     */
    public function loginAdm(Request $request){
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ];

        $validator = Validator::make($request->all(), $rules, $this->getArrayMessagesValidate());
        if ($validator->fails()) {
            return $validator->getMessageBag();
        }

        $credentials = request(['email', 'password', 'active' => 1]);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Usuário ou senha inválido.'
            ], 401);
        }

        $user = $request->user();
        $createToken = $user->createToken('Token de Acesso');
        $token = $createToken->accessToken;

        $createToken->token->expires_at = Carbon::now()->addHours(5);


        $createToken->token->save();

        return response()->json([
            'accessToken' => $token,
            'tokenType' => 'Bearer',
            'expiresAt' => Carbon::parse(
                $createToken->token->expires_at
            )->toDateTimeString(),
            'user' => $user
        ]);
    }


    /**
     * @OA\Post(
     *     path="/auth/logout",
     *     operationId="logout",
     *     tags={"Auth"},
     *     summary="Logout User",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Example not found"
     *     )
     * )
     *
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Deslogado com sucesso.'
        ], 200
        );
    }

}
