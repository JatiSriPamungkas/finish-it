<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finish It | Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative">
    @if (session('status'))
        <livewire:toast :icon="session('icon')" :type="session('type')">
            {{ session('status') }}
        </livewire:toast>
    @endif

    <div class="w-[50%] mx-auto my-32 flex flex-col items-center gap-6">
        <h1 class="text-6xl font-bold text-gray-700">Login</h1>
        <p class="text-lg">Welcome back! Ready for tackle the Task.</p>

        <div class="w-125 mx-auto rounded-md border border-gray-300 p-4 shadow-sm sm:p-6">
            <form method="post" action="{{ route('login.process') }}" class="flex flex-col gap-6">
                @csrf

                <label for="email">
                    <span class="font-semibold text-gray-700"> Email </span>

                    <input type="text" id="email" placeholder="Email" name="email" value="{{ old('email') }}"
                        class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm">
                </label>
                <label for="password">
                    <span class="font-semibold text-gray-700"> Password </span>

                    <input type="password" id="password" name="password" placeholder="Password"
                        class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm">
                </label>
                <button type="submit"
                    class="flex justify-center gap-4 rounded-sm border border-gray-700 bg-gray-700 px-4 py-2 font-semibold text-base text-white cursor-pointer hover:bg-gray-600">
                    Login
                </button>
            </form>
        </div>
    </div>

</body>

</html>
