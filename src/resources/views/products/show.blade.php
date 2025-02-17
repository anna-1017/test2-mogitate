@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
  <main class="content">
    <div class="detail-container">
      <div class="detail-header">
        <span>商品詳細 > {{ $product->name }}</span>
      </div>

      <div class="product-detail">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">

        <div class="product-info">
          <div class="product-name">
            <div class="name-label">商品名</div>
            <span>{{ $product->name }}</span>
          </div>

          <div class="product-price">
            <div class="price-label">値段</div>
            <span>￥{{ number_format($product->price) }}</span>
          </div>

          <div class="season">
            <div class="season-label">季節</div>
              @foreach($product->seasons as $season)
                <span>{{ $season->name }}</span>
              @endforeach
            </div>

          <div class="product-description">
            <div class="description-label">商品説明</div>
            <span>{{ $product->description }}</span>
          </div>
        </div>


        <a href="{{ route('products.edit', $product->id) }}" class="button-edit">編集</a>
      </div>
    </div>
@endsection
