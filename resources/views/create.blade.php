@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Yeni Ürün Ekle</h2>

        @if(session("basari"))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">
                {{ session("basari") }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 border border-red-300">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $hata)
                        <li>{{ $hata }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/ekle') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="ad" class="block text-sm font-medium text-gray-700">Ürün Adı</label>
                <input type="text" name="ad" id="ad" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('ad') }}">
            </div>

            <div>
                <label for="StokMiktari" class="block text-sm font-medium text-gray-700">Stok Miktarı</label>
                <input type="number" name="StokMiktari" id="StokMiktari" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" value="{{ old('StokMiktari') }}">
            </div>

            <div>
                <label for="fiyat" class="block text-sm font-medium text-gray-700">Fiyat (₺)</label>
                <input type="number" step="0.01" name="fiyat" id="fiyat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" value="{{ old('fiyat') }}">
            </div>

            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                    <option value="">Seçiniz</option>
                    @foreach($kategoriler as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->ad }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Ürünü Ekle
                </button>
            </div>
        </form>
    </div>
@endsection
