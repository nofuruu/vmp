@extends('layouts.app')

@section('title', 'Master Music')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
    <div class="bg-[#2f3036] rounded-2xl shadow-lg border border-gray-700">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-600">
            <h3 class="text-lg font-semibold text-white">Music Master</h3>
        </div>
        <!-- Body -->
        <div class="px-6 py-4">
            <!-- Button Actions -->
            <div class="flex justify-end gap-2 mb-3">
                <a href="{{ url('/addmusic') }}"
                    class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-lg transition duration-300 shadow-md">
                    <i class="fa fa-plus-circle mr-2"></i>
                    Add Music
                </a>
                <button
                    class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-lg transition duration-300 shadow-md">
                    <i class="fa fa-filter mr-2"></i>
                    Filter
                </button>
            </div>
            <!-- Table -->
            <!-- Table -->
            <div class="overflow-x-auto">
                <table id="tabmusic" class="min-w-full text-sm text-left text-gray-300">
                    <thead class="bg-gray-700 text-gray-100">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">artist</th>
                            <th class="px-4 py-2"><i class="fa fa-clock"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
            initTable(); // <--- Harus ada!
        });

    function initTable() {
            $('#tabmusic').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: 'http://10.21.1.27:8000/api/musicDatatable',
                    type: 'GET',
                    dataSrc: 'data', 
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'artist'
                    },
                    {
                        data: 'duration'
                    }
                ]
            });
        }
</script>
@endsection