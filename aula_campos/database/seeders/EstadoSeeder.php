<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $estados = [
            ['id' => '1', 'nome_estado' => 'Acre', 'sigla' => 'AC'],
            ['id' => '2', 'nome_estado' => 'Alagoas', 'sigla' => 'AL'],
            ['id' => '3', 'nome_estado' => 'Amapá', 'sigla' => 'AP'],
            ['id' => '4', 'nome_estado' => 'Amazonas', 'sigla' => 'AM'],
            ['id' => '5', 'nome_estado' => 'Bahia', 'sigla' => 'BA'],
            ['id' => '6', 'nome_estado' => 'Ceará', 'sigla' => 'CE'],
            ['id' => '7', 'nome_estado' => 'Distrito Federal', 'sigla' => 'DF'],
            ['id' => '8', 'nome_estado' => 'Espírito Santo', 'sigla' => 'ES'],
            ['id' => '9', 'nome_estado' => 'Goiás', 'sigla' => 'GO'],
            ['id' => '10', 'nome_estado' => 'Maranhão', 'sigla' => 'MA'],
            ['id' => '11', 'nome_estado' => 'Mato Grosso', 'sigla' => 'MT'],
            ['id' => '12', 'nome_estado' => 'Mato Grosso do Sul', 'sigla' => 'MS'],
            ['id' => '13', 'nome_estado' => 'Minas Gerais', 'sigla' => 'MG'],
            ['id' => '14', 'nome_estado' => 'Pará', 'sigla' => 'PA'],
            ['id' => '15', 'nome_estado' => 'Paraíba', 'sigla' => 'PB'],
            ['id' => '16', 'nome_estado' => 'Paraná', 'sigla' => 'PR'],
            ['id' => '17', 'nome_estado' => 'Pernambuco', 'sigla' => 'PE'],
            ['id' => '18', 'nome_estado' => 'Piauí', 'sigla' => 'PI'],
            ['id' => '19', 'nome_estado' => 'Rio de Janeiro', 'sigla' => 'RJ'],
            ['id' => '20', 'nome_estado' => 'Rio Grande do Norte', 'sigla' => 'RN'],
            ['id' => '21', 'nome_estado' => 'Rio Grande do Sul', 'sigla' => 'RS'],
            ['id' => '22', 'nome_estado' => 'Rondônia', 'sigla' => 'RO'],
            ['id' => '23', 'nome_estado' => 'Roraima', 'sigla' => 'RR'],
            ['id' => '24', 'nome_estado' => 'Santa Catarina', 'sigla' => 'SC'],
            ['id' => '25', 'nome_estado' => 'São Paulo', 'sigla' => 'SP'],
            ['id' => '26', 'nome_estado' => 'Sergipe', 'sigla' => 'SE'],
            ['id' => '27', 'nome_estado' => 'Tocantins', 'sigla' => 'TO'],
        ];

        foreach($estados as $estado){
            if(!Estado::where('nome_estado', $estado['nome_estado'])->exists()){
                Estado::insert($estado);
            }
        }
        
    }
}
