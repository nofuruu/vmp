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
                            class="w-9 h-9 bg-gradient-to-tr from-black-500 via-black-500 to-black-500 rounded-full flex items-center justify-center shadow-md group-hover:scale-105 transition-transform duration-300">
                            <img src="{{ asset('images/icon.png') }}"
                                alt="VMP Icon"
                                class="w-7 h-7 object-contain">
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
                                class="flex text-sm transition duration-300 ease-in-out hover:ring-4 hover:ring-indigo-500">
                                <div id="profileContainer"
                                    class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-600 hover:border-indigo-500 transition-all duration-300">
                                    <img id="pfp"
                                        class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300"
                                        alt="Profile picture"
                                        onerror="this.src='/images/default-pfp.png'">
                                </div>
                            </button>
                            <div id="user-menu"
                                class="absolute right-0 hidden w-48 mt-2 origin-top-right bg-[#24252a] rounded-lg neo-shadow">
                                <div class="px-4 py-3 text-sm text-gray-200">
                                    <div class="font-medium" id="username"></div>
                                    <div class="text-xs text-gray-400" id="email"></div>
                                </div>
                                <hr class="border-gray-700">
                                <div class="py-1">
                                    <a href="{{ url('/profile') }}"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Profile</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700" id="logoutBtn">Sign out</a>
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
        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
                <a href="{{ url('/dashboard') }}"
                    class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <!-- Search -->
            <li>
                <a href="{{ url('music/search') }}"
                    class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span class="ms-3">Search</span>
                </a>
            </li>

            <!-- Playlist -->
            <li>
                <a href="#"
                    class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="ms-3">Playlist</span>
                </a>
            </li>

            <!-- Socials -->
            <li>
                <a href="#"
                    class="menu-item flex items-center p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="ms-3">Socials</span>
                </a>
            </li>

            <!-- Settings with Submenu -->
            <li>
                <button type="button" onclick="toggleSettingsMenu()"
                    class="menu-item flex items-center w-full p-2 text-gray-300 rounded-lg hover-gradient hover-neo group transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left">Settings</span>
                    <svg class="w-5 h-5 transition-transform duration-300" id="settingsArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul id="settingsSubmenu" class="hidden py-2 space-y-2">
                    <!-- Master Music -->
                    <li>
                        <a href="{{ url('/msmusic') }}"
                            class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700 group transition-all duration-300 pl-11">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                            </svg>
                            <span class="ms-3">Master Music</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
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

            // Tambahkan ini untuk trigger event
            const event = new CustomEvent('sidebarToggled', {
                detail: {
                    closed: sidebar.classList.contains('-translate-x-full')
                }
            });
            window.dispatchEvent(event);
        }

        function toggleSettingsMenu() {
            const submenu = document.getElementById('settingsSubmenu');
            const arrow = document.getElementById('settingsArrow');
            submenu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
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

        function getUserData() {
            let userid = localStorage.getItem('id'); // pastikan variabel ini ada
            if (!userid) {
                console.error("User ID tidak ditemukan di localStorage.");
                return;
            }

            $.ajax({
                url: `http://10.21.1.125:8000/api/user/${userid}`,
                type: 'GET',
                success: function(response) {
                    if (response.status === true) {
                        $('#username').text(response.user.name);
                        $('#email').text(response.user.email);
                        $('#pfp').attr('src', response.user.profile_picture);
                    } else {
                        notify("error", "error while fetching user data");
                    }
                },
                error: function() {
                    notify("error", "Gagal mengambil data pengguna.");
                }
            });
        }


        $(document).ready(function() {
            getUserData();

            $('#logoutBtn').on('click', function(e) {
                e.preventDefault();
                iziToast.question({
                    timeout: false,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    title: '⚠️',
                    message: 'Are you sure you want to logout?',
                    position: 'center',
                    backgroundColor: '#1f2937', // dark gray
                    titleColor: '#ffffff',
                    messageColor: '#ffffff',
                    buttons: [
                        [
                            '<button style="background-color:#dc2626;color:white;padding:6px 12px;border:none;border-radius:4px;margin-right:10px;">Yes</button>',
                            function(instance, toast) {
                                localStorage.removeItem('id');
                                localStorage.removeItem('name');
                                window.location.href = "{{ url('/logout') }}";
                                instance.hide({
                                    transitionOut: 'fadeOut'
                                }, toast, 'button');
                            },
                            true
                        ],
                        [
                            '<button style="background-color:#6b7280;color:white;padding:6px 12px;border:none;border-radius:4px;">Cancel</button>',
                            function(instance, toast) {
                                instance.hide({
                                    transitionOut: 'fadeOut'
                                }, toast, 'button');
                            }
                        ]
                    ]
                });
            });
        });
    </script>
</body>

</html>