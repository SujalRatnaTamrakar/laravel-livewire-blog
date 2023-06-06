<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
@if(session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show"
         class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 fixed bottom-3 left-3" role="alert">
        <p class="font-bold">{{session()->get('success')}}</p>
    </div>
@endif
@include('components.blog-components.navbar')

@yield('section')

<!--Divider-->
<hr class="border-b-2 border-gray-400 mb-8 mx-4">

<!--Footer-->
<footer class="bg-white border-t border-gray-400 shadow mt-5">
    <div class="container max-w-4xl mx-auto flex py-8">

        <div class="w-full mx-auto flex flex-wrap">
            <div class="flex w-full md:w-1/2 ">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">About</h3>
                    <p class="py-4 text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus
                        commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                    </p>
                </div>
            </div>

            <div class="flex w-full md:w-1/2">
                <div class="px-8">
                    <h3 class="font-bold text-gray-900">Social</h3>
                    <ul class="list-reset items-center text-sm pt-3">
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                               href="#">Add social link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                               href="#">Add social link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                               href="#">Add social link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</footer>


<script>
    /* Progress bar */
    //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
    var h = document.documentElement,
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight',
        progress = document.querySelector('#progress'),
        scroll;
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var menuIcon1 = document.getElementById("menuIcon1");
    var menuIcon2 = document.getElementById("menuIcon2");
    var mobileMenu = document.getElementById("mobile-menu");
    var profileMenu = document.getElementById("profile-menu");
    var profileButton = document.getElementById('profile-button');


    document.addEventListener('scroll', function () {
        /*Refresh scroll % width*/
        scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
        progress.style.setProperty('--scroll', scroll + '%');

        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if (scrollpos > 10) {
            header.classList.add("bg-white");
            header.classList.add("shadow");
        } else {
            header.classList.remove("bg-white");
            header.classList.remove("shadow");

        }

    });


    //Javascript to toggle the menu
    document.getElementById('menu').onclick = function () {
        if (mobileMenu.classList.contains("hidden")) {
            menuIcon1.classList.remove("block");
            menuIcon1.classList.add("hidden");
            menuIcon2.classList.remove("hidden");
            menuIcon2.classList.add("block");
            mobileMenu.classList.remove("hidden");
            if (!profileMenu.classList.contains("hidden")) {
                profileMenu.classList.add("hidden");
            }
        } else {
            menuIcon1.classList.add("block");
            menuIcon1.classList.remove("hidden");
            menuIcon2.classList.add("hidden");
            menuIcon2.classList.remove("block");
            mobileMenu.classList.add("hidden");
        }
    }

    if (profileButton != null) {
        profileButton.onclick = function () {
            if (profileMenu.classList.contains("hidden")) {
                profileMenu.classList.remove("hidden");
                if (!mobileMenu.classList.contains("hidden")) {
                    menuIcon1.classList.add("block");
                    menuIcon1.classList.remove("hidden");
                    menuIcon2.classList.add("hidden");
                    menuIcon2.classList.remove("block");
                    mobileMenu.classList.add("hidden");
                    mobileMenu.classList.add("hidden")
                }
            } else {
                profileMenu.classList.add("hidden");
            }
        }
    }

</script>
</body>


</html>
