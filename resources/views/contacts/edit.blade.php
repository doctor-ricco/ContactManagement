<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-200 min-h-screen">
    <div class="max-w-lg mx-auto mt-10 p-8 bg-white/80 rounded-xl shadow-2xl backdrop-blur-md">
        <h1 class="text-2xl font-extrabold text-blue-900 mb-6">Editar Contato</h1>
        <a href="{{ route('contacts.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Voltar à lista</a>

        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 border border-red-300">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.update', $contact) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Nome</label>
                <input type="text" name="name" value="{{ old('name', $contact->name) }}"
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Contato (9 dígitos)</label>
                <input type="text" name="contact" value="{{ old('contact', $contact->contact) }}"
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300" required>
            </div>
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $contact->email) }}"
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300" required>
            </div>
            <button type="submit"
                    class="w-full py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow hover:bg-yellow-600 transition">
                Atualizar Contato
            </button>
        </form>
    </div>
</body>
</html>
