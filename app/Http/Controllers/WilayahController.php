<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Wilayah;

class WilayahController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $data = Wilayah::all();
        return view('admin.wilayah.index')->with([
            'data' => $data
        ]);
    }

    public function create() {
        try {
            $data = [
                'nama' => $this->postField('nama')
            ];
            Wilayah::create($data);
            return redirect('/wilayah')->with(['success' => 'Berhasil Menambahkan Data...']);
        }catch (\Exception $e) {
            return redirect('/wilayah')->with(['failed' => 'Terjadi Kesalahan' . $e->getMessage()]);
        }
    }

    public function patch() {

    }
}
