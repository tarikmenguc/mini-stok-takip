@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10">
        <h1 class="text-xl font-bold mb-4 text-gray-800">Kategori Düzenle</h1>

        @if(session('basari'))
            <div class="mb-4 p-2 rounded bg-green-100 text-green-800 border border-green-300 text-sm">
                {{ session('basari') }}
            </div>
        @endif
        @if($errors->any())
            <div class="mb-4 p-2 rounded bg-red-100 text-red-800 border border-red-300 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row gap-4">
            <!-- Güncelle Kartı -->
            <div class="flex-1 bg-white shadow rounded-lg p-5 border border-gray-100 flex flex-col items-center">
                <div class="text-sm font-semibold text-gray-700 mb-2">Kategori Adını Güncelle</div>
                <form action="/kategori_guncelle/{{ $kategori->id }}" method="post" class="w-full flex flex-col gap-2">
                    @csrf
                    @method('PUT')
                    <input type="text" name="ad" id="ad" value="{{ $kategori->ad }}" class="px-3 py-2 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded text-sm font-semibold hover:bg-green-700 transition">Güncelle</button>
                </form>
            </div>
            <!-- Sil Kartı -->
            <div class="flex-1 bg-white shadow rounded-lg p-5 border border-gray-100 flex flex-col items-center">
                <div class="text-sm font-semibold text-gray-700 mb-2">Kategoriyi Sil</div>
                <form action="/kategori/{{ $kategori->id }}" method="POST" onsubmit="return confirm('Silmek istediğine emin misin?')" class="w-full flex flex-col gap-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded text-sm font-semibold hover:bg-red-700 transition">Sil</button>
                </form>
            </div>
        </div>
    </div>
@endsection