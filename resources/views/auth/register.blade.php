<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Registar Conta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-200 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white/80 rounded-xl shadow-2xl backdrop-blur-md">
        <h1 class="text-2xl font-extrabold text-blue-900 mb-6 text-center">Criar Conta</h1>

        @if($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 border border-red-300">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Nome</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Senha</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Confirmar Senha</label>
                <input type="password" name="password_confirmation" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Criar Conta
            </button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Já tem conta? Entrar</a>
        </div>
    </div>
</body>
</html>
