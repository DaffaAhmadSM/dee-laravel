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
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <form action="/user/pay/store" class="mx-auto mb-0 mt-8 max-w-md space-y-4" method="POST">
        @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="font-bold text-2xl">
                {{$item->itemDetail->name}}
            </div>
                <div>
                    <div>
                        Down Payment:
                    </div>
                    <div class="relative border-gray-800 p-4 pe-12 border w-full rounded-sm">
                        Rp. {{number_format($item->cartDetail->down_payment, 0, ',', '.')}}
                    </div>
                </div>
            <input type="hidden" name="payment" value="{{$payment}}">
      
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">
                </p>
        
                <button
                type="submit"
                class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
                >
                Pay
                </button>
            </div>
        </form>
      </div> 
</body>
</html>