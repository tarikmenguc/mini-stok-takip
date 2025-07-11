@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white shadow-md rounded-lg p-6 border border-gray-200">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Ürünü Güncelle</h2>

    @if(session('basari'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">
            {{ session('basari') }}
        </div>
    @endif

    <form action="/guncelle/{{ $urun->id }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="ad" class="block text-sm font-medium text-gray-700">Ürün Adı</label>
            <input type="text" name="ad" id="ad" value="{{ $urun->ad }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300" required>
        </div>

        <div>
            <label for="fiyat" class="block text-sm font-medium text-gray-700">Fiyat (₺)</label>
            <input type="number" name="fiyat" id="fiyat" step="0.01" value="{{ $urun->fiyat }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300" required>
        </div>

        <div>
            <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori ID</label>
            <input type="number" name="kategori_id" id="kategori_id" value="{{ $urun->kategori_id }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300" required>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Güncelle
        </button>
    </form>
</div>
@endsection
