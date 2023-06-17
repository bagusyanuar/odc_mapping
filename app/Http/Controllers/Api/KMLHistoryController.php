<?php


namespace App\Http\Controllers\Api;


use App\Helper\CustomController;
use App\Models\Odc;

class KMLHistoryController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id)
    {
        try {
//            $odc_id = $this->request->query->get('id');
            $odc = Odc::with(['kml_history'])->where('id', '=', $id)->first();
            if (!$odc) {
                return $this->jsonResponse('odc tidak ditemukan...', 202);
            }

            $histories = $odc->kml_history;
            if (count($histories) > 0) {
                return $this->jsonResponse('success', 200, [
                    'count' => count($histories),
                    'data' => $histories[0]
                ]);
            }
            return $this->jsonResponse('success', 200, [
                'count' => count($histories),
                'data' => null
            ]);
        }catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server..', 500);
        }
    }
}
