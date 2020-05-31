<?php
/**
 * @OA\Parameter(
 *      parameter="order",
 *      in="query",
 *      name="order",
 *      description="<p>Examples:</p> <pre><em>order: {'principal': 'ASC'}      = ORDER BY entity.principal ASC<br>order: {'criadoEm': 'DESC'}      = ORDER BY entity.criadoEm DESC </em></pre>",
 *      required=true,
 *      @OA\Schema(
 *          type="string",
 *          default={"created_at": "ASC"}
 *      )
 * ),
 * @OA\Parameter(
 *      parameter="limit",
 *      in="query",
 *      name="limit",
 *      description="<p>Examples:</p> <pre><em>limit: 10</em></pre>",
 *      required=true,
 *      @OA\Schema(
 *          type="integer",
 *          default=10
 *      )
 * ),
 * @OA\Parameter(
 *      parameter="page",
 *      in="query",
 *      name="page",
 *      description="<p>Examples:</p> <pre><em>offset: 0</em></pre>",
 *      required=true,
 *      @OA\Schema(
 *          type="integer",
 *          default=1
 *      )
 * ),
 * @OA\Parameter(
 *      parameter="where",
 *      in="query",
 *      name="where",
 *      description="examples: <br/> <pre><em>where: {'id': 'eq:1'}                       | WHERE entity.id = 1<br>where: {'id': 'neq:1'}                      | WHERE entity.id != 1<br>where: {'id': 'like:1%}                     | WHERE entity.id like ('1%')<br>where: {'id': 'notLike:1%'}                 | WHERE entity.id not like ('1%')<br>where: {'id': 'gt:1'}                       | WHERE entity.id  1<br>where: {'id': 'gte:1'}                      | WHERE entity.id = 1<br>where: {'id': 'lt:1'}                       | WHERE entity.id &lt; 1<br>where: {'id': 'lte:1'}                      | WHERE entity.id = 1<br>where: {'id': 'in:[1,2,3,4]'}               | WHERE entity.id in (1,2,3,4)<br>where: {'id': 'notIn:[1,2,3,4]'}            | WHERE entity.id not in (1,2,3,4)<br>where: {'id': 'isNull'}                     | WHERE entity.id isNull<br>where: {'id': 'isNotNull'}                  | WHERE entity.id isNotNull<br>where: [{'id': 'eq:1'},{'id': 'eq:2'}]      | WHERE entity.id = 1 or entity.id = 2</em></pre>",
 *      @OA\Schema(
 *          type="string",
 *          default={"and": {}, "or":{}}
 *      ),
 * ),
 * @OA\Parameter(
 *      parameter="context",
 *      in="query",
 *      name="context",
 *      description="examples: <br/> <pre><em>{'context': '12345678'}</em></pre>",
 *      @OA\Schema(
 *          type="string",
 *          default="{}"
 *      ),
 * ),
 *
 * @OA\Parameter(
 *      parameter="per_page",
 *      in="query",
 *      name="per_page",
 *      description="examples: <br/> <pre><em>5</em></pre>",
 *      @OA\Schema(
 *          type="string",
 *          default="15"
 *      ),
 * ),
 *
 *  * @OA\Parameter(
 *      parameter="populate",
 *      in="query",
 *      name="populate",
 *      description="examples: <br/> <pre><em>['populateAll']</em></pre>",
 *      @OA\Schema(
 *          type="string",
 *          default={"populateAll"}
 *      ),
 * ),
 * @OA\Parameter(
 *      parameter="Authorization",
 *      in="header",
 *      name="Authorization",
 *      description="examples: <br/> <pre><em>Bearer </em></pre>",
 *      @OA\Schema(
 *          type="string",
 *          default="Bearer {{api_token}}"
 *      ),
 * ),
 *
 */
