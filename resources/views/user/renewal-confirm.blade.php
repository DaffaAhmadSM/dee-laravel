<!DOCTYPE html>
@php
    use Carbon\Carbon;
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    @include('components.navbar')
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <form action="/user/renewal/request/{{$item->id}}" class="mx-auto mb-0 mt-8 max-w-md space-y-4" method="POST">
        @csrf
        <div class="font-bold text-2xl">
            {{$item->itemDetail->name}}
        </div>
            <div>
                Renewal Date
            </div>
      
            <div class="relative">
              <input
                name="renewal_date"
                type="date"
                class=" border-gray-800 p-4 pe-12 border w-full rounded-sm"
                placeholder="amount"
                required
                min="{{Carbon::parse($item->cartDetail->end_date)->addDay(1)->format('Y-m-d')}}"
              />
            </div>
            
            <div class="flex items-center justify-between">
              <p class="text-sm text-gray-500">
              </p>
        
              <button
                type="submit"
                class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
              >
                Renew
              </button>
            </div>
          </div>
        </form>
      </div> 
</body>
</html>