<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signUp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-col justify-center font-[sans-serif] sm:h-screen p-4" style="background: linear-gradient(138deg, rgba(212,207,64,1) 6%, rgba(172,170,40,1) 34%, rgba(152,151,28,1) 51%, rgba(120,121,9,1) 75%, rgba(63,76,79,1) 99%)" >
        <div class="max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8 bg-black">
            <div class="text-center mb-12">
                <a href="javascript:void(0)"><img
                        src="../images/logo3.jpg" alt="logo" class='w-40 inline-block' />
                </a>
            </div>

            <form method="Post" action="../controller/signup.php">
                <div class="space-y-6"> 
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block text-white">Email </label>
                        <input name="email" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter email" />
                    </div>
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block text-white">name</label>
                        <input name="name" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="your name" />
                    </div>
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block text-white">Password</label>
                        <input name="password" type="password" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter confirm password" />
                    </div>
                </div>

                <div class="!mt-12">
                    <button type="submit" class="w-full py-3 px-4 text-sm tracking-wider font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        Create an account
                    </button>
                </div>
                <p class="text-gray-800 text-sm mt-6 text-center text-white">Already have an account? <a href="./signin.php" class="text-blue-600 font-semibold hover:underline ml-1">Login here</a></p>
            </form>
        </div>
    </div>

</body>

</html>