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
                <div class="flex items-center justify-start rtl:justify-end">
                    <button onclick="toggleSidebar()"
                        class="inline-flex items-center p-2 text-sm text-gray-300 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">
                        <span class="self-center text-xl font-bold text-gray-200 whitespace-nowrap">Dashboard</span>
                    </a>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex items-center ms-3">
                        <div class="relative">
                            <button type="button" onclick="toggleUserMenu()"
                                class="flex text-sm rounded-full ring-2 ring-gray-600 focus:ring-4 focus:ring-gray-500">
                                <img class="w-8 h-8 rounded-full"
                                    src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="user photo">
                            </button>
                            <div id="user-menu"
                                class="absolute right-0 hidden w-48 mt-2 origin-top-right bg-[#24252a] rounded-lg neo-shadow">
                                <div class="px-4 py-3 text-sm text-gray-200">
                                    <div class="font-medium">John Doe</div>
                                    <div class="text-xs text-gray-400">john@example.com</div>
                                </div>
                                <hr class="border-gray-700">
                                <div class="py-1">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Profile</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700">Sign
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