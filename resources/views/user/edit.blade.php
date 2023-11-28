@extends('layouts.profile')

@section('content')
<div class="overflow-y-auto w-full relative">
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
                    Edit Profile
                </h1>
                <form class="space-y-4 md:space-y-6" action="/user/edit" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">username</label>
                        <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="{{$user->name}}" value="{{$user->name}}">
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
                        <input type="text" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('password')
                        <div class="flex items-center p-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                            <span class="sr-only">Info</span>
                            <div>
                              <span class="font-medium"></span> {{ $message }}
                            </div>
                        </div>   
                        @enderror
                    </div>
                    <div>
                        <label for="password-confirmation" class="block mb-2 text-sm font-medium text-gray-900">Password Confirmation</label>
                        <input type="text" name="password_confirmation" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @error('password_confirmation')
                        <div class="flex items-center p-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                            <span class="sr-only">Info</span>
                            <div>
                              <span class="font-medium"></span> {{ $message }}
                            </div>
                        </div>   
                        @enderror
                    </div>
                    <button type="submit" class="w-full text-gray-900 bg-[#FFE81A]  font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
  </section>
</div>
@endsection

