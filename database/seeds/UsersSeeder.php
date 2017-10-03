<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        $user = User::firstOrNew([
            'name' => 'LGM',
        ]);

        $user->name     = 'LGM';
        $user->email    = '531299585@qq.com';
        $user->password = bcrypt('li940809');
        $user->is_admin = true;
        $user->save();

        $user_name=User::irstOrNew([
            'name' => '聪哥女装最棒',
        ]);
        $user_name->name='我是你隔壁老王啊';
        $user_name->save();
    }
}
