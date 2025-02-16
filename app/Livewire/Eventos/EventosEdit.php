<?php

namespace App\Livewire\Eventos;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Eventos;

class EventosEdit extends Component
{
    use WithFileUploads;

    public $evento;
    public $id, $nome, $descricao, $tipo, $data_hora, $local_origem, $local_destino, $quantidade_disponivel, $preco, $imagem;
    public $novaImagem;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'tipo' => 'required|string',
        'data_hora' => 'required|date',
        'local_origem' => 'required|string|max:255',
        'local_destino' => 'required|string|max:255',
        'quantidade_disponivel' => 'required|integer|min:1',
        'preco' => 'required|numeric|min:0',
        'novaImagem' => 'nullable|image|max:2048', // 2MB Máximo
    ];

    public function mount($id)
    {
        // Carregar o evento com o ID fornecido
        $this->evento = Eventos::find($id);

        if ($this->evento) {
            $this->id = $id;
            $this->nome = $this->evento->nome;
            $this->descricao = $this->evento->descricao;
            $this->tipo = $this->evento->tipo;
            $this->data_hora = $this->evento->data_hora;
            $this->local_origem = $this->evento->local_origem;
            $this->local_destino = $this->evento->local_destino;
            $this->quantidade_disponivel = $this->evento->quantidade_disponivel;
            $this->preco = $this->evento->preco;
            $this->imagem = $this->evento->imagem;
        } else {
            // Caso o evento não exista
            session()->flash('error', 'Evento não encontrado!');
            return redirect()->route('eventos.index');  // Redireciona para a lista de eventos
        }
    }

    public function atualizar()
    {
        $this->validate();
        // dd($this->all());
        // Atualizando o evento com os novos dados
        if ($this->novaImagem) {
            $imagemPath = $this->novaImagem->store('eventos', 'public');
            $this->evento->imagem = $imagemPath;
        }

        $this->evento->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'tipo' => $this->tipo,
            'data_hora' => $this->data_hora,
            'local_origem' => $this->local_origem,
            'local_destino' => $this->local_destino,
            'quantidade_disponivel' => $this->quantidade_disponivel,
            'preco' => $this->preco,
            'imagem' => $this->evento->imagem, // Usa a imagem atualizada
        ]);

        // $this->reset();
        $this->dispatch('toastr:success', ['message' => 'Evento Atualizado com sucesso!']);
    }

    public function render()
    {
        return view('livewire.eventos.eventos-edit');
    }
}
