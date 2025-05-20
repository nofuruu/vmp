<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/partials/sidebar.css') }}">
</head>

<body>
    <nav class="fixed top-0 z-50 w-full primary-gradient shadow-lg border-b border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end gap-4">
                    <!-- Sidebar Toggle Button -->
                    <button onclick="toggleSidebar()"
                        class="inline-flex items-center p-2 text-sm text-gray-300 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Abstract Music Logo -->
                    <a href="#" class="flex items-center gap-2 group transition-all duration-300">
                        <div
                            class="w-9 h-9 bg-gradient-to-tr from-red-500 via-pink-500 to-rose-500 rounded-full flex items-center justify-center shadow-md group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M4 12c1.5-4 2.5-4 4 0s2.5 4 4 0 2.5-4 4 0 2.5 4 4 0"
                                    stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <span class="text-xl font-extrabold tracking-wide text-gray-100 group-hover:text-white transition duration-300">
                            VMP
                        </span>
                    </a>
                </div>
                <!-- profile section -->
                <div class="flex items-center gap-2">
                    <div class="flex items-center ms-3">
                        <div class="relative">
                            <button type="button" onclick="toggleUserMenu()"
                                class="flex text-sm rounded-full ring-2 ring-gray-600 focus:ring-4 focus:ring-gray-500">
                                <div class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                                    </svg>
                                </div>
                            </button>
                            <div id="user-menu"
                                class="absolute right-0 hidden w-48 mt-2 origin-top-right bg-[#24252a] rounded-lg neo-shadow">
                                <div class="px-4 py-3 text-sm text-gray-200">
                                    <div class="font-medium">John Doe</div>
                                    <div class="text-xs text-gray-400">john@example.com</div>
                                </div>
                                <hr class="border-gray-700">
                                <div class="py-1">
                                    <a href="{{ url('/profile') }}"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Profile</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Settings</a>
                                    <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700">Sign
                                        out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform primary-gradient neo-shadow sidebar-transition">
        <div class="h-full px-3 pb-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ url('/dashboard') }}"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <i class="fas fa-house text-[20px] w-5 h-5 transition-colors duration-300"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/msmusic') }}"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <i class="fas fa-music text-[20px] w-5 h-5 transition-colors duration-300"></i>
                        <span class="ms-3">Master Music</span>
                    </a>
                </li>
                <li>
                    <a href=""
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <i class="fa fa-list text-[20px] w-5 h-5 transition-colors duration-300"></i>
                        <span class="ms-3">Playlist</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <i class="fas fa-envelope text-[20px] w-5 h-5 transition-colors duration-300"></i>
                        <span class="ms-3">Messages</span>
                        <span class="ms-auto px-2 py-0.5 text-xs font-medium glass-effect text-gray-300 rounded-full">3</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <i class="fas fa-folder text-[20px] w-5 h-5 transition-colors duration-300"></i>
                        <span class="ms-3">Projects</span>
                        <span class="ms-auto px-2 py-0.5 text-xs font-medium glass-effect text-gray-300 rounded-full">New</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <i class="fas fa-user text-[20px] w-5 h-5 transition-colors duration-300"></i>
                        <span class="ms-3">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <i class="fas fa-gear text-[20px] w-5 h-5 transition-colors duration-300"></i>
                        <span class="ms-3">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('-translate-x-full');
            if (sidebar.classList.contains('-translate-x-full')) {
                mainContent.style.paddingLeft = '2rem';
            } else {
                mainContent.style.paddingLeft = '16rem';
            }
        }

        function toggleUserMenu() {
            const menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        }
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('user-menu');
            const button = event.target.closest('button');

            if (!button && !menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>