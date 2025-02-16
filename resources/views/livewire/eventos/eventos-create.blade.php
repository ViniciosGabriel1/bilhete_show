    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-5">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Cadastrar Evento</h2>

        <form wire:submit.prevent="salvar" class="space-y-6">

            <!-- Nome do Evento -->
            <div>
                <label for="nome" class="block text-sm font-semibold text-gray-700">Nome do Evento12</label>
                <input type="text" id="nome" wire:model="nome"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required>
                @error('nome')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descrição -->
            <div>
                <label for="descricao" class="block text-sm font-semibold text-gray-700">Descrição</label>
                <textarea id="descricao" wire:model="descricao"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    rows="3"></textarea>
                @error('descricao')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo de Evento -->
            <div>
                <label for="tipo" class="block text-sm font-semibold text-gray-700">Tipo de Evento</label>
                <select id="tipo" wire:model="tipo"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="evento">Evento</option>
                    <option value="viagem">Viagem</option>
                </select>
                @error('tipo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Data e Hora -->
            <div>
                <label for="data_hora" class="block text-sm font-semibold text-gray-700">Data e Hora</label>
                <input type="datetime-local" id="data_hora" wire:model="data_hora"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required>
                @error('data_hora')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Locais -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="local_origem" class="block text-sm font-semibold text-gray-700">Local de Origem</label>
                    <input type="text" id="local_origem" wire:model="local_origem"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('local_origem')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="local_destino" class="block text-sm font-semibold text-gray-700">Local de Destino</label>
                    <input type="text" id="local_destino" wire:model="local_destino"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    @error('local_destino')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Quantidade e Preço -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="quantidade_disponivel" class="block text-sm font-semibold text-gray-700">Quantidade Disponível</label>
                    <input type="number" id="quantidade_disponivel" wire:model="quantidade_disponivel"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    @error('quantidade_disponivel')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="preco" class="block text-sm font-semibold text-gray-700">Preço (R$)</label>
                    <input type="number" step="0.01" id="preco" wire:model="preco"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    @error('preco')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Upload de Imagem -->
            <div>
                <label for="imagem" class="block text-sm font-semibold text-gray-700">Imagem do Evento</label>
                <input type="file" id="imagem" wire:model="imagem"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('imagem')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Exibir prévia da imagem -->
            @if ($imagem)
                <div class="flex justify-center mt-4">
                    <img src="{{ $imagem->temporaryUrl() }}" class="rounded-lg shadow-md w-48">
                </div>
            @endif

            <!-- Botão de Submissão -->
            <div class="flex justify-center">
                <button type="submit"
                    class="w-full px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300">
                    Cadastrar Evento
                </button>
            </div>

        </form>

    
    </div>
