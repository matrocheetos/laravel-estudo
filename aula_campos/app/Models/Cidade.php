<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';
    protected $fillable = ['nome_cidade', 'estado_id'];

    //criar relacionamento (filho)
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
