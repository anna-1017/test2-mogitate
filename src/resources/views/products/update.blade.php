<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>

    <link rel="stylesheet" href="{{asset('css/update.css') }}">
</head>
<body>
  <header class="header">mogitate</header>
<!--この上はlayoutsへ -->
  

  <main class="content">
    <div class="detail-container">
      <div class="detail-header">
        <span>商品一覧 > {{ $product->name }}</span>
      </div>
      
      <div class="product-detail">
        <img src="{{ $product->image }}"  alt="{{ $product->name }}" class="product-image">

        <div class="product-info">
          <form action="{{ route('products.update', $product->id )}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')

          <div class="product-name">
            <div class="name-label">商品名</div>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
          </div>
        
          <div class="product-price">
            <div class="price-label">値段</div>
            <input type="text" name="price" value="{{ $product->price }}">
          </div>
        
          <div class="season">
            <div class="season-label">季節</div>
            <div class="season-select">
                <input type="radio" name="season" value="spring" {{ old('season', $product->season) == 'spring' ? 'checked' : '' }}>春
                <input type="radio" name="season" value="summer" {{ old('season', $product->season) == 'summer' ? 'checked' : '' }}>夏
                <input type="radio" name="season" value="autumn" {{ old('season', $product->season) == 'autumn' ? 'checked' : '' }}>秋
                <input type="radio" name="season" value="winter" {{ old('season', $product->season) == 'winter' ? 'checked' : '' }}>冬
            </div>
          </div>
        </div>
      

          <div class="product-form">
            <input type="file" id="image" name="image">

          <div class="product-discription">
            <div class="description-label">商品説明</div>
            <textarea name="description" >{{ old('description', $product->description) }}</textarea>
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
              <button class="delete-form__button--submit" type="submit">ゴミ箱マーク</button>
            </button>
          </form>
        
      </div>
    </div>
  </main>   
</body>
</html>