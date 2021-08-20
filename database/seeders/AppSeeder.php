<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Detail;
use App\Models\Driver;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Role;
use App\Models\Seller;
use App\Models\Shop;
use App\Models\Travel;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //primero las que dependen luego las que no 
        Role::factory(10)->create();
        User::factory(10)->create();
        Vehicle::factory(10)->create();
        Product::factory(10)->create();
        Payment::factory(10)->create();
        Client::factory(10)->create();
        Seller::factory(10)->create();
        Driver::factory(10)->create();
        Shop::factory(10)->create();
        Detail::factory(10)->create();
        Travel::factory(10)->create();
    }
}
