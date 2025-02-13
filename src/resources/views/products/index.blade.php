<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
  <header class="header">mogitate</header>
  <main class="content">
    <div class="sidebar">
      <div class="sidebar-item">商品一覧</div>
      <div class="search-box" >
        <input type="text" placeholder="商品名で検索">
        <button class="search-button">検索</button>
      </div>
      <div class="sort-box">
        <label for="sort">価格順で表示</label>
        <select class="sort-dropdown" id="sort">
          <option value=""></option>
          <option value=""></option>
        </select>
      </div>
    </div>


    <div class="product-container">
      <button class="add-product">＋商品を追加</button>
      
      <div class="product-list">
        @foreach ($products as $product)
        <div class="product">
          <a href="{{ route('products.show', $product->id) }}">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
          </a>
            <div class="product-infomation">
              <span class="product-name">{{ $product->name }}</span>
              <span class="product-price">￥{{ number_format($product->price) }}</span>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>   
  </main>
</body>
</html>