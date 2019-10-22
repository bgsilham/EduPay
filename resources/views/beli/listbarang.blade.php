@extends('layouts.nonav')

@section('link')
    {{url('/home')}}
@stop

@section('title')
    List Barang
@endsection

@section('barang')
    active
@stop

@section('content')
<div class="container">
    <h3 class="title">{{$kategori}}</h3>
            @if (session()->has('status'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('status')}}
                </div>                        
            @endif
    <div class="barang-noscroll">
        <div class="search-box">
            <form action="{{url('search/barang')}}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Ayo cari sesuatu">
                <button class="button">Search</button>                
            </form>
        </div>
        @forelse ($lists as $item)
            <div class="barang-box">
                <a href="{{url("detail/barang/$item->id")}}">                                                        
                    <div class="image-box">
                        <p class="diskon">50%</p>
                        <img src="{{asset($item->img)}}" alt="" class="bg-image">
                        <img src="{{asset($item->img)}}" alt="">
                    </div>
                    <h3>{{str_limit($item->nama_barang,16)}}</h3>
                    <div class="harga">                                
                        <p class="harga-palsu">Rp {{number_format($item->harga_barang/2,2,',','.')}}</p>
                        <p class="harga-asli">Rp {{number_format($item->harga_barang,2,',','.')}}</p>
                    </div>                            
                </a>                
            </div>
        @empty
            <h3>Oopps Barang tidak di temukan</h3><a href="{{url('list/barang')}}">Lihat Semua barang?</a>
        @endforelse         
    </div>
</div>
<hr>
</div>
@endsection