<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('setting')->delete();
        
        \DB::table('setting')->insert(array (
            0 => 
            array (
                'id' => 1,
                'set_key' => 'rekening',
                'set_value' => '0063278777100<br/>Bank BJB<br/>an. Rumaisa Center',
                'created_at' => '2020-07-14',
            ),
            1 => 
            array (
                'id' => 2,
                'set_key' => 'visi',
                'set_value' => '<p>Menjadi Lembaga kepeloporan yang professional dalam pengembangan dan pendayagunaan potensi masyarakat untuk mewujudkan generasi terdidik, generasi sehat, serta generasi berdaya dan berbudaya.</p>',
                'created_at' => '2020-07-27',
            ),
            2 => 
            array (
                'id' => 3,
                'set_key' => 'misi',
                'set_value' => '<p>1. Menjadi fasilitator dalam pengembangan dan pemberdayaan potensi masyarakat, dengan memberikan pelayanan, pembinaan dan membuka ruang kreatif untuk membangun masyarakat berpribadi mandiri, berbudaya dan berdayaguna.</p>

<p>2. Mengambangkan edukasi dan riset terhadap segenap potensi masyarakat di bidang kesehatan dan ketahanan keluarga.</p>

<p>3. Menjalin kemitraan yang harmonis dengan berbagai komponen masyarakat, pemerintah, swasta, maupun lembaga kemasyarakatan lainnya dalam pemberdayaan masyarakat.</p>',
                'created_at' => '2020-07-27',
            ),
        ));
        
        
    }
}