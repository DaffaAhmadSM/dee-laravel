
@php
    use Carbon\Carbon;
@endphp
@extends('layouts.profile')

@section('content')
<div class="overflow-y-auto w-full">
    <div class="sm:px-6 w-full">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Order Confirm</p>
            </div>
        </div>

        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center">
                    <form action="/user/order">
                        <input type="hidden" name="status" value="pending">
                        <button class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8 {{($active == "pending") ? 'bg-yellow-400' : ''}}">
                            <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Need Confirmation</p>
                            </div>
                        </button>
                    </form>
                    <form action="/user/order">
                        <input type="hidden" name="status" value="delivery">
                        <button class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8 {{($active == "delivery") ? 'bg-yellow-400' : ''}}">
                            <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Delivery</p>
                            </div>
                        </button>
                    </form>
                    <form action="/user/order">
                        <input type="hidden" name="status" value="completed">
                        <button class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8 {{($active == "completed") ? 'bg-yellow-400' : ''}}">
                            <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Completed</p>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="text-center">
                        <tr class="h-16 w-full text-sm leading-none text-gray-800">
                            <th class="font-normal text-left pl-5">Name</th>
                            <th class="font-normal text-left pl-24">Status</th>
                            <th class="font-normal text-left pl-5">User</th>
                            <th class="font-normal text-left pl-5">Date</th>
                            <th class="font-normal text-left pl-4">Quantity</th>
                            <th class="font-normal text-left pl-4">Price</th>
                            @if ($active == 'delivery')
                                <th class="font-normal text-left pl-4">Action</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($items as $item)                            
                        <tr class="h-3"></tr>
                        <tr tabindex="0" class="focus:outline-none  h-16 border border-gray-100 rounded">
                            <td  class="focus:text-indigo-600 ">
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">{{$item->itemDetail->name}}</p>
                                </div>
                            </td>
                            <td class="pl-24">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <circle cx="7.50004" cy="7.49967" r="1.66667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></circle>
                                    </svg>
                                    @if ($item->status == 'delivery')
                                        <p class="text-sm leading-none text-gray-600 ml-2 p-3 bg-orange-300">On Delivery</p>
                                    @endif
                                    @if ($item->status == 'completed')
                                        <p class="text-sm leading-none text-gray-600 ml-2 p-3 bg-green-300">Completed</p>
                                    @endif
                                    @if ($item->status == 'pending')
                                        <p class="text-sm leading-none text-gray-600 ml-2 p-3 bg-red-300">Pending Confirmation</p>
                                    @endif
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewBox="0 0 77 77" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M38.885 41.0024C38.6604 40.9704 38.3717 40.9704 38.115 41.0024C32.4683 40.8099 27.9766 36.1899 27.9766 30.5111C27.9766 24.704 32.6608 19.9878 38.5 19.9878C44.3071 19.9878 49.0233 24.704 49.0233 30.5111C48.9912 36.1899 44.5317 40.8099 38.885 41.0024Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M60.1233 62.1779C54.4125 67.4075 46.8408 70.5837 38.4991 70.5837C30.1575 70.5837 22.5858 67.4075 16.875 62.1779C17.1958 59.162 19.1208 56.2104 22.5538 53.9004C31.3446 48.0612 45.7179 48.0612 54.4445 53.9004C57.8775 56.2104 59.8025 59.162 60.1233 62.1779Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M38.4993 70.5832C56.2183 70.5832 70.5827 56.2188 70.5827 38.4998C70.5827 20.7807 56.2183 6.4165 38.4993 6.4165C20.7802 6.4165 6.41602 20.7807 6.41602 38.4998C6.41602 56.2188 20.7802 70.5832 38.4993 70.5832Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <p class="text-sm leading-none text-gray-600 ml-2">{{$item->userDetail->name}}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <button class="py-3 px-6 focus:outline-none text-sm leading-none text-gray-700 bg-gray-100 rounded">{{Carbon::parse($item->created_at)->format('d M Y')}}</button>
                            </td>
                            <td class="pl-4">
                                <button class="py-3 px-6 focus:outline-none text-sm leading-none text-gray-700 bg-gray-100 rounded">{{$item->quantity}}</button>
                            </td>
                            <td class="pl-4">
                                <button class="py-3 px-6 focus:outline-none text-sm leading-none text-gray-700 bg-gray-100 rounded">Rp. {{number_format($item->total_price)}}</button>
                            </td>
                            @if ($active == 'delivery')
                                <form action="/user/order/confirm/{{$item->id}}" method="POST">
                                    @csrf
                                    <td class="pl-4">
                                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-yellow-300 rounded hover:bg-gray-200 focus:outline-none">Confirm Arrival</button>
                                    </td>
                                </form>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>
</div>
<style>.checkbox:checked + .check-icon {
display: flex;
}
</style>
</div>
@endsection