<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TipoServico;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $fillable = ['nome', 'descricao'];

    public function tiposServico()
    {
        return $this->hasMany(TipoServico::class);
    }
}
