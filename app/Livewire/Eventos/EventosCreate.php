<?php

namespace App\Livewire\Eventos;

use App\Models\Eventos;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads; // Importando o trait necessário
class EventosCreate extends Component
{

    public $nome, $descricao, $tipo, $data_hora, $local_origem, $local_destino, $quantidade_disponivel, $preco, $imagem;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string|max:500',
        'tipo' => 'required|string',
        'data_hora' => 'required|date',
        'local_origem' => 'nullable|string|max:255',
        'local_destino' => 'required|string|max:255',
        'quantidade_disponivel' => 'required|integer|min:1',
        'preco' => 'required|numeric|min:0',
        'imagem' => 'nullable|image|max:10240',
    ];


    use WithFileUploads; // Adicionando o trait para permitir upload de arquivossssss
    // Método para salvar os dados
    public function salvar()
    {
        
        if ($this->imagem) {
            $nomeOriginal = time() . $this->imagem->getClientOriginalName(); // Obtém o nome original
            // $imagemPath = $this->imagem->storeAs('imagens', $nomeOriginal, 'public'); // Salva a imagem
            $imagemPath = $this->imagem->store('eventos', 'public');

        }


        $user_id = auth()->id();
        // Criação do evento
        Eventos::create([
            'id_user' => $user_id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'tipo' => $this->tipo,
            'data_hora' => $this->data_hora,
            'local_origem' => $this->local_origem,
            'local_destino' => $this->local_destino,
            'quantidade_disponivel' => $this->quantidade_disponivel,
            'preco' => $this->preco,
            'imagem' => $imagemPath ?? null,
        ]);

        // Resetar os campos do formulário
        
        $this->reset();
        $this->dispatch('toastr:success', ['message' => 'Evento cadastrado com sucesso!']);


        // return $this->redirect('/eventos');

        }

    public function render()
    {
        return view('livewire.eventos.eventos-create')->layout('components.layouts.app');
    }
}
