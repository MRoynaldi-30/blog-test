<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-screen min-h-screen flex items-center justify-center bg-gray-50 px-4 sm:px-6 lg:px-8">
        <div class="relative py-3 sm:max-w-xs sm:mx-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="w-12 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                        <path fill="#BEE3F8" d="M44,7L4,23l40,16l-7-16L44,7z M36,23H17l18-7l1,6V23z"></path>
                        <path fill="#3182CE"
                            d="M40.212,10.669l-5.044,11.529L34.817,23l0.351,0.802l5.044,11.529L9.385,23L40.212,10.669 M44,7L4,23 l40,16l-7-16L44,7L44,7z">
                        </path>
                        <path fill="#3182CE"
                            d="M36,22l-1-6l-18,7l17,7l-2-5l-8-2h12V22z M27.661,21l5.771-2.244L33.806,21H27.661z">
                        </path>
                    </svg>
                </div>
                <p class="m-0 text-[16px] font-semibold">Login to your Account</p>
                <div class="w-full flex flex-col gap-2">
                    <label class="font-semibold text-xs text-gray-400 " for="username">Username</label>
                    <input type="text" name="username" id="username" class="border rounded-lg px-3 py-2 mb-5 text-sm w-full outline-none" placeholder="Username" />
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="font-semibold text-xs text-gray-400" for="password">Password</label>
                    <input type="password" name="password" id="password" class="border rounded-lg px-3 py-2 mb-5 text-sm w-full outline-none" placeholder="••••••••" />
    
                </div>
                <div className="mt-5">
                    <button type="submit" class="py-1 px-8 bg-blue-500 hover:bg-blue-800 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none">Login</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>