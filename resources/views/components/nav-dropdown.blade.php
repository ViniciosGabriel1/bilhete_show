@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-3 py-6 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
                : 'inline-flex items-center px-3 py-6 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<div x-data="{ open: false }" class="relative">
    <!-- Botão do Dropdown -->
    <button @click="open = !open" class="{{ $classes }}">
        {{ __('Eventos') }}
        <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <!-- Menu Dropdown -->
    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">
        <x-dropdown-link :href="route('eventos.index')">
            {{ __('Listar Eventos') }}
        </x-dropdown-link>
        <x-dropdown-link :href="route('eventos.create')">
            {{ __('Criar Evento') }}
        </x-dropdown-link>
    </div>
</div>
