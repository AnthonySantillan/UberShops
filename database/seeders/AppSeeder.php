<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Payment;
use App\Models\Role;
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
        Role::factory(10)
            ->has(Vehicle::factory()->count(3), 'driver')
            ->has(Driver::factory()->count(3), 'driver')
            ->has(User::factory()->count(3), 'user')
            ->has(Payment::factory()->count(3), 'user')
            ->has(Travel::factory()->count(3), 'travel')
            ->create();
    }
}
