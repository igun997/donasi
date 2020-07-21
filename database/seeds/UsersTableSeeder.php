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
                'alamat' => 'bendaharabendaharabendaharabendahara',
                'email' => 'bendahara@rumaisa.com',
                'no_hp' => '765678998765',
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
                'level' => 0,
                'status' => 1,
                'created_at' => '2020-07-15',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'tset',
                'username' => 'sasa',
                'password' => 'sasa',
                'alamat' => 'sasasasasasa',
                'email' => 'test@s.com',
                'no_hp' => 'assa',
                'level' => 0,
                'status' => 1,
                'created_at' => '2020-07-21',
            ),
        ));
        
        
    }
}