<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.3/dist/tailwind.min.css" rel="stylesheet">

    <!-- Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js">
        //javascript cdn
    </script>

    </script>
    <style>
        :root {
            --primary: #24252a;
            --primary-light: #2f3037;
            --primary-dark: #1a1b1f;
            --accent: #3d3e45;
            --accent-red: #ff3a4c;
            /* Merah yang vibrant tapi masih sesuai dengan tema gelap */
        }

        body {
            background-color: var(--primary);
            color: #fff;
        }

        .sidebar-transition {
            transition: all 0.3s ease-in-out;
        }

        .sidebar-overlay {
            background: rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease-in-out;
        }

        .primary-gradient {
            background: linear-gradient(145deg, var(--primary-light), var(--primary-dark));
        }

        .hover-gradient:hover {
            background: linear-gradient(145deg, var(--primary-dark), var(--primary-light));
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }

        .neo-shadow {
            box-shadow: 5px 5px 10px var(--primary-dark),
                -5px -5px 10px var(--primary-light);
        }

        .hover-neo:hover {
            box-shadow: inset 5px 5px 10px var(--primary-dark),
                inset -5px -5px 10px var(--primary-light);
        }

        /* Menambahkan transisi hover untuk menu text */
        .menu-item span {
            transition: color 0.3s ease;
        }

        /* Efek hover merah pada text menu */
        .menu-item:hover span {
            color: var(--accent-red);
        }

        /* Efek hover merah pada icon */
        .menu-item:hover svg {
            color: var(--accent-red);
        }

        /* Efek glow subtle saat hover */
        .menu-item:hover {
            text-shadow: 0 0 8px rgba(255, 58, 76, 0.3);
        }
    </style>
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
                    <button
                        class="px-4 py-2 text-sm font-medium text-gray-300 glass-effect rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                        Sign In
                    </button>
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
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <svg class="w-5 h-5 transition-colors duration-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <svg class="w-5 h-5 transition-colors duration-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="ms-3">Projects</span>
                        <span class="ms-auto px-2 py-0.5 text-xs font-medium glass-effect text-gray-300 rounded-full">
                            New
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <svg class="w-5 h-5 transition-colors duration-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <span class="ms-3">Messages</span>
                        <span class="ms-auto px-2 py-0.5 text-xs font-medium glass-effect text-gray-300 rounded-full">
                            3
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <svg class="w-5 h-5 transition-colors duration-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="ms-3">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                        <svg class="w-5 h-5 transition-colors duration-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ms-3">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.js"></script>
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