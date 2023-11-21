@php
  use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body>
    @include('components.navbar')
    <section class="text-gray-700 body-font overflow-hidden bg-white">
        <div class="container px-5 py-24 mx-auto">
          <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-[35rem] w-full object-cover object-center rounded border border-gray-200" src="{{asset("storage/".$item->image)}}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
              <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
                {{$item->name}}
              </h1>
              <div class="flex mb-4">
              </div>
              <p class="leading-relaxed">
                {{$item->description}}
              </p>
              <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
              </div>
              <div class="flex">
                <span class="title-font font-medium text-2xl text-gray-900">Rp. {{number_format($item->price, 0, ',', '.')}}</span>
                <button class="flex ml-auto text-black bg-[#F3AF01] border-0 py-2 px-6 focus:outline-none hover:bg-yellow-400 rounded">Add To Cart</button>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      
    {{-- review Input --}}
      <section class="flex mx-auto items-center justify-center shadow-lg" id="review">
        <form class="w-full bg-white rounded-lg px-4 pt-2" action="/review/post/{{$item->id}}" method="POST">
          @csrf
           <div class="flex flex-wrap -mx-3 mb-6">
              <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Review</h2>
              <div class="w-full md:w-full px-3 mb-2 mt-2">
                 <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="review" placeholder='Type Your Review' required></textarea>
              </div>
              <div class="w-full md:w-full flex items-start px-3">
                 <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                 </div>
                 <div class="-mr-1">
                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Review'>
                 </div>
              </div>
            </div>
          </form>
     </section>

    @foreach ($reviews as $review)
     <div class="flex justify-center items-center">
       <div class="flex flex-col justify-start items-start w-full space-y-8 border-b-4"">
           <div class="w-full flex justify-start items-start flex-col bg-gray-50 p-8">
               <div id="menu" class="md:block" x-data="{ open: false }">
                   <p class="mt-3 text-base leading-normal text-gray-600  w-full md:w-9/12 xl:w-5/6">
                    {{$review->review}}
                  </p>
                   <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                           <p class="text-base font-medium leading-none text-gray-800 ">{{$review->user->name}}</p>
                           <p class="text-sm leading-none text-gray-600 ">{{Carbon::parse($review->created_at)->format('d M Y')}}</p>
                           <button @click="open = ! open">Reply</button>
                   </div>
                   <section class="flex shadow-lg" id="review" x-show="open">
                     <form class="w-full bg-white rounded-lg px-4 pt-2" action="/review/reply/item/{{$item->id}}/id/{{$review->id}}" method="POST">
                       @csrf
                       <div class="flex flex-wrap -mx-3 mb-6">
                           <div class="w-full md:w-full px-3 mb-2 mt-2">
                             <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="review" placeholder='replying to {{$review->user->name}}' required></textarea>
                           </div>
                           <div class="w-full md:w-full flex items-start px-3">
                             <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                             </div>
                             <div class="-mr-1">
                                 <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Send'>
                             </div>
                           </div>
                         </div>
                       </form>
                     </section>
                  </div>
               @if($review->reply != null)
               @foreach ($review->reply as $reply)
                 <div class="w-full flex justify-start items-start flex-col bg-gray-50 md:px-8 py-8 relative">
                     <div id="menu2" class="block">
                         <p class="mt-3 text-base leading-normal text-gray-600  w-full md:w-9/12 xl:w-5/6">
                          {{$reply->review}}
                        </p>
                         <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                                 <p class="text-base font-medium leading-none text-gray-800 ">{{$reply->user->name}}</p>
                                 <p class="text-sm leading-none text-gray-600 ">{{Carbon::parse($reply->created_at)->format('d M Y')}}</p>
                         </div>
                     </div>
                 </div>      
                @endforeach
                @endif
             </div>
        </div>
      </div>
     @endforeach
</body>
</html>