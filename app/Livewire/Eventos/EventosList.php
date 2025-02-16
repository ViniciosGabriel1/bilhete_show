<?php


namespace App\Livewire\Eventos;

use App\Models\Eventos;
use Livewire\Component;
use Livewire\WithPagination;

class EventosList extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'nome';
    public $sortDirection = 'asc';

    // Método de renderização
    public function render()
    {

        // dd($this- >search);
        $events = Eventos::query()
            ->where('nome', 'like', '%' . $this->search . '%')
            ->orWhere('data_hora', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10); // Defina o número de itens por página

        return view('livewire.eventos.eventos-list', [
            'events' => $events,
        ]);
    }

    // Método para aplicar ordenação
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
}
