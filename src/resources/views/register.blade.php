@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{asset('css/register.css') }}">
@endsection  

@section('content')
<main class="register-content">
  <div class="register-content__header">
    <h2>商品登録</h2>
  </div>

  <form class="register-form" action="/products/register" method="POST" enctype="multipart/form-data">
    @csrf
      
    <div class="form-group">
      <label for="product-name">商品名 <span class="required">必須</span></label>
      <input type="text" id="product-name"  name="product-name" placeholder="商品名を入力">
        @error('name')
          <div class="error-message">
            {{$errors->first('name')}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <label for="product-price">値段
      <span class="required">必須</span></label>
      <input type="number" id="product-price" name="product-price" placeholder="値段を入力">
        @error('price')
          <div class="error-message">
            {{$errors->first('price')}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <label class="product-image">商品画像<span class="required">必須</span></label>
      <input type="file" id="product-image" name="image">
        @error('image')
          <div class="error-message">
            {{$errors->first('image')}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <label for="season">季節<span class="required">必須</span>
      <span class="optional">複数選択可</span></label>
      <div class="season-select">
        <label><input class="checkbox" type="checkbox" name="season" value="spring">春</label>
        <label><input class="checkbox" type="checkbox" name="season" value="summer">夏</label>
        <label><input class="checkbox" type="checkbox" name="season" value="autumn">秋</label>
        <label><input class="checkbox" type="checkbox" name="seasonr" value="winter">冬</label>
      </div>
        @error('season')
          <div class="error-message">
            {{$errors->first('season')}}
          </div>
        @enderror
    </div>

    <div class="form-group">
      <label for="product-description">商品説明<span class="required">必須</span></label>
      <textarea id="product-description"name="description" placeholder="商品の説明を入力"></textarea>
        @error('description')
          <div class="error-message">
            {{$errors->first('description')}}
          </div>
        @enderror
    </div>

    <div class="form__button-group">
      <button class="button-back" type="button">戻る</button>
      <button class="button-register" type="submit">登録</button>
    </div>
  </form>
</main>
@endsection