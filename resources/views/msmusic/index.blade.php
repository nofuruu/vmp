@extends('layouts.app')

@section('title', 'Master Music')

@section('content')
<style>
    /* DataTable Dark Theme Styling */
    .dataTables_wrapper {
        color: #d1d5db !important;
    }

    .dataTables_length select,
    .dataTables_filter input {
        background-color: #374151 !important;
        border: 1px solid #4b5563 !important;
        color: #d1d5db !important;
        border-radius: 0.5rem !important;
        padding: 0.25rem 0.5rem !important;
    }

    .dataTables_length select option {
        background-color: #374151 !important;
        color: #d1d5db !important;
    }

    .dataTables_info,
    .dataTables_paginate {
        margin-top: 1rem !important;
        color: #d1d5db !important;
    }

    .paginate_button {
        padding: 0.5rem 1rem !important;
        margin: 0 0.25rem !important;
        border-radius: 0.5rem !important;
        background-color: #374151 !important;
        border: 1px solid #4b5563 !important;
        color: #d1d5db !important;
    }

    .paginate_button:hover {
        background-color: #4b5563 !important;
        color: white !important;
    }

    .paginate_button.current {
        background-color: #6366f1 !important;
        border-color: #6366f1 !important;
        color: white !important;
    }

    .dataTables_empty {
        background-color: #2f3036 !important;
        color: #d1d5db !important;
    }

    table.dataTable tbody tr {
        background-color: #2f3036 !important;
    }

    table.dataTable tbody tr:hover {
        background-color: #374151 !important;
    }

    table.dataTable tbody td {
        padding: 1rem 0.75rem !important;
        border-bottom: 1px solid #4b5563 !important;
    }
</style>
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
            </div>
            <!-- Table -->
            <!-- Table --
            <div class="overflow-x-auto">
                <table id="tabmusic" class="min-w-full text-sm text-left text-gray-300">
                    <thead class="bg-gray-700 text-gray-100">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">artist</th>
                            <th class="px-4 py-2"><i class="fa fa-clock"></i></th>
                            <th class="px-4 py-2"><i class="fa fa-cog"></i></th>
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
    $(document).ready(function() {
        initTable(); // <--- Harus ada!
    });

    function initTable() {
        $('#tabmusic').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: 'http://10.21.1.125:8000/api/musicDatatable',
                type: 'GET',
                dataSrc: 'data',
            },
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search Music...",
                legthMenu: "_MENU_ records per page",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "(filtered from _MAX_ total entries)",
                zeroRecords: "No matching records found",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>'
                }
            },
            dom: '<"flex items-center justify-between mb-4"lf>rt<"flex items-center justify-between mt-4"ip>',
            ordering: true,
            responsive: true,
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
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        return data; // This will render the HTML button we created in the backend
                    }
                }
            ]
        });
    }
    // Add this function to handle delete
    function deleteMusic(id) {
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            title: 'Delete Confirmation',
            message: 'Are you sure you want to delete this music?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function(instance, toast) {
                    $.ajax({
                        url: `http://10.21.1.125:8000/api/music/${id}`,
                        type: 'DELETE',
                        success: function(response) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                            iziToast.success({
                                title: 'Success',
                                message: 'Music has been deleted',
                                position: 'topRight'
                            });
                            $('#tabmusic').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                            iziToast.error({
                                title: 'Error',
                                message: 'Something went wrong',
                                position: 'topRight'
                            });
                        }
                    });
                }, true],
                ['<button>NO</button>', function(instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');
                }]
            ]
        });
    }
</script>
@endsection