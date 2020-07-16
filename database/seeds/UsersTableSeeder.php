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
                'username' => 'igun997',
                'password' => 'igun997',
                'alamat' => 'asasasas',
                'email' => 'gudang@wenow.id',
                'no_hp' => '09876567',
                'no_rekening' => 'BCA 0878765678',
                'level' => 0,
                'status' => 1,
                'created_at' => '2020-07-14',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'donatur',
                'username' => 'igun',
                'password' => 'igun',
                'alamat' => 'igunigunigunigunigun',
                'email' => 'donatur@gmail.com',
                'no_hp' => '081214267695',
                'no_rekening' => 'BCA 0878765677',
                'level' => 1,
                'status' => 1,
                'created_at' => '2020-07-15',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'bendahara',
                'username' => 'bendahara',
                'password' => 'bendahara',
                'alamat' => 'bendaharabendaharabendaharabendahara',
                'email' => 'bendahara@rumaisa.com',
                'no_hp' => '765678998765',
                'no_rekening' => 'BCA 76456789',
                'level' => 2,
                'status' => 1,
                'created_at' => '2020-07-15',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'dicky rizki p',
                'username' => 'dicky',
                'password' => '123456',
                'alamat' => 'jl sekeloa utara',
                'email' => 'dickyrp29@gmail.com',
                'no_hp' => '083822608529',
                'no_rekening' => 'BNI 0455667523',
                'level' => 0,
                'status' => 1,
                'created_at' => '2020-07-15',
            ),
        ));
        
        
    }
}