<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Customer::create([
            'name' => 'Anugrah Sandi',
            'address' => 'Bandung',
            'phone' => '0384394839',
            'email' => 'anugrah@slymanmedia.com'
        ]);

        Customer::create([
            'name' => 'Anugrah Sandi Jaya',
            'address' => 'Bandung',
            'phone' => '0384394839',
            'email' => 'anugrah1@slymanmedia.com'
        ]);

        Customer::create([
            'name' => 'Anugrah Sandi Abadi',
            'address' => 'Bandung',
            'phone' => '0384394839',
            'email' => 'anugrah2@slymanmedia.com'
        ]);
    }
}
