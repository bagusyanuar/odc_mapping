<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\KMLHistory;
use App\Models\Odc;

class KMLHistoryController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = KMLHistory::with(['odc.wilayah', 'author'])->orderBy('created_at', 'DESC')->get();
        return view('kml-history.index')->with(['data' => $data]);
    }

    public function add_page()
    {
        $odc = Odc::all();
        return view('kml-history.add')->with(['odc' => $odc]);
    }

    public function create()
    {
        try {
            $data = [
                'odc_id' => $this->postField('odc'),
                'user_id' => auth()->id()
            ];
            $nama_file = $this->generateImageName('file');

            if ($nama_file !== '') {
                $data['url'] = '/assets/kml/' . $nama_file;
                $data['file_name'] =  $nama_file;
                $this->uploadImage('file', $nama_file, 'kml');
            }
            KMLHistory::create($data);
            return redirect()->back()->with(['success' => 'Berhasil Menambahkan Data...']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan' . $e->getMessage()]);
        }
    }

    public function destroy()
    {
        try {
            $id = $this->postField('id');
            KMLHistory::destroy($id);
            return $this->jsonResponse('success', 200);
        }catch (\Exception $e) {
            return $this->jsonResponse('failed', 500);
        }
    }
}
