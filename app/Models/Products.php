<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'descricao',
        'tipo',
        'situacao',
        'unidade',
        'preco',
        'precoCusto',
        'descricaoCurta',
        'descricaoComplementar',
        'dataInclusao',
        'dataAlteracao',
        'imageThumbnail',
        'urlVideo',
        'nomeFornecedorc',
        'codigoFabricante',
        'marca',
        'class_fiscal',
        'cest',
        'origem',
        'idGrupoProduto',
        'linkExterno',
        'observacoes',
        'grupoProduto',
        'garantia',
        'descricaoFornecedor',
        'idFaabricante',
        'pesoLiq',
        'pesoBruto',
        'estoqueMinimo',
        'estoqueMaximo',
        'gtin',
        'gtinEmbalagem',
        'larguraProduto',
        'alturaProduto',
        'profundidadeProduto',
        'unidadeMedida',
        'itensPorCaixa',
        'volumes',
        'localizacao',
        'crossdocking',
        'condicao',
        'freteGratis',
        'producao',
        'dataValidade',
        'spedTipoItem',
        'categoria_id'
    ];
    

    public function categoria(){
        return $this->belongsTo(Categories_products::class, 'categoria_id', 'id');
    }
}
