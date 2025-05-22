@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-[#2f3036] shadow-lg rounded-2xl border border-gray-700">
        <div class="flex items-center px-6 py-6 border-b border-gray-600">
            <div class="w-16 h-16 rounded-full bg-gray-700 flex items-center justify-center overflow-hidden">
                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                </svg>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-semibold text-white" id="profile-name"></h2>
                <p class="text-sm text-gray-400" id="profile-email"></p>
                <p class="text-xs text-gray-500" id="profile-bio"></p> <!-- Tambahan untuk bio -->
            </div>

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
                    // Isi ke textfield
                    $('#name').val(response.user.name);
                    $('#email').val(response.user.email);
                    $('#bio').val(response.user.bio ?? '');

                    // Tampilkan di samping foto profil
                    $('#profile-name').text(response.user.name);
                    $('#profile-email').text(response.user.email);
                    $('#profile-bio').text(response.user.bio ?? '');
                } else {
                    notify("error", "Error while fetching user data");
                }
            },
            error: function(xhr) {
                iziToast.warning({
                    timeout: false,
                    close: false,
                    overlay: false,
                    displayMode: 'once',
                    title: 'fa fa-warning',
                    message: 'No user data found',
                    position: 'top-end',
                    backgroundColor: '#1f2937',
                    titleColor: '#ffffff',
                    messageColor: '#ffffff',
                });
            }
        });
    }

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
                            backgroundColor: '#10b981', // Tailwind green-500
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