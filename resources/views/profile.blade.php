@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-[#2f3036] shadow-lg rounded-2xl border border-gray-700">
        <div class="flex items-center px-6 py-6 border-b border-gray-600">
            <div class="w-16 h-16 rounded-full bg-gray-700 flex items-center justify-center overflow-hidden">
                <img src="" alt="Profile" class="object-cover w-full h-full">
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-semibold text-white"></h2>
                <p class="text-sm text-gray-400"></p>
            </div>
        </div>

        <div class="px-6 py-6 space-y-6">
            <form method="POST">
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
document.addEventListener("DOMContentLoaded", function() {
    fetchUserData();
})


    function fetchUserData() {
        $.ajax({
            url: "http://10.21.1.125:8000/api/profile",
            type: "GET",
            success: function(response) {
                $('#name').val(res.name);
                $('#email').val(res.email);
                $('#bio').val(res.bio || '');
                $('.text-xl').text(res.name);
                $('.text-sm.text-gray-400').text(res.email);
                $('img[alt="Profile"]').attr('src', res.profile_picture || 'https://api.dicebear.com/7.x/avataaars/svg');
            },
            error: function() {
                notify("error", "Gagal memuat data user");
            }
        });
    }
</script>
@endsection