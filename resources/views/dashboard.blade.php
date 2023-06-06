@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </header>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-5">
                    <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-700">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold dark:text-white">62</span>
                            <span class="block text-gray-500">Subscribers</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-700">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold dark:text-white">6.8</span>
                            <span class="block text-gray-500">View Rate</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-700">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block text-2xl font-bold dark:text-white">9</span>
                            <span class="inline-block text-xl text-gray-500 font-semibold dark:text-white">(14%)</span>
                            <span class="block text-gray-500">Underperforming posts</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-700">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold dark:text-white">83%</span>
                            <span class="block text-gray-500">Finished homeworks</span>
                        </div>
                    </div>
                </section>
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold mb-5 dark:text-white">Your posts</h1>
                    </div>
                    <div>
                        <a href="{{ route('posts.export') }}">
                            <button
                                class="bg-slate-800 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button"
                            ><span><i class="fa fa-file-export"></i> Export to CSV</span>
                            </button>
                        </a>
                        <button id="import-btn"
                                class="bg-slate-800 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button"
                        ><span><i class="fa fa-file-import"></i> Import from CSV</span>
                        </button>
                    </div>
                </div>
                @foreach($posts as $post)
                    <x-blog-components.dashboard-post-card-layout
                        :post="$post"></x-blog-components.dashboard-post-card-layout>
                @endforeach

                {{ $posts->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#import-btn').on('click', function (e) {
                Swal.fire({
                    title: 'Select a file',
                    input: 'file',
                    html: '<h2>It is recommended to use the following format:</h2>' +
                        '<div class="relative overflow-x-auto">' +
                        '<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="width: 600px">' +
                        '<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"> ' +
                        '<tr> ' +
                        '<th scope="col" class="px-6 py-3">Title </th> ' +
                        '<th scope="col" class="px-6 py-3">Category </th> ' +
                        '<th scope="col" class="px-6 py-3">Excerpt </th> ' +
                        '<th scope="col" class="px-6 py-3">Content </th> ' +
                        '<th scope="col" class="px-6 py-3">Tags </th> ' +
                        '</tr> ' +
                        '</thead> ' +
                        '<tbody> ' +
                        '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> ' +
                        '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">The title </th> ' +
                        '<td class="px-6 py-4">A Category </td> ' +
                        '<td class="px-6 py-4">An Excerpt </td> ' +
                        '<td class="px-6 py-4">Content(Html) </td> ' +
                        '<td class="px-6 py-4">Tag(s) </td> ' +
                        '</tr> ' +
                        '</tbody> ' +
                        '</table> ' +
                        '</div>',
                    inputAttributes: {
                        autocapitalize: 'off',
                        accept: '.xlsx, .csv'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Look up',
                    showLoaderOnConfirm: true,
                    preConfirm: (file) => {
                        if (!file) {
                            Swal.showValidationMessage('No file selected')
                            return
                        }
                        const formData = new FormData();
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        formData.append('file', file)

                        return fetch('{{ route('posts.import') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(response.statusText)
                                }
                                return response.json()
                            })
                            .catch(error => {
                                Swal.showValidationMessage(`Upload failed: ${error}`)
                            })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Upload Successful',
                            text: 'File has been uploaded successfully',
                            // Perform further actions if needed
                        }).then(function () {
                            location.reload();
                        })
                    }
                });
            })
        });
    </script>
@endpush
