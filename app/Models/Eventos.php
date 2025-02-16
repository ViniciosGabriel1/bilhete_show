<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Eventos extends Model
{
    protected $table = 'eventos'; // Nome da tabela no banco

    protected $fillable = [
        'id_user',
        'nome',
        'descricao',
        'tipo',
        'data_hora',
        'local_origem',
        'local_destino',
        'quantidade_disponivel',
        'preco',
        'imagem'
    ];

    /**
     * Relacionamento: Um evento pertence a um usuário
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id'); // Relacionamento com a chave 'id_user'
    }
}
