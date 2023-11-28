<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
<aside class="flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 min-h-screen h-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5 sticky" style="flex: 1 0 10%;">
    <nav x-data="{ showModal: false }" class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700 w-max">
      <div class="relative" x-data='{open: true}'>
        <a href="/user/profile" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-yellow-50 hover:bg-opacity-80 focus:bg-yellow-50 focus:bg-opacity-80 active:bg-yellow-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none {{($active == "profile") ? 'bg-yellow-400' : ''}}">
          <div class="grid place-items-center mr-4">
            <svg width="20" height="20" viewBox="0 0 77 77" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M38.885 41.0024C38.6604 40.9704 38.3717 40.9704 38.115 41.0024C32.4683 40.8099 27.9766 36.1899 27.9766 30.5111C27.9766 24.704 32.6608 19.9878 38.5 19.9878C44.3071 19.9878 49.0233 24.704 49.0233 30.5111C48.9912 36.1899 44.5317 40.8099 38.885 41.0024Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M60.1233 62.1779C54.4125 67.4075 46.8408 70.5837 38.4991 70.5837C30.1575 70.5837 22.5858 67.4075 16.875 62.1779C17.1958 59.162 19.1208 56.2104 22.5538 53.9004C31.3446 48.0612 45.7179 48.0612 54.4445 53.9004C57.8775 56.2104 59.8025 59.162 60.1233 62.1779Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M38.4993 70.5832C56.2183 70.5832 70.5827 56.2188 70.5827 38.4998C70.5827 20.7807 56.2183 6.4165 38.4993 6.4165C20.7802 6.4165 6.41602 20.7807 6.41602 38.4998C6.41602 56.2188 20.7802 70.5832 38.4993 70.5832Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="4.8125" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>Profile
        </a>
        <button @click="open = ! open" role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-yellow-50 hover:bg-opacity-80 focus:bg-yellow-50 focus:bg-opacity-80 active:bg-yellow-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd"></path>
            </svg>
          </div>Products
        </button>
        <div id="sub" x-show="open">
          <a href="/user/order" class="flex translate-x-12 hover:text-black mt-3">
            <p>Order</p>
          </a>
          <a href="/user/rent" class="flex translate-x-12 hover:text-black mt-3">
            <p>Rent</p>
          </a>
          <a href="/user/reservation" class="flex translate-x-12 hover:text-black mt-3">
            <p>Reservation</p>
          </a>
          <a href="/user/rent-reserve-half-paid" class="flex translate-x-12 hover:text-black mt-3">
            <p>Rent/Reservation half paid</p>
          </a>
          <a href="/user/renewal" class="flex translate-x-12 hover:text-black mt-3">
            <p>Renewal Requests</p>
          </a>
          <a href="/user/pickup" class="flex translate-x-12 hover:text-black mt-3">
            <p>Pickup Status</p>
          </a>
        </div>
      </div>
      <button @click="showModal = ! showModal" role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-yellow-50 hover:bg-opacity-80 focus:bg-yellow-50 focus:bg-opacity-80 active:bg-yellow-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
        <div class="grid place-items-center mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
            <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z" clip-rule="evenodd"></path>
          </svg>
        </div>Log Out
      </button>
      <div class="flex items-center justify-center h-screen absolute" @click="showModal = false">
        <div>
          <div x-show="showModal" class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <!-- Modal -->
          <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed z-10 inset-0 overflow-y-auto" x-cloak>
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
              <!-- Modal panel -->
              <div class="w-full inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                  <!-- Modal content -->
                  <div class="sm:flex sm:items-start">
                    Are You Sure You Want To Log Out?
                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                  <!-- Logout button -->
                  <a href="/logout" @click="subscribeToNewsletter" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"> Logout </a>
                  <!-- Cancel button -->
                  <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"> Cancel </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
  </aside>