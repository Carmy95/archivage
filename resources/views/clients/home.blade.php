@extends('clients.layouts.master')
@section('content')

<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        @if ($datas->isEmpty())
            <div class="single-product-area section-padding-100 clearfix">
                <div class="cart-title">
                    <h2>Aucun document archiver dans ce service</h2><br>
                </div>
                <div style="text-align: center">
                    <a class="btn amado-btn" href="{{ route('clients.create') }}">Achiver un document maintenant</a>
                </div>
            </div>
        @else
            @foreach ($datas as $item)
                <div class="single-products-catagory clearfix">
                    <a href="{{ route('clients.show',$item->id) }}">
                        <img src="{{asset(''.$item->couverture.'')}}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>{{ $item->reference }}</p>
                            <h4>{{ strtoupper($item->nom) }}</h4>
                            <p> Type : {{ $item->type->libelle }}</p>
                            <p>{{ $item->statu->libelle }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
