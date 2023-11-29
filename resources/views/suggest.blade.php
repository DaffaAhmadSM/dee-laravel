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
    <div class="m-12" x-data="{open: false}">
        <div class="text-4xl">Suggestion Page</div>
        <div class="flex justify-end">
            <button
                        x-on:click="open = !open"
                        class="inline-block rounded-lg bg-blue-500 px-5 py-3 mx-6 my-5 text-sm font-medium text-white"
                        >
                        Add Suggestions
            </button>
        </div>
        <section class="flex mx-auto items-center justify-center shadow-lg mb-8" id="review" x-show="open">
            <form class="w-full bg-white rounded-lg px-4 pt-2" action="/suggestion/store/" method="POST">
              @csrf
               <div class="flex flex-wrap -mx-3 mb-6">
                  <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Suggestion</h2>
                  <div class="w-full md:w-full px-3 mb-2 mt-2">
                     <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="suggest" placeholder='Type Your Suggestion' required></textarea>
                  </div>
                  <div class="w-full md:w-full flex items-start px-3">
                     <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                     </div>
                     <div class="-mr-1">
                        <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post'>
                     </div>
                  </div>
                </div>
              </form>
         </section>
         
         <section class="relative flex justify-center h-screen antialiased bg-white00 w-full">
            @foreach ($suggestions as $suggest)
            <div class="container">
                <div
                    class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200">
                    <div class="flex flex-row">
                        <div class="flex-col mt-1">
                            <div class="flex items-center flex-1 px-4 font-bold leading-tight">{{ $suggest->user->name }}
                            </div>
                            <div class="flex-1 px-2 ml-2 text-lg font-medium leading-loose text-gray-600">
                                {{ $suggest->suggest }}
                            </div>
                            @if ($suggest->suggestionLike == null)
                            <form action="/suggestion/like/{{$suggest->id}}" class="inline-flex items-center px-1 pt-2 ml-1 flex-column" method="POST">
                                @csrf
                                <button>
                                    <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                        </path>
                                    </svg>
                                </button>
                                {{$suggest->suggestion_like_count}}
                            </form>
                            @endif
                            @if ($suggest->suggestionLike != null)
                            <form action="/suggestion/unlike/{{$suggest->id}}" class="inline-flex items-center px-1 pt-2 ml-1 flex-column" method="POST">
                                @csrf
                                <button>
                                    <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="red"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                        </path>
                                    </svg>
                                </button>
                                {{$suggest->suggestion_like_count}}
                            </form>
                            @endif
                            @if ($suggest->suggestionDislike == null)
                            <form action="/suggestion/dislike/{{$suggest->id}}" class="inline-flex items-center px-1 -ml-1 flex-column" method="POST">
                               @csrf
                                <button class="rotate-180">
                                    <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                        </path>
                                    </svg>
                                </button>
                                {{$suggest->suggestion_dislike_count}}
                            </form>
                            @endif
                            @if ($suggest->suggestionDislike != null)
                            <form action="/suggestion/undislike/{{$suggest->id}}" class="inline-flex items-center px-1 -ml-1 flex-column" method="POST">
                                @csrf
                                <button class="rotate-180">
                                    <svg class="w-5 h-5 text-gray-600 cursor-pointer hover:text-gray-700" fill="red"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                        </path>
                                    </svg>
                                </button>
                                {{$suggest->suggestion_dislike_count}}
                            </form>
                            @endif
                        </div>
                    </div>
            </div>
            @endforeach
        </section>
        
    </div>
</body>
</html>