@extends('layouts.admin')

@section('title')
    Detail Pengajuan
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                Detail Pengajuan
            </h2>


            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @foreach ($item->details as $ite)
                        <div
                            class="text-gray-800 text-sm font-semibold px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400 ">

                            <h2>Nama : {{ $ite->name }}</h2>
                            <h2 class="mt-4">NIK : {{ $ite->user_nik }}</h2>
                            <h2 class="mt-4">No Telepon : {{ $item->user->phone }}</h2>
                            <h2 class="mt-4">Tanggal : {{ $ite->created_at->format('l, d F Y - H:i:s') }}</h2>
                            <h2 class="mt-4">Status :
                                @if ($item->status == 'Belum di Proses')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                        {{ $item->status }}
                                    </span>
                                @elseif ($item->status == 'Sedang di Proses')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                        {{ $item->status }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                        {{ $item->status }}
                                    </span>
                                @endif
                            </h2>
                        </div>

                        <div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="relative hidden mr-3 md:block">
                                @if (str_ends_with($item->image, '.pdf'))
                                    <a href="{{ Storage::url($item->image) }}" target="_blank"
                                        class="flex items-center text-orange-500 hover:underline font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path d="M9 2a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1z" />
                                            <path fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2h4.586a2 2 0 011.414.586l4.828 4.828a2 2 0 010 2.828l-1.414 1.414a2 2 0 01-2.828 0L12 9.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Lihat File PDF
                                    </a>
                                @else
                                    <img class="h-32 w-35" src="{{ Storage::url($item->image) }}" alt=""
                                        loading="lazy" />
                                @endif
                            </div>
                            <div class="text-center flex-1 dark:text-gray-400">
                                <h1 class="mb-8 font-semibold">Keterangan</h1>
                                <p class="text-gray-800 dark:text-gray-400">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="px-4 py-3 mb-8 flex bg-white rounded-lg shadow-md dark:text-gray-400   dark:bg-gray-800">

                        <div class="text-center flex-1">
                            <h1 class="mb-8 font-semibold">Tanggapan</h1>
                            <p class="text-gray-800 dark:text-gray-400">
                                @if (empty($tangap->tanggapan))
                                    Belum ada tanggapan
                                @else
                                    {{ $tangap->tanggapan }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center my-4">
                    <a href="{{ url('admin/pengaduan/cetak', $item->id) }}"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        Export ke PDF
                    </a>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{ route('tanggapan.show', $item->id) }}"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        Berikan Tanggapan
                    </a>
                </div>
            </div>

    </main>
@endsection
