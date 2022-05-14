<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ODCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('odc')->insert(
            [
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FA',
                    'deskripsi' => 'Jalan Ronggowarsito No.85 Keprabon, Banjarsari',
                    'latitude' => -7.5684,
                    'longitude' => 110.8236,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FB',
                    'deskripsi' => 'Jalan Sugiyopranoto , Kampung Baru, Pasar Kliwon',
                    'latitude' => -7.5678,
                    'longitude' => 110.8272,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FC',
                    'deskripsi' => 'Jalan Sidikoro, Baluwarti, Pasar Kliwon ( di dalam kraton solo )',
                    'latitude' => -7.579,
                    'longitude' => 110.8279,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FD',
                    'deskripsi' => 'Jalan Arief Rahman Hakim , Tegalharjo, Jebres',
                    'latitude' => -7.5619,
                    'longitude' => 110.8348,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FE',
                    'deskripsi' => 'Jalan Kapten Mulyadi No.11 ,  Sudiroprajan, Jebres',
                    'latitude' => -7.5672,
                    'longitude' => 110.8338,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FF',
                    'deskripsi' => 'Jalan Prameswari II No.19, Kedung Lumbu , Pasar Kliwon',
                    'latitude' => -7.5745,
                    'longitude' => 110.8314,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FG',
                    'deskripsi' => 'Jalan Veteran No.89 , Joyosuran, Pasar Kliwon',
                    'latitude' => -7.5836,
                    'longitude' => 110.826,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FJ',
                    'deskripsi' => 'Jalan Yos Sudarso No.242 , Kratonan, Serengan',
                    'latitude' => -7.5794,
                    'longitude' => 110.8214,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FK',
                    'deskripsi' => 'Jalan Gatot Subroto No.124 , Jayengan, Serengan',
                    'latitude' => -7.5744,
                    'longitude' => 110.8206,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'wilayah_id' => '2',
                    'nama' => 'ODC-GLD-FH',
                    'deskripsi' => 'Jalan Kapten Patimura , Danukusuman, Serengan',
                    'latitude' => -7.5878,
                    'longitude' => 110.8184,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
