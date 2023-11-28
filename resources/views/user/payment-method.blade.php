<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <style>
        .grid-style {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            place-items: center;
            grid-gap: 3rem;
            padding: 1rem;
        }
    </style>
</head>
<body class="h-screen">
    @include('components.navbar')
    <div class="w-[100%] h-[70%] flex flex-col justify-center items-center">
        <div class="text-3xl flex justify-center"><p>Payment</p></div>
        <div class="grid-style w-[30%]">
            <form action="/user/pay/half/{{$id}}" method="POST">
                @csrf
                <input type="hidden" name="payment" value="gopay">
                <button class="bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="#FFF" fill-opacity=".01" d="M0 0h189v90H0z"/>
                            <g transform="translate(25 25)">
                                <circle cx="27" cy="27" r="27" fill="#00AED6" fill-rule="nonzero"/>
                                <path fill="#FFF" d="M42.75 26.212c-.225-3.375-3.15-6.075-6.525-5.85h-17.1c-.675 0-1.125-.45-1.125-1.124 0-.675.45-1.125 1.125-1.125H36.45c-.113-2.25-1.8-4.613-3.938-4.95-5.062-.9-10.237-.9-15.187 0-2.813.45-4.95 3.262-5.4 5.962a54.306 54.306 0 0 0 0 15.975c.563 3.038 3.037 5.512 6.188 5.962 6.3.788 12.6.788 18.787 0 2.813-.337 4.613-2.924 5.175-5.624.563-3.15.787-6.188.675-9.226zm-5.625 3.713v1.012c0 .675-.45 1.125-1.125 1.125s-1.125-.45-1.125-1.124v-1.013c-.337-.338-.563-.788-.563-1.238 0-.9.788-1.687 1.688-1.687.9 0 1.688.788 1.688 1.688 0 .45-.226.9-.563 1.237z"/>
                            </g>
                        </g>
                    </svg>
                </button>
            </form>
            <form action="/user/pay/half/{{$id}}" method="POST">
                @csrf
                <input type="hidden" name="payment" value="ovo">
                <button class="bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77 24" width="100" height='100'>
                        <title>
                          Logo_ovo
                        </title>
                        <path d="M21.19,20.24a12.54,12.54,0,0,1-8.8,3.45,12.59,12.59,0,0,1-8.85-3.45,11.68,11.68,0,0,1,0-16.77A12.55,12.55,0,0,1,12.4,0a12.54,12.54,0,0,1,8.8,3.45,11.67,11.67,0,0,1,0,16.77M12.4,3.86a7.73,7.73,0,0,0-7.8,8,7.78,7.78,0,1,0,15.56,0,7.73,7.73,0,0,0-7.76-8m38-1.07L40.89,24l-.54-.1c-2.72-.49-3.27-1.17-4.54-3.93L28.68,4.44H26V.67H36.13V4.44H33.71l5.73,12.85L45,4.44H42V.67h8.4Zm23,17.45a13,13,0,0,1-17.64,0,11.68,11.68,0,0,1,0-16.77,13,13,0,0,1,17.64,0,11.65,11.65,0,0,1,0,16.77M64.65,3.86a7.74,7.74,0,0,0-7.81,8,7.78,7.78,0,1,0,15.56,0,7.72,7.72,0,0,0-7.75-8" fill="#4b2489" fill-rule="evenodd"/>
                    </svg>
                </button>
            </form>
            <form action="/user/pay/half/{{$id}}" method="POST">
                @csrf
                <input type="hidden" name="payment" value="shopee">
                <button class="bg-gray-200 rounded-full">
                    <svg id="svg14" enable-background="new 0 0 260 371.41" height="100" viewBox="0 0 264.00031 375.41" width="100" xmlns="http://www.w3.org/2000/svg">
                        <g transform="translate(0 25)">
                            <path id="path2" d="m174.212 201.122c-1.496 12.868-9.297 23.287-21.379 28.438-6.77 2.854-15.811 4.418-23.063 3.953-11.157-.465-21.616-3.229-31.378-8.137-3.377-1.859-8.581-5.344-12.551-8.598-.979-.93-1.143-1.395-.433-2.357.312-.564 1.009-1.596 2.438-3.686 2.179-3.081 2.412-3.488 2.644-3.883.697-1 1.759-1.091 2.869-.301.152.155.152.155.236.23.148.162.148.162.546.465.411.315.709.465.782.643 10.461 8.189 22.638 12.838 34.931 13.303 17.063-.23 29.325-7.902 31.584-19.758 2.326-12.903-7.843-24.167-27.729-30.448-6.265-1.859-22.031-8.156-24.942-9.908-13.629-7.983-20.026-18.461-19.096-31.455 1.395-17.958 18.078-31.324 39.163-31.441 9.359 0 18.793 1.951 27.743 5.716 3.228 1.373 8.989 4.494 10.905 5.986 1.15.852 1.395 1.781.686 2.822-.236.635-.93 1.581-2.128 3.609v0c-1.747 2.664-1.812 2.775-2.129 3.361-.622.978-1.511 1.056-2.695.356-9.566-6.506-20.356-9.762-32.145-9.994-14.643.232-25.653 8.96-26.362 20.919-.146 10.743 7.877 18.569 25.252 24.462 35.339 11.385 48.819 24.686 46.251 45.703m-43.576-185.385c22.96 0 41.717 21.785 42.646 49.095h-85.237c.82-27.31 19.632-49.095 42.591-49.095m119.001 54.269c0-2.85-2.206-5.174-5.021-5.174h-.184-55.101c-1.394-36.032-27.168-64.832-58.695-64.832-31.546 0-57.253 28.8-58.628 64.832h-55.332c-2.775.063-4.977 2.336-4.977 5.174 0 .164 0 .236 0 .4h-.063l7.859 173.798c0 .47.092.944.092 1.509 0 .11.015.144.015.351v.266l.058.092c1.183 12.117 9.937 21.777 21.901 22.25v.092h175.509c.092 0 .146 0 .237 0 .136 0 .136 0 .236 0h .364v-.092c12.134-.295 22.069-10.133 23.016-22.383v0l .053-.225c0-.115 0-.24 0-.351 0-.354.092-.579.092-.947l8.569-174.524v0c0-.064 0-.163 0-.236" fill="#ee4d2d" transform="translate(2.0003134 2)"/>
                        </g>
                     </svg>
                </button>
            </form>
            <form action="/user/pay/half/{{$id}}" method="POST">
                @csrf
                <input type="hidden" name="payment" value="bank">
                <button class="bg-gray-200 rounded-full">
                    <svg viewBox="0 0 107 163" fill="none" xmlns="http://www.w3.org/2000/svg" width="100" height='100'>
                        <g clip-path="url(#clip0_102_5)">
                        <path d="M16.0508 85.5997C15.0665 85.5997 14.2676 86.3986 14.2676 87.3829C14.2676 88.3672 15.0665 89.1662 16.0508 89.1662H33.884C34.8683 89.1662 35.6672 88.3672 35.6672 87.3829C35.6672 86.3986 34.8683 85.5997 33.884 85.5997H32.1007V42.7999H33.884C34.8683 42.7999 35.6672 42.001 35.6672 41.0167C35.6672 40.0323 34.8683 39.2334 33.884 39.2334H16.0508C15.0665 39.2334 14.2676 40.0323 14.2676 41.0167C14.2676 42.001 15.0665 42.7999 16.0508 42.7999H17.8341V85.5997H16.0508ZM21.4008 42.7999H28.534V85.5997H21.4008V42.7999Z" fill="black"/>
                        <path d="M1.78365 35.6664H105.216C106.013 35.6664 106.712 35.1385 106.932 34.3717C107.149 33.6066 106.834 32.788 106.156 32.3674L54.4399 0.267551C53.8639 -0.0891835 53.1362 -0.0891835 52.5603 0.267551L0.843857 32.3674C0.166125 32.7883 -0.14944 33.6068 0.0681114 34.3717C0.287335 35.1385 0.986592 35.6664 1.78365 35.6664ZM53.5001 3.88233L98.9623 32.0999H8.03768L53.5001 3.88233Z" fill="black"/>
                        <path d="M7.13281 94.5157C7.13281 95.5 7.93176 96.2989 8.91607 96.2989H98.0823C99.0666 96.2989 99.8655 95.5 99.8655 94.5157C99.8655 93.5314 99.0666 92.7324 98.0823 92.7324H8.91607C7.93176 92.7324 7.13281 93.5314 7.13281 94.5157Z" fill="black"/>
                        <path d="M105.216 99.8662H1.78325C0.798943 99.8662 0 100.665 0 101.649V105.216C0 106.2 0.798943 106.999 1.78325 106.999C2.76756 106.999 3.56651 106.2 3.56651 105.216V103.433H103.433V105.216C103.433 106.2 104.232 106.999 105.216 106.999C106.2 106.999 106.999 106.2 106.999 105.216V101.649C106.999 100.665 106.2 99.8662 105.216 99.8662Z" fill="black"/>
                        <path d="M44.584 85.5997C43.5997 85.5997 42.8008 86.3986 42.8008 87.3829C42.8008 88.3672 43.5997 89.1662 44.584 89.1662H62.4172C63.4015 89.1662 64.2004 88.3672 64.2004 87.3829C64.2004 86.3986 63.4015 85.5997 62.4172 85.5997H60.6339V42.7999H62.4172C63.4015 42.7999 64.2004 42.001 64.2004 41.0167C64.2004 40.0323 63.4015 39.2334 62.4172 39.2334H44.584C43.5997 39.2334 42.8008 40.0323 42.8008 41.0167C42.8008 42.001 43.5997 42.7999 44.584 42.7999H46.3673V85.5997H44.584ZM49.934 42.7999H57.0672V85.5997H49.934V42.7999Z" fill="black"/>
                        <path d="M73.1172 85.5997C72.1329 85.5997 71.334 86.3986 71.334 87.3829C71.334 88.3672 72.1329 89.1662 73.1172 89.1662H90.9504C91.9347 89.1662 92.7337 88.3672 92.7337 87.3829C92.7337 86.3986 91.9347 85.5997 90.9504 85.5997H89.1671V42.7999H90.9504C91.9347 42.7999 92.7337 42.001 92.7337 41.0167C92.7337 40.0323 91.9347 39.2334 90.9504 39.2334H73.1172C72.1329 39.2334 71.334 40.0323 71.334 41.0167C71.334 42.001 72.1329 42.7999 73.1172 42.7999H74.9005V85.5997H73.1172ZM78.4672 42.7999H85.6004V85.5997H78.4672V42.7999Z" fill="black"/>
                        </g>
                        <path d="M18.2627 132.64C19.276 132.8 20.196 133.213 21.0227 133.88C21.876 134.547 22.5427 135.373 23.0227 136.36C23.5293 137.347 23.7827 138.4 23.7827 139.52C23.7827 140.933 23.4227 142.213 22.7027 143.36C21.9827 144.48 20.9293 145.373 19.5427 146.04C18.1827 146.68 16.5693 147 14.7027 147H4.30266V119.12H14.3027C16.196 119.12 17.8093 119.44 19.1427 120.08C20.476 120.693 21.476 121.533 22.1427 122.6C22.8093 123.667 23.1427 124.867 23.1427 126.2C23.1427 127.853 22.6893 129.227 21.7827 130.32C20.9027 131.387 19.7293 132.16 18.2627 132.64ZM7.94266 131.16H14.0627C15.7693 131.16 17.0893 130.76 18.0227 129.96C18.956 129.16 19.4227 128.053 19.4227 126.64C19.4227 125.227 18.956 124.12 18.0227 123.32C17.0893 122.52 15.7427 122.12 13.9827 122.12H7.94266V131.16ZM14.3827 144C16.196 144 17.6093 143.573 18.6227 142.72C19.636 141.867 20.1427 140.68 20.1427 139.16C20.1427 137.613 19.6093 136.4 18.5427 135.52C17.476 134.613 16.0493 134.16 14.2627 134.16H7.94266V144H14.3827ZM45.3139 140.8H33.1539L30.9139 147H27.0739L37.1539 119.28H41.3539L51.3939 147H47.5539L45.3139 140.8ZM44.2739 137.84L39.2339 123.76L34.1939 137.84H44.2739ZM77.707 147H74.067L59.427 124.8V147H55.787V119.08H59.427L74.067 141.24V119.08H77.707V147ZM99.032 147L87.552 134.28V147H83.912V119.12H87.552V132.04L99.072 119.12H103.672L91.032 133.08L103.792 147H99.032Z" fill="black"/>
                        <defs>
                        <clipPath id="clip0_102_5">
                        <rect width="107" height="107" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                </button>
            </form>
        </div>
    </div>
</body>
</html>