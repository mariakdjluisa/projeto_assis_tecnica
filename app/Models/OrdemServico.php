<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table = 'ordens_servico';
    protected $fillable = [
        'cliente_id',
        'tipo_equipamento_id',
        'tipo_servico_id',
        'marca_modelo',
        'numero_serie',
        'defeito_relatado',
        'status',
        'data_entrada',
        'data_previsao',
        'data_conclusao',
        'valor_orcado',
        'valor_final',
        'observacoes',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tipoEquipamento()
    {
        return $this->belongsTo(TipoEquipamento::class);
    }

    public function tipoServico()
    {
        return $this->belongsTo(TipoServico::class);
    }
}