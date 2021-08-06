<?php

namespace Database\Seeders;

use App\Models\Client;
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

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::factory(10)
            ->has(User::factory()->count(3), 'users')
            ->has(Role::factory()->count(3), 'roles')
            ->create();
        Driver::factory(10)
            ->has(User::factory()->count(3), 'users')
            ->has(Role::factory()->count(3), 'roles')
            ->has(Vehicle::factory()->count(3), 'vehicle')
            ->create();
        Client::factory(10)
            ->has(User::factory()->count(3), 'users')
            ->has(Role::factory()->count(3), 'roles')
            ->create();
        Shop::factory(10)
            ->has(Seller::factory()->count(3), 'sellers')
            ->has(Product::factory()->count(3), 'products')
            ->create();
        Travel::factory(10)
            ->has(Driver::factory()->count(3), 'drivers')
            ->has(Shop::factory()->count(3), 'shops')
            ->has(Payment::factory()->count(3), 'payment')
            ->create();
    }
}
