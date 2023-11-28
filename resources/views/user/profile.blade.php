@php
    use Carbon\Carbon;
@endphp
@extends('layouts.profile')

@section('content')
<div class="overflow-y-auto w-full">
    <div class="bg-white overflow-hidden shadow rounded-lg border">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                User Profile
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                This is some information about the user.
            </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Full name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->name }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Email address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->email }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Password
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        ********
                    </dd>
                </div>
            </dl>
        </div>
    </div>
    <a href="/user/edit"
        class="inline-block rounded-lg bg-blue-500 px-14 py-3 mt-4 text-sm font-medium text-white absolute right-4">
        Edit Profile
    </a>

</div>
@endsection