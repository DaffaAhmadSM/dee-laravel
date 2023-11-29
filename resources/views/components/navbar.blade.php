<!-- navbar goes here -->
<script src="https://cdn.tailwindcss.com"></script>

<nav class="bg-[#F3AF01]">
  <div class="max-w-[100rem] mx-auto px-4">
    <div class="flex justify-between font-semibold">

      <div class="flex">
        <!-- primary nav -->
        <div class="flex items-center space-x-8 justify-evenly">
          <a href="/for-sell" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "for-sell") ? 'bg-yellow-400' : ''}}">For Sell</a>
          <a href="/for-rent" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "for-rent") ? 'bg-yellow-400' : ''}}">For Rent</a>
          <a href="/suggestion" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "suggestion") ? 'bg-yellow-400' : ''}}">Suggestion</a>
        </div>
      </div>

      <!-- secondary nav -->
      <div class="flex items-center space-x-1">
        <a href="/cart/cart-reserve" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "reservation") ? 'bg-yellow-400' : ''}}">Reservation</a>
        <a href="/cart/cart-sell-rent" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "cart") ? 'bg-yellow-400' : ''}}">Cart</a>
        <a href="/user/profile" class="py-5 px-3 text-gray-700 hover:text-gray-900">
          <svg width="25" height="25" viewBox="0 0 77 77" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M38.885 41.0024C38.6604 40.9704 38.3717 40.9704 38.115 41.0024C32.4683 40.8099 27.9766 36.1899 27.9766 30.5111C27.9766 24.704 32.6608 19.9878 38.5 19.9878C44.3071 19.9878 49.0233 24.704 49.0233 30.5111C48.9912 36.1899 44.5317 40.8099 38.885 41.0024Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M60.1233 62.1779C54.4125 67.4075 46.8408 70.5837 38.4991 70.5837C30.1575 70.5837 22.5858 67.4075 16.875 62.1779C17.1958 59.162 19.1208 56.2104 22.5538 53.9004C31.3446 48.0612 45.7179 48.0612 54.4445 53.9004C57.8775 56.2104 59.8025 59.162 60.1233 62.1779Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M38.4993 70.5832C56.2183 70.5832 70.5827 56.2188 70.5827 38.4998C70.5827 20.7807 56.2183 6.4165 38.4993 6.4165C20.7802 6.4165 6.41602 20.7807 6.41602 38.4998C6.41602 56.2188 20.7802 70.5832 38.4993 70.5832Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
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
    @if (session()->has('warning'))
        <div class="flex items-center p-4 mb-4 text-sm text-white border border-red-300 rounded-lg bg-red-500 justify-between" role="alert">
            <div>
                {{ session('warning') }}
            </div>
            <a href="/user/rent-reserve-half-paid" class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-yellow-300 rounded hover:bg-gray-200 focus:outline-none">Detail</a>
        </div>
    @endif