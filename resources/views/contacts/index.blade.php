<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contatos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-200 min-h-screen">
    <div class="max-w-3xl mx-auto mt-10 p-8 bg-white/80 rounded-xl shadow-2xl backdrop-blur-md">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-extrabold text-blue-900 drop-shadow">Lista de Contatos</h1>
            <a href="{{ route('contacts.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                + Novo Contato
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="py-3 px-4 text-left font-bold text-blue-800">ID</th>
                        <th class="py-3 px-4 text-left font-bold text-blue-800">Nome</th>
                        <th class="py-3 px-4 text-left font-bold text-blue-800">Contato</th>
                        <th class="py-3 px-4 text-left font-bold text-blue-800">Email</th>
                        <th class="py-3 px-4 text-left font-bold text-blue-800">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr class="border-b hover:bg-blue-50 transition">
                        <td class="py-2 px-4">{{ $contact->id }}</td>
                        <td class="py-2 px-4 font-medium">{{ $contact->name }}</td>
                        <td class="py-2 px-4">{{ $contact->contact }}</td>
                        <td class="py-2 px-4">{{ $contact->email }}</td>
                        <td class="py-2 px-4 space-x-2">
                            <a href="{{ route('contacts.show', $contact) }}"
                               class="text-blue-600 hover:underline font-semibold">Ver</a>
                            <a href="{{ route('contacts.edit', $contact) }}"
                               class="text-yellow-600 hover:underline font-semibold">Editar</a>
                            <!-- Botão que abre o modal -->
                            <button type="button"
                                onclick="document.getElementById('modal-confirm-{{ $contact->id }}').classList.remove('hidden')"
                                class="text-red-600 hover:underline font-semibold ml-2">
                                Deletar
                            </button>
                        </td>
                    </tr>

                    <!-- Modal de confirmação para este contato -->
                    <div id="modal-confirm-{{ $contact->id }}" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
                        <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
                            <h2 class="text-xl font-bold text-red-600 mb-4">Confirmar Exclusão</h2>
                            <p class="mb-6 text-gray-700">Tem certeza que deseja deletar o contato <b>{{ $contact->name }}</b>? Esta ação não pode ser desfeita.</p>
                            <div class="flex justify-end space-x-3">
                                <button type="button"
                                        onclick="document.getElementById('modal-confirm-{{ $contact->id }}').classList.add('hidden')"
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
                    @empty
                    <tr>
                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">Nenhum contato encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
