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
            <div class="w-full bg-[#F3AF01] rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Register your account
                    </h1>
                    
                    <form class="space-y-4 md:space-y-6" action="/register" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="name@company.com" required="" value={{old('email')}}>
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
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="name" required="" value={{old('name')}}>
                            @error('name')
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
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required="" value={{old('password')}}>
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
                            Already have an account? <a href="/" class="font-medium text-blue-500 hover:underline">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
      </section>
</body>
</html>