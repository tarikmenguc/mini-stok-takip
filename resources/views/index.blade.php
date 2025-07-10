@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-8">
        @auth
            <div class="mb-4 text-gray-700 text-lg">
                👋 <span class="font-semibold">Hoş geldin,</span> <span class="font-bold text-indigo-700">{{ Auth::user()->name }}</span>
            </div>
        @endauth

        <h1 class="text-3xl font-bold mb-2 text-gray-800">Ana Sayfa</h1>
        <h2 class="text-lg text-gray-600 mb-6">Ürünleri Düzenleyebilir, Silebilir veya Görüntüleyebilirsin</h2>

        @if(session("basari"))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">
                {{ session("basari") }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 border border-red-300">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $hata)
                        <li>{{ $hata }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-4 mb-8">
            @forelse($kategoriler as $kategori)
                <div class="bg-white shadow rounded-lg p-4 flex items-center justify-between border border-gray-100 hover:shadow-md transition">
                    <div class="text-base font-medium text-gray-800 truncate w-2/3">{{ $kategori->ad }}</div>
                    <a href="{{ url('/kategori_duzenle/' . $kategori->id) }}"
                       class="inline-block px-4 py-2 bg-green-500 text-white rounded-md text-sm font-semibold hover:bg-green-600 transition ml-4 shadow"
                    >Düzenle</a>
                </div>
            @empty
                <div class="text-center text-gray-500 py-8 text-sm">Hiç kategori yok.</div>
            @endforelse
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($urunler as $urun)
                <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col justify-between h-full border border-gray-100 hover:shadow-2xl transition">
                    <div>
                        <div class="text-2xl font-bold text-gray-800 mb-2">{{ $urun->ad }}</div>
                        <div class="text-gray-600 mb-1"><span class="font-medium">Fiyat:</span> {{ $urun->fiyat }} ₺</div>
                        <div class="text-gray-600 mb-1"><span class="font-medium">Açıklama:</span> {{ $urun->aciklama }}</div>
                        <div class="text-gray-600 mb-4"><span class="font-medium">Kategori:</span> {{ $urun->kategori->ad ?? 'Kategori Yok' }}</div>
                    </div>
                    <div class="flex space-x-2 mt-auto">
                        <form action="{{ url('/duzenle/' . $urun->id) }}" method="get">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition w-full">Düzenle</button>
                        </form>
                        <form action="{{ url('/sil/' . $urun->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition w-full" onclick="return confirm('Silmek istediğine emin misin?')">Sil</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12 text-lg">Hiç ürün yok.</div>
            @endforelse
        </div>

        <div class="mt-10 flex justify-end">
            <a href="{{ url('/ekle') }}" class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded shadow hover:bg-green-700 transition">+ Yeni Ürün Ekle</a>
        </div>
    </div>
@endsection
