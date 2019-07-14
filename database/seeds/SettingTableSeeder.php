<?php

use Illuminate\Database\Seeder;
use App\Setting;


class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $setting=[
              
                   'icon' => 'logoo.png',
                   'cover' => 'backround2.png',
                    'title' => 'AppRoot',
                   'desc' => 'desc',
                   'logo' => 'desc.png',

                   
                   
                   

               
          ];

        Setting::create($setting);
       
    }
}
