<?php

use Illuminate\Database\Seeder;
use App\Message;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Message::truncate();

      Message::create([
        'nombre' => 'alex',
        'email' => 'alex@gmail.com',
        'mensaje' => 'alex was here',

      ]);
    }
}
