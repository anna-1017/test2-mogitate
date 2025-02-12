<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>

    <link rel="stylesheet" href="update.css">
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
        <img src="{{ $product->image_url }}"  alt="{{ $product->name }}" class="product-image">

        <div class="product-info">
          <div class="product-name">
            <div class="name-label">商品名</div>
            <input type="text" name="name">
          </div>
        
          <div class="product-price">
            <div class="price-label">値段</div>
            <input type="text" name="price">
          </div>
        
          <div class="season">
            <div class="season-label">季節</div>
            <div class="season-select">
                <input type="radio" name="season" value="spring">春
                <input type="radio" name="season" value="summer">夏
                <input type="radio" name="season" value="autumn">秋
                <input type="radio" name="season" value="winter">冬
            </div>
          </div>
        </div>
      </div>

      <div class="product-form">
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="file" id="" name="image">
        </form>

        <div class="product-discription">
          <div class="discription-label">商品説明</div>
          <textarea name="discription" id=""></textarea>
        </div>

        <div class="button-group">
          <button class="button-back">戻る</button>
          <button class="button-submit" type="submit">変更を保存</button>

          <form class="delete-form" action="/products/delete" method="POST">
            @method('DELETE')
            @csrf
            <div class="delete-form__button">
              <input type="hidden" name="id" value="{{ $product['id'] }}">
              <button class="delete-form__button--submit" type="submit">ゴミ箱マーク</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>   
</body>
</html>