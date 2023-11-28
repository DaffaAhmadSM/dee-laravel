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
    <div class="m-12">
      <div class="text-5xl mb-4">
        List {{$title}}:
      </div>
      <div class="grid grid-cols-4 justify-evenly justify-items-center">
          @foreach ($lists as $list)
          <div class="relative flex flex-col text-gray-700 bg-white shadow-md w-72 rounded-xl bg-clip-border mt-7">
              <a href="item-detail/{{$list->slug}}" class="block overflow-hidden">
              <div class="relative overflow-hidden text-gray-700 bg-white h-72 rounded-xl bg-clip-border">
                <img
                  src="{{asset("storage/".$list->image)}}"
                  class="object-cover w-full h-full"
                />
              </div>
              <div class="p-6">
                <div class="flex flex-col items-start justify-between mb-2">
                  <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                    {{$list->name}}
                  </p>
                  <div class="flex-row flex pt-4">
                    <div class="pr-2 mr-2  border-r-2 border-gray-500 flex justify-center flex-col items-center">
                      <p class="">
                        Stock:
                      </p>
                      <p>
                        {{$list->stock}}
                      </p>
                    </div>
                    <div>
                      <p class="font-light text-xs">
                          Price:
                      </p>
                      <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                        Rp. {{number_format($list->price, 0, ',', '.')}}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <div class="p-3 pt-0">
                <a
                href="add-to-cart/cart-rent/{{$list->id}}"
                  class="block w-full select-none rounded-lg bg-blue-gray-900/10 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-blue-gray-900 transition-all hover:scale-105 focus:scale-105 focus:opacity-[0.85] active:scale-100 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                  type="button"
                >
                  Rent Now
                </a>
                <a
                class="block w-full select-none rounded-lg bg-blue-gray-900/10 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-blue-gray-900 transition-all hover:scale-105 focus:scale-105 focus:opacity-[0.85] active:scale-100 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
              >
                Reserve
              </a>
              </div>
            </div>
            @endforeach
      
      
      </div>
    </div>
    
</body>
</html>