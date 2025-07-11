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

        

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($urunler as $urun)
                <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col justify-between h-full border border-gray-100 hover:shadow-2xl transition">
                    <div>
                        <div class="text-2xl font-bold text-gray-800 mb-2">{{ $urun->ad }}</div>
                        <div class="text-gray-600 mb-1"><span class="font-medium">Fiyat:</span> {{ $urun->fiyat }} ₺</div>
                        <div class="text-gray-600 mb-1"><span class="font-medium">Stok:</span> {{ $urun->stok }}</div>
                        <div class="text-gray-600 mb-4"><span class="font-medium">Kategori:</span> {{ $urun->kategori->ad ?? 'Kategori Yok' }}</div>
                    </div>
                    <div class="flex space-x-2 mt-auto">
                         @can('update', $urun)
        <form action="{{ url('/duzenle/' . $urun->id) }}" method="get">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition w-full">Düzenle</button>
        </form>
    @endcan

    @can('delete', $urun)
        <form action="{{ url('/sil/' . $urun->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition w-full" onclick="return confirm('Silmek istediğine emin misin?')">Sil</button>
        </form>
    @endcan
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12 text-lg">Hiç ürün yok.</div>
            @endforelse
        </div>

        @if($urunler->hasPages())
        <div class="mt-8">{{$urunler->links()}}</div>
        @endif

        <div class="mt-10 flex justify-end">
            <a href="{{ url('/ekle') }}" class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded shadow hover:bg-green-700 transition">+ Yeni Ürün Ekle</a>
        </div>
    </div>
@endsection
