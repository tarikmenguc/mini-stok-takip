@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Kategoriler</h1>

        @if(session('basari'))
            <div class="mb-4 p-2 rounded bg-green-100 text-green-800 border border-green-300 text-sm">
                {{ session('basari') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-2 rounded bg-red-100 text-red-800 border border-red-300 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-4 mb-8">
            @forelse($kategoriler as $kategori)
                <a href="{{ url('/kategori_duzenle/' . $kategori->id) }}" class="block bg-white shadow rounded-lg p-4 border border-gray-100 hover:shadow-md transition hover:bg-green-50">
                    <div class="text-base font-medium text-gray-800 truncate">{{ $kategori->ad }}</div>
                </a>
            @empty
                <div class="text-center text-gray-500 py-8 text-sm">Hiç kategori yok.</div>
            @endforelse
        </div>
    </div>
@endsection