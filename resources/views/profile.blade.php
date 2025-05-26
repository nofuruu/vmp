@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
</head>
<div id="imageModal"
    class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="w-full max-w-md mx-4 rounded-2xl shadow-2xl bg-[#2f3036] border border-gray-700">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-600">
            <h3 class="text-lg font-semibold text-gray-200" id="imageModalLabel">Upload Images</h3>
            <button id="closeBtn" class="text-gray-400 hover:text-gray-200 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="px-6 py-6">
            <form id="uploadImgDropzone"
                class="dropzone flex flex-col items-center justify-center
                border-2 border-dashed border-gray-600 rounded-lg bg-gray-800 p-6">
                <div class="dz-message flex flex-col items-center gap-3 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 opacity-70" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M16 12l-4-4m0 0l-4 4m4-4v12" />
                    </svg>
                    <span class="font-medium tracking-wide">Choose or drop images here</span>
                </div>
            </form>
        </div>
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-gray-600">
            <button id="buttonClose"
                class="px-4 py-2 rounded-lg bg-gray-700 text-gray-200 hover:bg-gray-600">
                Close
            </button>
            <button id="uploadBtn"
                class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-500">
                Upload
            </button>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-[#2f3036] shadow-lg rounded-2xl border border-gray-700">
        <div class="flex items-center justify-between px-6 py-6 border-b border-gray-600">
            <!-- Kiri: Foto profil dan info -->
            <div class="flex items-center gap-4">
                <!-- Trigger Modal -->
                <div id="profileImageTrigger"
                    class="w-16 h-16 rounded-full bg-gray-700 flex items-center justify-center overflow-hidden cursor-pointer hover:ring-2 hover:ring-indigo-500 transition">
                    <img id="profile-image" class="w-full h-full object-cover" alt="Profile Picture">
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-white" id="profile-name">...</h2>
                    <p class="text-sm text-gray-400" id="profile-email">...</p>
                    <p class="text-xs text-gray-500" id="profile-bio">...</p>
                </div>
            </div>

            <!-- Kanan: Tombol edit -->
            <button id="profileImageTrigger" class="inline-flex items-center gap-2 text-sm px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white font-medium rounded-lg transition">
                <i class="fa fa-pencils"></i>
                Edit Photo
            </button>
        </div>


        <div class="px-6 py-6 space-y-6">
            <form id="profileForm">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                        <input type="text" name="name" id="name" value=""
                            class="mt-1 block w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Name cannot be empty">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                        <input type="email" name="email" id="email" value=""
                            class="mt-1 block w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="@ex: sum@gmail.com">
                    </div>
                    <div class="md:col-span-2">
                        <label for="bio" class="block text-sm font-medium text-gray-300">Bio</label>
                        <textarea name="bio" id="bio" rows="4"
                            class="mt-1 block w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Tell something about yourself..."></textarea>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-lg transition duration-300">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script src="{{ asset('js/userManagement.js') }}"></script>
<script>
    function getUserData() {
        let userId = localStorage.getItem('id');
        if (!userId) {
            notify("error", "Undefined User");
            return;
        }

        $.ajax({
            url: `http://10.21.1.125:8000/api/user/${userId}`,
            type: 'GET',
            success: function(response) {
                if (response.status === true) {
                    // Set form values
                    $('#name').val(response.user.name);
                    $('#email').val(response.user.email);
                    $('#bio').val(response.user.bio ?? '');

                    // Set profile info
                    $('#profile-name').text(response.user.name);
                    $('#profile-email').text(response.user.email);
                    $('#profile-bio').text(response.user.bio ?? '');

                    // Set profile image - path is already default if null in database
                    $('#profile-image').attr('src', response.user.profile_picture);
                } else {
                    notify("error", "Error while fetching user data");
                }
            },
            error: function(xhr) {
                notify("error", "No user data found");
            }
        });
    }

    Dropzone.autoDiscover = false;

    const id = localStorage.getItem('id');
    const Dropzone = new Dropzone("#uploadImgDropzone", {
        url: `http://10.21.1.125:8000/api/users/${id}`,
        autoProcessQueue: false,
        acceptedFiles: "image/*",
        maxFiles: 1,
    });


    const modal = document.getElementById('imageModal');
    const trigger = document.getElementById('profileImageTrigger'); // ✔️ FIXED
    const closeModal = () => modal.classList.add('hidden');

    trigger.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    document.getElementById('closeBtn').addEventListener('click', closeModal);
    document.getElementById('buttonClose').addEventListener('click', closeModal);



    $(document).ready(function() {
        getUserData();

        $('#profileForm').on('submit', function(e) {
            e.preventDefault();
            let userId = localStorage.getItem('id');
            const data = {
                name: $('#name').val(),
                email: $('#email').val(),
                bio: $('#bio').val()
            };

            $.ajax({
                url: `http://10.21.1.125:8000/api/user/${userId}`,
                type: 'PUT',
                data: JSON.stringify(data),
                success: function(Response) {
                    if (response.status === true) {
                        iziToast.success({
                            title: '✅ Success',
                            message: 'User data successfully loaded!',
                            position: 'topRight',
                            timeout: 3000,
                            transitionIn: 'fadeInDown',
                            transitionOut: 'fadeOutUp',
                            backgroundColor: '#10b981',
                            titleColor: '#ffffff',
                            messageColor: '#f0fdf4',
                            icon: 'fa-solid fa-check-circle',
                            progressBarColor: '#ffffff',
                        });
                    } else {
                        notify("error", "Gagal update data");
                    }
                },
                error: function(response) {
                    notify("error", "Terjadi kesalahan silahkan ulangi beberapa saat lagi")
                }
            });
        })
    })
</script>
@endsection