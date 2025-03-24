<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    // nome da tabela
    protected $table = 'estados';
    //colunas a serem cadastradas
    protected $fillable = ['nome_estado', 'sigla'];

    //criar relacionamento (pai)
    public function cidade()
    {
        return $this->hasMany(Cidade::class);
    }
}
