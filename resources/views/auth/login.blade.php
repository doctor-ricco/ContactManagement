<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-200 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white/80 rounded-xl shadow-2xl backdrop-blur-md">
        <h1 class="text-2xl font-extrabold text-blue-900 mb-6 text-center">Entrar</h1>

        @if(session('status'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300 text-center">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 border border-red-300">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div>
                <label class="block font-semibold text-blue-800 mb-1">Senha</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-sm text-blue-800">Lembrar-me</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                        Esqueceu a senha?
                    </a>
                @endif
            </div>
            <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Entrar
            </button>
        </form>
        <div class="mt-6 text-center">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Criar nova conta</a>
            @endif
        </div>
    </div>
</body>
</html>
