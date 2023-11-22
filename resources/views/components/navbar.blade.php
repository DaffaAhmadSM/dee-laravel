<!-- navbar goes here -->
<nav class="bg-[#F3AF01]">
  <div class="max-w-[100rem] mx-auto px-4">
    <div class="flex justify-between font-semibold">

      <div class="flex">
        <!-- primary nav -->
        <div class="flex items-center space-x-8 justify-evenly">
          <a href="/for-sell" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "for-sell") ? 'bg-yellow-400' : ''}}">For Sell</a>
          <a href="/for-rent" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "for-rent") ? 'bg-yellow-400' : ''}}">For Rent</a>
          <a href="suggestion" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "suggestion") ? 'bg-yellow-400' : ''}}">Suggestion</a>
        </div>
      </div>

      <!-- secondary nav -->
      <div class="flex items-center space-x-1">
        <a href="/reservation" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "reservation") ? 'bg-yellow-400' : ''}}">Reservation</a>
        <a href="/cart/cart-sell-rent" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "cart") ? 'bg-yellow-400' : ''}}">Cart</a>
      </div>
      

    </div>
  </div>
</nav>
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
  <script src="https://cdn.tailwindcss.com"></script>