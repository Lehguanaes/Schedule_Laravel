<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = ['nome_cliente', 'telefone_cliente', 'tipo_telefone_cliente', 'data_cadastro_cliente', 'observacao_cliente'];
}