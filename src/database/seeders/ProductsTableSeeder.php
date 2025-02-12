<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Season;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param =[
            [    
                'name' => 'キウイ',
                'price' => 800,
                'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです。ビタミンCなどの栄養素も豊富のため、美肌効果や疲労回復効果も期待できます。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'products/fruits-img/kiwi.png',
            ],
            [
                'name' => 'ストロベリー',
                'price' => 1200,
                'description' => '大人から子供まで大人気のストロベリー。当店では鮮度抜群の完熟いちごを使用しています。ビタミンCはもちろん食物繊維も豊富なため、腸内環境の改善も期待できます。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'products/fruits-img/strawberry.png',
            ],
            [
                'name' => 'オレンジ',
                'price' => 850,
                'description' => '当店では酸味と甘みのバランスが抜群のネーブルオレンジを使用しています。酸味は控えめで、甘さと濃厚な果汁が魅力の商品です。もぎたてフルーツのスムージをお召し上がりください！',
                'image' => 'products/fruits-img/orange.png',
            ],
            [
                'name' => 'スイカ',
                'price' => 700,
                'description' => '甘くてシャリシャリ食感が魅力のスイカ。全体の90％が水分のため、暑い日の水分補給や熱中症予防、カロリーが気になる方にもおすすめの商品です。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'products/fruits-img/watermelon.png',
            ],
            [
                'name' => 'ピーチ',
                'price' => 1000,
                'description' => '豊潤な香りととろけるような甘さが魅力のピーチ。美味しさはもちろん見た目の可愛さも抜群の商品です。ビタミンEが豊富なため、生活習慣病の予防にもおすすめです。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'products/fruits-img/peach.png',
            ],
            [
                'name' => 'シャインマスカット',
                'price' => 1400,
                'description' => '爽やかな香りと上品な甘みが特長的なシャインマスカットは大人から子どもまで大人気のフルーツです。疲れた脳や体のエネルギー補給にも最適の商品です。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'products/fruits-img/muscat.png',
            ],
            [
                'name' => 'パイナップル',
                'price' => 800,
                'description' => '甘酸っぱさとトロピカルな香りが特徴のパイナップル。当店では甘さと酸味のバランスが絶妙な国産のパイナップルを使用しています。もぎたてフルーツのスムージをお召し上がりください！',
                'image' => 'products/fruits-img/pineapple.png',
            ],
            [
                'name' => 'ブドウ',
                'price' => 1100,
                'description' => 'ブドウの中でも人気の高い国産の「巨峰」を使用しています。高い糖度と適度な酸味が魅力で、鮮やかなパープルで見た目も可愛い商品です。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'products/fruits-img/grapes.png',
            ],
            [
                'name' => 'バナナ',
                'price' => 600,
                'description' => '低カロリーでありながら栄養満点のため、ダイエット中の方にもおすすめの商品です。1杯でバナナの濃厚な甘みを存分に堪能できます。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'products/fruits-img/banana.png',
            ],
            [
                'name' => 'メロン',
                'price' => 900,
                'description' => '香りがよくジューシーで品のある甘さが人気のメロンスムージー。カリウムが多く含まれているためむくみ解消効果も抜群です。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'products/fruits-img/melon.png',
            ],
        ];

        DB::table('products')->insert($param);

        $kiwi = Product::where('name', 'キウイ')->first();
        $strawberry = Product::where('name', 'ストロベリー')->first();
        $orange = Product::where('name', 'オレンジ')->first();
        $watermelon =Product::where('name', 'スイカ')->first();
        $peach = Product::where('name', 'ピーチ')->first();
        $muscat = Product::where('name', 'シャインマスカット')->first();
        $pineapple = Product::where('name', 'パイナップル')->first();
        $grapes = Product::where('name', 'ブドウ')->first();
        $banana = Product::where('name', 'バナナ')->first();
        $melon = Product::where('name', 'メロン')->first();

        $spring = Season::where('name', '春')->first();
        $summer = Season::where('name', '夏')->first();
        $autumn = Season::where('name', '秋')->first();
        $winter = Season::where('name', '冬')->first();

        $kiwi->seasons()->attach([$autumn->id, $winter->id]);
        $strawberry->seasons()->attach([$spring->id]);
        $orange->seasons()->attach([$winter->id]);
        $watermelon->seasons()->attach([$summer->id]);
        $peach->seasons()->attach([$summer->id]);
        $muscat->seasons()->attach([$summer->id, $autumn->id]);
        $pineapple->seasons()->attach([$spring->id, $summer->id]);
        $grapes->seasons()->attach([$summer->id, $autumn->id]);
        $banana->seasons()->attach([$summer->id]);
        $melon->seasons()->attach([$spring->id, $summer->id]);
    }
}
