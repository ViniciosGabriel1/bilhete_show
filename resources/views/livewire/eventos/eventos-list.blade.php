<div class="container mx-auto px-4 py-6">
    <x-back-button texto="Voltar"/>  

    <!-- Barra de pesquisa -->
    <div class="mb-8 flex justify-center">
        <div class="relative w-full max-w-lg">
            <input type="text" wire:model.live="search" placeholder="Pesquise eventos por nome ou tipo..."
                class="w-full p-4 pl-12 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 16l4-4m0 0l-4-4m4 4H7" />
                </svg>
            </span>
        </div>
    </div>

    <!-- Lista de eventos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($events as $event)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img class="w-full h-48 object-cover"
                    src="{{ $event->imagem ? asset('storage/' . $event->imagem) : asset('/assets/images/evento.jpg') }}"
                    alt="{{ $event->nome }}">
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-900 mb-3">{{ $event->nome }}</h2>
                    <p class="text-gray-600 text-sm mb-4">{{ \Illuminate\Support\Str::limit($event->descricao, 120) }}
                    </p>
                    <div class="space-x-3 mb-4">
                        <span
                            class="bg-gray-200 text-gray-700 text-xs py-1 px-6 rounded-full">{{ $event->tipo }}</span>
                        <span class="bg-gray-200 text-gray-700 text-xs py-1 px-6 min-w-max rounded-full">De:
                            {{ $event->local_origem }}</span>
                        <span class="bg-gray-200 text-gray-700 text-xs py-1 px-4 min-w-max rounded-full">Para:
                            {{ $event->local_destino }}</span>
                    </div>

                    <div class="flex justify-between items-center text-sm text-green-700 mb-4">
                        <span>R$ {{ number_format($event->preco, 2, ',', '.') }}</span>
                        <span class="text-{{ $event->quantidade_disponivel > 10 ? 'green' : 'red' }}-700">
                            {{ $event->quantidade_disponivel }} disponível
                        </span>
                    </div>
                    <div class="flex justify-between items-center text-xs text-gray-500 relative">
                        <span>{{ \Carbon\Carbon::parse($event->data_hora)->format('d/m/Y H:i') }}</span>

                        <div x-data="{ open: false }" class="relative">
                            <!-- Botão de opções -->
                            <button @click="open = !open"
                                class="left-2 relative flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out focus:outline-none">
                                <strong class="text-xl">⋮</strong>
                            </button>


                            <!-- Menu suspenso ao lado direito dos 3 pontos -->
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-7 bottom-0  w-15 bg-white shadow-lg rounded-md z-50 border border-gray-200">
                                <a href="{{ route('eventos.edit', $event->id) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Editar
                                </a>
                                <form action="{{ route('eventos.destroy', $event->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="mt-8">
        {{ $events->links() }}
    </div>
</div>
