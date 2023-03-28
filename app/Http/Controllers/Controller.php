<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="API de produtos",
 *      version="1.0.0",
 *      description="API para acessar os recursos de produtos",
 *      @OA\Contact(
 *          email="gian15249@gmail.com",
 *          name="Suporte da minha API"
 *      )
 * )
 * @OA\Post(
 *      path="/api/login",
 *      tags={"Autenticação"},
 *      summary="Realiza o login do usuário na aplicação",
 *      description="Retorna o token de acesso do usuário para autenticação nas rotas protegidas da API",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  required={"email", "password"},
 *                  @OA\Property(
 *                      property="email",
 *                      type="string",
 *                      format="email",
 *                      example="gian.ramalho@teste.com"
 *                  ),
 *                  @OA\Property(
 *                      property="password",
 *                      type="string",
 *                      format="password",
 *                      example="password"
 *                  ),
 *              ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Login realizado com sucesso",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  example="success"
 *              ),
 *              @OA\Property(
 *                   property="authorization",
 *                  type="object",
 *                          @OA\Property(
 *                                  property="token",
 *                                  type="string",
 *                                  example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjc5OTU5MDUxLCJleHAiOjE2Nzk5NjI2NTEsIm5iZiI6MTY3OTk1OTA1MSwianRpIjoiUUwzUnJqaXBpOGcyY0dNSyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.7YnEcK0jC1TkzSnf5whzDgTtafJP3Zqx0hdebBpxDOc"
 *                          ),
 *                          @OA\Property(
 *                                  property="type",
 *                                  type="string",
 *                                  example="bearer"
 *                          ),
 *                      )
 *             )
 *     )
 * )
 * 
 * @OA\Post(
 *     path="/api/logout",
 *     summary="Logout user",
 *     description="Remove o token de acesso do usuário para autenticação nas rotas protegidas da API",
 *     operationId="logout",
 *     security={{"bearerAuth": {}}},
 *     tags={"Autenticação"},
 *     @OA\Response(
 *         response="200",
 *         description="Logout feito com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="status",
 *                 type="string",
 *                 example="success"
 *             ),
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Desconectado"
 *             ),
 *         ),
 *     ),
 *     ),
 * )

 * @OA\Get(
 *     path="/api/produtos",
 *     operationId="index",
 *     tags={"Produtos"},
 *     summary="Listagem de produtos",
 *     description="Retorna uma lista de todos os produtos cadastrados.",
 *     @OA\Response(
 *         response=200,
 *         description="Listagem de produtos",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(
 *                     property="id",
 *                     description="ID do produto",
 *                     type="integer",
 *                     example=2
 *                 ),
 *                 @OA\Property(
 *                     property="name",
 *                     description="Nome do produto",
 *                     type="string",
 *                     example="Apple iPhone 11 (64 GB) Preto"
 *                 ),
 *                 @OA\Property(
 *                     property="price",
 *                     description="Preço do produto",
 *                     type="number",
 *                     format="float",
 *                     example=2951.99
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     description="Descrição do produto",
 *                     type="string",
 *                     example="Tela LCD Liquid Retina HD de 6,1 polegadas; Resistente a água e pó (até 30 minutos à profundidade máxima de 2 metros, IP68); Sistema de câmara dupla de 12 MP (Ultra grande angular, Grande angular e Teleobjetiva); modo Noite, modo Retrato e vídeos em 4K a 60 fps; Sistema de câmara frontal de 12 MP com modo Retrato, vídeos em 4K e câmara lenta; Face ID para autenticação segura; Conteúdo da caixa iPhone com iOS 14, cabo USB-C para Lightning, documentação"
 *                 ),
 *                 @OA\Property(
 *                     property="created_at",
 *                     description="Data de criação do produto",
 *                     type="string",
 *                     format="date-time",
 *                     example="2023-03-28T00:39:46.000000Z"
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     description="Data da última atualização do produto",
 *                     type="string",
 *                     format="date-time",
 *                     example="2023-03-28T00:39:46.000000Z"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 description="Mensagem de erro",
 *                 type="string",
 *                 example="Unauthenticated"
 *             )
 *         )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 * @OA\Get(
 *     path="/api/produtos/{id}",
 *     summary="Exibe informações de um produto específico",
 *     description="Retorna as informações de um produto, baseado no ID informado.",
 *     operationId="showProductById",
 *     tags={"Produtos"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID do produto",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Informações do produto",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="status",
 *                 type="string",
 *                 example="success"
 *             ),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     example=2
 *                 ),
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     example="Apple iPhone 11 (64 GB) Preto"
 *                 ),
 *                 @OA\Property(
 *                     property="price",
 *                     type="number",
 *                     format="float",
 *                     example=2951.99
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     type="string",
 *                     example="Tela LCD Liquid Retina HD de 6,1 polegadas; Resistente a água e pó (até 30 minutos à profundidade máxima de 2 metros, IP68); Sistema de câmara dupla de 12 MP (Ultra grande angular, Grande angular e Teleobjetiva); modo Noite, modo Retrato e vídeos em 4K a 60 fps; Sistema de câmara frontal de 12 MP com modo Retrato, vídeos em 4K e câmara lenta; Face ID para autenticação segura; Conteúdo da caixa iPhone com iOS 14, cabo USB-C para Lightning, documentação"
 *                 ),
 *                 @OA\Property(
 *                     property="created_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2023-03-28T00:39:46.000000Z"
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     example="2023-03-28T00:39:46.000000Z"
 *                 ),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Produto não encontrado",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="status",
 *                 type="string",
 *                 example="error"
 *             ),
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Nenhum produto encontrado com o ID especificado."
 *             ),
 *         ),
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     }
 * )

 * @OA\Post(
 *     path="/api/produtos",
 *     summary="Cria um novo produto",
 *     tags={"Produtos"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     description="Nome do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     type="string",
 *                     description="Descrição do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="price",
 *                     type="number",
 *                     format="float",
 *                     description="Preço do produto"
 *                 ),
 *                 required={"name", "price"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="Produto criado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="status",
 *                 type="string",
 *                 example="success"
 *             ),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     description="Nome do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     type="string",
 *                     description="Descrição do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="price",
 *                     type="number",
 *                     format="float",
 *                     description="Preço do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     description="Data e hora da última atualização do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="created_at",
 *                     type="string",
 *                     format="date-time",
 *                     description="Data e hora da criação do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     description="ID do produto"
 *                 )
 *             )
 *         )
 *     ),
 *      @OA\Response(
 *          response=401,
 *          description="Não autenticado",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Unauthenticated."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Erro de validação",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="O campo nome é obrigatório. (e mais 1 erro)"
 *              ),
 *              @OA\Property(
 *                  property="errors",
 *                  type="object",
 *                  example={
 *                      "name": {"O campo nome é obrigatório."},
 *                      "price": {"O campo price é obrigatório."}
 *                  }
 *              )
 *          )
 *      )
 * )
 * @OA\Post(
 *      path="/produtos/{id}",
 *      operationId="updateProduct",
 *      tags={"Produtos"},
 *      summary="Atualiza um produto existente pelo ID",
 *      description="Atualiza um produto existente pelo ID.",
 *      @OA\Parameter(
 *          name="id",
 *          description="ID do produto a ser atualizado.",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer",
 *              format="int64"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          description="Objeto do produto a ser atualizado",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="name",
 *                  type="string",
 *                  description="Nome do produto",
 *                  example="Nome do produto"
 *              ),
 *              @OA\Property(
 *                  property="description",
 *                  type="string",
 *                  description="Descrição do produto",
 *                  example="Descrição do produto"
 *              ),
 *              @OA\Property(
 *                  property="price",
 *                  type="number",
 *                  description="Preço do produto",
 *                  example=10.99
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Produto atualizado com sucesso",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  description="Status da resposta",
 *                  example="success"
 *              ),
 *              @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     description="Nome do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     type="string",
 *                     description="Descrição do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="price",
 *                     type="number",
 *                     format="float",
 *                     description="Preço do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     description="Data e hora da última atualização do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="created_at",
 *                     type="string",
 *                     format="date-time",
 *                     description="Data e hora da criação do produto"
 *                 ),
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     description="ID do produto"
 *                 )
 *             )
 *          )
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Erro de validação",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="O campo nome é obrigatório. (e mais 1 erro)"
 *              ),
 *              @OA\Property(
 *                  property="errors",
 *                  type="object",
 *                  example={
 *                      "name": {"O campo nome é obrigatório."},
 *                      "price": {"O campo price é obrigatório."}
 *                  }
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Não autenticado",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  description="Mensagem de erro",
 *                  example="Unauthenticated."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Produto não encontrado",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  description="Status da resposta",
 *                  example="error"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  description="Mensagem de erro",
 *                  example="Nenhum produto encontrado com o ID especificado."
 *              )
 *          )
 *      )
 * )
 * @OA\Delete(
 *     path="/produtos/{id}",
 *     operationId="destroyProduct",
 *     tags={"Produtos"},
 *     summary="Exclui um produto pelo ID",
 *     description="Exclui um produto pelo ID informado na URL",
 *     @OA\Parameter(
 *         name="id",
 *         description="ID do produto a ser excluído",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Produto excluído com sucesso.",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="message", type="string", example="Produto excluído com sucesso.")
 *         )
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Não autorizado.",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthenticated.")
 *         )
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Produto não encontrado.",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="error"),
 *             @OA\Property(property="message", type="string", example="Nenhum produto encontrado com o ID especificado.")
 *         )
 *     )
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
