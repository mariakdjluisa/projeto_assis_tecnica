<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class TipoServico extends Model
{
    protected $table = 'tipos_servico';
    protected $fillable = ['nome', 'valor_base', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}