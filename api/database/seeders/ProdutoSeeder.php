<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            [
                'nome' => 'Leite',
                'preco' => 3.5,
                'tipo' => 'Alimento',
                'quantidade' => 20,
                'foto' => 'products/leite.jpg',
            ],
            [
                'nome' => 'Coca Cola 2L',
                'preco' => 7.99,
                'tipo' => 'Bebida',
                'quantidade' => 15,
                'foto' => 'products/Nunes-Bebidas-COCA-COLA-PET-2-LITROS.jpg',
            ],
            [
                'nome' => 'Chocolate Kit Kat',
                'preco' => 4.25,
                'tipo' => 'Doce',
                'quantidade' => 30,
                'foto' => 'products/chocolate kit kat.jpg',
            ],
            [
                'nome' => 'Fogão Itatiaia',
                'preco' => 899.99,
                'tipo' => 'Eletrodoméstico',
                'quantidade' => 5,
                'foto' => 'products/Midia_EscolhaCerta_Produtos_Forno-Turbo-Fischer-48-LitrosArtboard-2-copy-4-1.jpg',
            ],
            [
                'nome' => 'Geladeira',
                'preco' => 1899.99,
                'tipo' => 'Eletrodoméstico',
                'quantidade' => 3,
                'foto' => 'products/geladeira-brastemp-350l-duplex-frost-free-cinza-.jpg',
            ],
            [
                'nome' => 'Mesa de Jantar',
                'preco' => 599.99,
                'tipo' => 'Móvel',
                'quantidade' => 8,
                'foto' => 'products/Mesa de jantar branca.jpg',
            ],
            [
                'nome' => 'Celular Samsung Galaxy',
                'preco' => 2599.99,
                'tipo' => 'Eletrônico',
                'quantidade' => 12,
                'foto' => 'products/Samsung galaxy A20.jpg',
            ],
        ];

        foreach ($produtos as $produto) {
            // Copia as imagens para a pasta public/storage/products
            $sourcePath = base_path('resources/images/' . basename($produto['foto']));
            $destinationPath = storage_path('app/public/' . $produto['foto']);

            if (File::exists($sourcePath) && !File::exists($destinationPath)) {
                File::copy($sourcePath, $destinationPath);
            }

            Produto::create([
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'tipo' => $produto['tipo'],
                'quantidade' => $produto['quantidade'],
                'foto' => $produto['foto'],
            ]);
        }
    }
}
