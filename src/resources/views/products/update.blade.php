@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/update.css') }}">
@endsection

@section('content')
  <main class="content">
    <div class="detail-container">
      <div class="detail-header">
        <span>商品一覧 > {{ $product->name }}</span>
      </div>
      
      <div class="product-detail">
        <img src="{{ asset('storage/' . $product->image) }}"  alt="{{ $product->name }}" class="product-image">

        <div class="product-info">
          <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')

          <div class="product-name">
            <div class="name-label">商品名</div>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
              @error('name')
                <div class="error-message">
                  {{$errors->first('name')}}
                </div>
              @enderror
          </div>
        
          <div class="product-price">
            <div class="price-label">値段</div>
            <input type="text" name="price" value="{{ $product->price }}">
              @error('price')
                <div class="error-message">
                  {{$errors->first('price')}}
                </div>
              @enderror
          </div>
        
          <div class="season">
            <div class="season-label">季節</div>
            <div class="season-select">
                <input type="checkbox" name="seasons[]" value="spring" {{ in_array('spring', old('seasons', $product->seasons->pluck('name')->toArray()) ?: []) ? 'checked' : '' }}> 春

                <input type="checkbox" name="seasons[]" value="summer" {{ in_array('summer', old('seasons', $product->seasons->pluck('name')->toArray()) ?: []) ? 'checked' : '' }}>夏

                <input type="checkbox" name="seasons[]" value="autumn" {{ in_array('autumn', old('seasons', $product->seasons->pluck('name')->toArray()) ?: []) ? 'checked' : '' }}>秋

                <input type="checkbox" name="seasons[]" value="winter" {{ in_array('winter', old('seasons', $product->seasons->pluck('name')->toArray()) ?: []) ? 'checked' : '' }}>冬
            </div>
              @error('season')
                <div class="error-message">
                  {{$errors->first('season')}}
                </div>
              @enderror
          </div>

          <div class="product-form">
            <input type="file" id="image" name="image">

            <div class="product-description">
              <div class="description-label">商品説明</div>
              <textarea name="description" >{{ old('description', $product->description) }}</textarea>
                @error('description')
                <div class="error-message">
                  {{$errors->first('description')}}
                </div>
              @enderror
            </div>

          <div class="button-group">
            <a href="/products" class="button-back">戻る</a> <!--/productsに戻る -->
            <button class="button-submit" type="submit">変更を保存</button>
          </div>
          </form>


          <form class="delete-form" action="{{ route('products.delete', $product->id) }}" method="POST">
            @csrf  
            @method('DELETE')
            
            <button class="delete-form__button--submit" type="submit">🗑️</button>
              <input type="hidden" name="id" value="{{ $product['id'] }}">
            </button>
          </form>
        
      </div>
    </div>
@endsection