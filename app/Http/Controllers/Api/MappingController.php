<?php


namespace App\Http\Controllers\Api;


use App\Helper\CustomController;
use App\Models\Odc;

class MappingController extends CustomController
{

    public function __construct()
    {
        parent::__construct();
    }

    private function haversine_formula($lat1, $long1, $lat2, $long2)
    {
        $earth_radius = 6371;
        $lat_from = deg2rad($lat1);
        $lat_to = deg2rad($lat2);
        $long_from = deg2rad($long1);
        $long_to = deg2rad($long2);
        $delta_lat = $lat_to - $lat_from;
        $delta_long = $long_to - $long_from;
        $angle = 2 * asin(sqrt(pow(sin($delta_lat), 2) + cos($lat_from) * cos($lat_to) * pow(sin($delta_long), 2)));
//        $a = sin($delta_lat / 2) * sin($delta_lat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($delta_long / 2) * sin($delta_long / 2);
//        $c = 2 * asin(sqrt($a));
        return $earth_radius * $angle;
    }


    public function get_haversine_data()
    {
        try {
            $data = Odc::all();
            $current_latitude = -7.558738272497111;
            $current_longitude = 110.85658736739866;

            $results = [];
            foreach ($data as $value) {
                $destination_latitude = $value->latitude;
                $destination_longitude = $value->longitude;
                $tmp['id'] = $value->id;
                $tmp['name'] = $value->nama;
                $tmp['distance'] = $this->haversine_formula($current_latitude, $current_longitude, $destination_latitude, $destination_longitude);
                array_push($results, $tmp);
            }

            usort($results, function ($a, $b){
                return $a['distance'] > $b['distance'];
            });
            return $this->jsonResponse('success', 200, $results);
        } catch (\Exception $e) {
            return $this->jsonResponse('failed ' . $e->getMessage(), 500);
        }
    }
}
