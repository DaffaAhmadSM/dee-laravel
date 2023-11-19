<!-- navbar goes here -->
<nav class="bg-[#F3AF01]">
  <div class="max-w-[100rem] mx-auto px-4">
    <div class="flex justify-between font-semibold">

      <div class="flex">
        <!-- primary nav -->
        <div class="flex items-center space-x-8 justify-evenly">
          <a href="for-sell" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "for-sell") ? 'bg-yellow-400' : ''}}">For Sell</a>
          <a href="for-rent" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "for-rent") ? 'bg-yellow-400' : ''}}">For Rent</a>
          <a href="suggestion" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "suggestion") ? 'bg-yellow-400' : ''}}">Suggestion</a>
        </div>
      </div>

      <!-- secondary nav -->
      <div class="flex items-center space-x-1">
        <a href="reservation" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "reservation") ? 'bg-yellow-400' : ''}}">Reservation</a>
        <a href="cart" class="py-5 px-3 text-gray-700 hover:text-gray-900 {{($active == "cart") ? 'bg-yellow-400' : ''}}">Cart</a>
      </div>
      

    </div>
  </div>
</nav>
  <script src="https://cdn.tailwindcss.com"></script>