<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Contato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-200 min-h-screen">
    <div class="max-w-lg mx-auto mt-10 p-8 bg-white/80 rounded-xl shadow-2xl backdrop-blur-md">
        <h1 class="text-2xl font-extrabold text-blue-900 mb-6">Detalhes do Contato</h1>
        <a href="{{ route('contacts.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Voltar à lista</a>

        <div class="mb-6">
            <div class="mb-2">
                <span class="font-semibold text-blue-800">ID:</span>
                <span>{{ $contact->id }}</span>
            </div>
            <div class="mb-2">
                <span class="font-semibold text-blue-800">Nome:</span>
                <span>{{ $contact->name }}</span>
            </div>
            <div class="mb-2">
                <span class="font-semibold text-blue-800">Contato:</span>
                <span>{{ $contact->contact }}</span>
            </div>
            <div class="mb-2">
                <span class="font-semibold text-blue-800">Email:</span>
                <span>{{ $contact->email }}</span>
            </div>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('contacts.edit', $contact) }}"
               class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow hover:bg-yellow-600 transition">
                Editar
            </a>
            <!-- Botão que abre o modal -->
            <button type="button"
                    onclick="document.getElementById('modal-confirm').classList.remove('hidden')"
                    class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition">
                Deletar
            </button>
        </div>
    </div>

    <!-- Modal de confirmação -->
    <div id="modal-confirm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
            <h2 class="text-xl font-bold text-red-600 mb-4">Confirmar Exclusão</h2>
            <p class="mb-6 text-gray-700">Tem certeza que deseja deletar este contato? Esta ação não pode ser desfeita.</p>
            <div class="flex justify-end space-x-3">
                <button type="button"
                        onclick="document.getElementById('modal-confirm').classList.add('hidden')"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                    Cancelar
                </button>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                        Confirmar
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
