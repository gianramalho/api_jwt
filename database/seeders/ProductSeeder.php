<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_array = [
            [ 
                "name" => "LEGO® Speed Champions Fast & Furious 1970 Dodge Charger", 
                "price" => 299.99, 
                "description" => "Experimenta de perto o Fast & Furious 1970 Dodge Charger R/T! Esta réplica fantástica do LEGO® Speed Champions do lendário carro musculado é agora tua para colecionar, construir e explorar. Recria as linhas icónicas do veículo peça a peça. E quando terminares, podes exibir orgulhosamente a tua criação ou colocar a minifigura Dominic Toretto atrás do volante e partir para a ação de corrida de alta velocidade!" 
            ],

            [ 
                "name" => "Apple iPhone 11 (64 GB) Preto", 
                "price" => 2951.99, 
                "description" => "Tela LCD Liquid Retina HD de 6,1 polegadas; Resistente a água e pó (até 30 minutos à profundidade máxima de 2 metros, IP68); Sistema de câmara dupla de 12 MP (Ultra grande angular, Grande angular e Teleobjetiva); modo Noite, modo Retrato e vídeos em 4K a 60 fps; Sistema de câmara frontal de 12 MP com modo Retrato, vídeos em 4K e câmara lenta; Face ID para autenticação segura; Conteúdo da caixa iPhone com iOS 14, cabo USB-C para Lightning, documentação" 
            ],

            [ 
                "name" => "Tênis Shuffle Mid Bdp, Puma, Masculino", 
                "price" => 265.99, 
                "description" => "Couro sintético - Borracha; Marca: PUMA; Tipo de produto: SHOES; Número do modelo: 384319; water_resistance_level: water_resistant" 
            ],
        ];

        foreach($data_array as $data)
        {
            Product::create($data);
        }
    }
}
