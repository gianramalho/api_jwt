<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Retorna todos os produtos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::all();

        // Retorna uma resposta JSON com status "sucesso" e dados dos produtos
        return response()->json([
            'status' => 'success',
            'data' => $products
        ], 200);
    }

    /**
     * Cria um novo produto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Valida os dados de entrada
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        // Cria um novo produto com os dados validados
        $product = Product::create($validatedData);

        // Retorna uma resposta JSON com status "sucesso" e dados do novo produto
        return response()->json([
            'status' => 'success',
            'message' => 'O produto foi criado com sucesso.',
            'data' => $product
        ], 201);
    }

    /**
     * Retorna um produto pelo seu ID.
     *
     * @param int $id ID do produto a ser retornado
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            // Tenta encontrar o produto pelo ID
            $product = Product::findOrFail($id);

            // Retorna uma resposta JSON com status "sucesso" e dados do produto
            return response()->json([
                'status' => 'success',
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            // Se não encontrar o produto, retorna uma resposta JSON com status "erro" e mensagem de erro
            return response()->json([
                'status' => 'error',
                'message' => 'Nenhum produto encontrado com o ID especificado.'
            ], 404);
        }
    }

    /**
     * Atualiza um produto existente pelo seu ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id ID do produto a ser atualizado
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            // Tenta encontrar o produto pelo ID
            $product = Product::findOrFail($id);

            // Valida os dados de entrada
            $validatedData = $request->validate([
                'name' => ['string', 'max:255'],
                'description' => ['string'],
                'price' => ['numeric', 'min:0'],
            ]);

            // Atualiza os dados do produto com os dados validados
            $product->update($validatedData);

            // Retorna uma resposta JSON com status "sucesso" e dados do produto atualizado
            return response()->json([
                'status' => 'success',
                'message' => 'O produto foi editado com sucesso.',
                'data' => $product
            ], 200);

        } catch  (ModelNotFoundException $e) {
            // Retorna erro caso não encontre o produto
            return response()->json([
                'status' => 'error',
                'message' => 'Nenhum produto encontrado com o ID especificado.'
            ], 404);
        }
    }

    public function destroy($id)
{
    try {
        // Tenta encontrar o produto pelo ID
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Produto excluído com sucesso.'
        ], 200);
    } catch (ModelNotFoundException $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Nenhum produto encontrado com o ID especificado.'
        ], 404);
    }
}
}