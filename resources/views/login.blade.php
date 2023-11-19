<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            @if (session()->has('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-300" role="alert">
                    <span class="sr-only">Info</span>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="flex items-center p-4 mb-4 text-sm text-white border border-red-300 rounded-lg bg-red-500" role="alert">
                    <span class="sr-only">Info</span>
                    <div>
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            <div class="w-full bg-[#F3AF01] rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
                            @error('email')
                            <div class="flex items-center p-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                                <span class="sr-only">Info</span>
                                <div>
                                  <span class="font-medium"></span> {{ $message }}
                                </div>
                            </div>   
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                            @error('password')
                            <div class="flex items-center p-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                                <span class="sr-only">Info</span>
                                <div>
                                  <span class="font-medium"></span> {{ $message }}
                                </div>
                            </div>   
                            @enderror
                        </div>
                        <button type="submit" class="w-full text-gray-900 bg-[#FFE81A]  font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                        <p class="text-sm font-light text-gray-900">
                            Don’t have an account yet? <a href="/register" class="font-medium text-blue-500 hover:underline">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
      </section>
</body>
</html>

