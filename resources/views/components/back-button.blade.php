<div class="m-5 mx-1 pr-5 flex justify-left">
    <button type="button" onclick="window.history.back()"
        class="w-auto px-6 py-3 bg-indigo-600  text-white font-semibold rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition duration-300 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        {{ $texto ?? 'Voltar' }}
    </button>
</div>
