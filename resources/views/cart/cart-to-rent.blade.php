<!DOCTYPE html>
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
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8" x-data="{ kali: 0, date_start: new Date() , date_end: new Date(), harga: {{$item->price}} }">
        <form action="/add-to-cart/cart-rent/{{$item->id}}" class="mx-auto mb-0 mt-8 max-w-md space-y-4" method="POST">
        @csrf
        <div class="font-bold text-2xl">
            {{$item->name}}
        </div>
          <div>
              <div>
                  Total Price:
              </div>
              <div class="relative border-gray-800 p-4 pe-12 border w-full rounded-sm" x-text="`Rp. ` + new Intl.NumberFormat('en-DE').format((kali*harga*Math.floor((new Date(date_end) - new Date(date_start)) / (1000*60*60*24))))">
              </div>
          </div>
          <div>
            <div>
                Down Payment (50%):
            </div>
            <div class="relative border-gray-800 p-4 pe-12 border w-full rounded-sm" x-text="`Rp. ` + new Intl.NumberFormat('en-DE').format((kali*harga*Math.floor((new Date(date_end) - new Date(date_start)) / (1000*60*60*24)))/2)">
            </div>
        </div>
          <div>
            <div>
                Amount
            </div>
      
            <div class="relative">
              <input
                name="quantity"
                type="number"
                class=" border-gray-800 p-4 pe-12 border w-full rounded-sm"
                placeholder="amount"
                x-model="kali"
                min="0"
                max="{{$item->stock}}"
              />
            </div>
          </div>
    
          <div>
            <div>
                Start Date
            </div>
      
            <div class="relative">
              <input
                name="start_date"
                type="date"
                class=" border-gray-800 p-4 pe-12 border w-full rounded-sm"
                placeholder="amount"
                x-model="date_start"
                required
                x-bind:min="
                date = new Date()
                return date.toLocaleDateString(`en-CA`)
                "
              />
            </div>
          </div>
          <div>
            <div>
              End Date
            </div>
      
            <div class="relative">
              <input
                name="end_date"
                type="date"
                class=" border-gray-800 p-4 pe-12 border w-full rounded-sm"
                placeholder="amount"
                x-model="date_end"
                required
                x-bind:min="
                date = new Date(date_start)
                date.setDate(date.getDate() + 1)
                return date.toLocaleDateString(`en-CA`)
                "
              />
            </div>
          </div>

          <div class="hidden">
            <div>
              <input
                name="total_price"
                type="hidden"
                x-bind:value="kali*harga*Math.floor((new Date(date_end) - new Date(date_start)) / (1000*60*60*24))"
              />
            </div>
          </div>
          <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500">
            </p>
      
            <button
              type="submit"
              class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
            >
              Add to cart
            </button>
          </div>
        </form>
      </div> 
</body>
</html>