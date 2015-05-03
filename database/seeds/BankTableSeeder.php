<?php

use Illuminate\Database\Seeder;
use App\Bank;

class BankTableSeeder extends Seeder {

  public function run()
  {
    DB::table('banks')->delete();

    
      Bank::create([
        'name'   => '台灣銀行',
        'address'    => '銘傳大學S棟一樓',
        'code'    => 'BANKCODE0001',
        'tel' => '02-88888888',
      ]);
      Bank::create([
        'name'   => '台北富邦',
        'address'    => '銘傳大學第三餐廳',
        'code'    => 'BANKCODE0002',
        'tel' => '02-99999999999',
      ]);
    
  }

}