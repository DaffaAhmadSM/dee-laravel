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
      
          @for ($i = 0; $i < 10; $i++)
      
          <div class="relative flex flex-col text-gray-700 bg-white shadow-md w-72 rounded-xl bg-clip-border mt-7">
              <a href="url" class="block overflow-hidden">
              <div class="relative overflow-hidden text-gray-700 bg-white h-72 rounded-xl bg-clip-border">
                <img
                  src="https://images.unsplash.com/photo-1629367494173-c78a56567877?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=927&amp;q=80"
                  class="object-cover w-full h-full"
                />
              </div>
              <div class="p-6">
                <div class="flex flex-col items-start justify-between mb-2">
                  <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                    Apple AirPods
                  </p>
                  <p class="font-light text-xs pt-4">
                      start from
                  </p>
                  <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                    Rp. 95.00
                  </p>
                </div>
              </div>
              </a>
              <div class="p-3 pt-0">
                <button
                  class="block w-full select-none rounded-lg bg-blue-gray-900/10 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-blue-gray-900 transition-all hover:scale-105 focus:scale-105 focus:opacity-[0.85] active:scale-100 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                  type="button"
                >
                  Add to Cart
                </button>
              </div>
            </div>
          @endfor
      
      
      </div>
    </div>
    
</body>
</html>