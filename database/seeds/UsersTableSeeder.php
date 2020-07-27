<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Indra',
                'username' => 'donatur',
                'password' => 'donatur',
                'alamat' => '',
                'email' => 'donatur@rumaisa.com',
                'no_hp' => '09876567',
                'level' => 0,
                'status' => 1,
                'created_at' => '2020-07-14',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Sekretaris',
                'username' => 'sekretaris',
                'password' => 'sekretaris',
                'alamat' => ' ',
                'email' => 'sekretaris@rumaisa.com',
                'no_hp' => '081214267695',
                'level' => 1,
                'status' => 1,
                'created_at' => '2020-07-15',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Bendahara',
                'username' => 'bendahara',
                'password' => 'bendahara',
                'alamat' => '',
                'email' => 'bendahara@rumaisa.com',
                'no_hp' => '765678998765',
                'level' => 2,
                'status' => 1,
                'created_at' => '2020-07-15',
            ),
            3 => 
            array (
                'id' => 7,
                'nama' => 'Ketua',
                'username' => 'ketua',
                'password' => 'ketua',
                'alamat' => '',
                'email' => 'atasan@rumaisa.com',
                'no_hp' => '98556789',
                'level' => 3,
                'status' => 1,
                'created_at' => '2020-07-21',
            ),
            4 => 
            array (
                'id' => 8,
                'nama' => 'Bid. Pelayanan',
                'username' => 'pelayanan',
                'password' => 'pelayanan',
                'alamat' => '',
                'email' => 'pelayanan@rumaisa.com',
                'no_hp' => '98556789',
                'level' => 4,
                'status' => 1,
                'created_at' => '2020-07-21',
            ),
            5 => 
            array (
                'id' => 9,
                'nama' => 'Bid. Pengabdian Maysrakat',
                'username' => 'pengabdian',
                'password' => 'pengabdian',
                'alamat' => '',
                'email' => 'pengabdian@rumaisa.com',
                'no_hp' => '67890076',
                'level' => 5,
                'status' => 1,
                'created_at' => '2020-07-21',
            ),
        ));
        
        
    }
}