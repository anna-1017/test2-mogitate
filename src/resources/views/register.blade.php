<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>

    <link rel="stylesheet" href="register.css">
</head>
<body>
  <header class="header">mogitate</header>

<main class="register-content">
  <div class="register-content__header">
    <h2>商品登録</h2>
  </div>

  <form class="register-form" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="product-name">商品名 <span class="required">必須</span></label>
      <input type="text" id="product-name"  name="product-name" placeholder="商品名を入力">
    </div>

    <div class="form-group">
      <label for="product-price">値段
      <span class="required">必須</span></label>
      <input type="number" id="product-price" name="product-price" placeholder="値段を入力">
    </div>

    <div class="form-group">
      <label class="product-image">商品画像<span class="required">必須</span></label>
      <input type="file" id="product-image" name="image">
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
    </div>

    <div class="form-group">
      <label for="product-discription">商品説明<span class="required">必須</span></label>
      <textarea id="product-discription"name="discription" placeholder="商品の説明を入力"></textarea>
    </div>      
    
    <div class="form__button-group">
      <button class="button-back" type="button">戻る</button>
      <button class="button-register" type="submit">登録</button>
    </div>
  </form>
</main>