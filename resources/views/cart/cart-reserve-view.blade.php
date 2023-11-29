<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    @include('components.navbar')
    <section class="h-screen bg-gray-100 px-4 text-gray-600 antialiased">
        <div class="flex h-full flex-col justify-center">
            <!-- Table -->
            <div class="mx-auto h-full w-full rounded-sm border border-gray-200 bg-white shadow-lg">
                <header class="border-b border-gray-100 px-5 py-4">
                    <div class="font-semibold text-gray-800">Rent</div>
                </header>
                <div class="overflow-x-auto p-3">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                            <tr>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Image</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Product Name</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Quantity</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Total</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Down Payment</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-center font-semibold">Action</div>
                                </th>
                            </tr>
                        </thead>
                        @foreach ($user_carts_reserve as $cart)
                        <tbody class="divide-y divide-gray-100 text-sm">
                            <!-- record 1 -->
                            <tr>
                                <td class="p-2">
                                    <div class="w-10 h-10">
                                        <img class="w-full h-full rounded-full" src="{{asset("storage/".$cart->item->image)}}" alt="image" />
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">{{$cart->item->name}}</div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left">{{$cart->quantity}}</div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">Rp. {{number_format($cart->total_price, 0, ',', '.')}}</div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">Rp. {{number_format($cart->down_payment, 0, ',', '.')}}</div>
                                </td>
                                <td class="p-2">
                                    <div class="flex space-x-6 justify-center items-center">
                                        @if ($cart->item->stock < $cart->quantity)
                                        <form action="/payment-method/{{$cart->id}}" method="POST" class="bg-red-600 text-white" disabled>
                                            @csrf
                                            <button type="submit" class="p-4" disabled>
                                                Out of Stock
                                            </button>
                                        </form>
                                        @else
                                        <form action="/payment-method/{{$cart->id}}" class="bg-yellow-400">
                                            @csrf
                                            <button type="submit" class="p-4">
                                                Checkout
                                            </button>
                                        </form>
                                        @endif
                                        
                                        <form action="/delete-cart/cart/{{$cart->id}}" method="POST">
                                            @csrf
                                            <button type="submit">
                                                <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>