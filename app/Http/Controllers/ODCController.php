<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Odc;
use App\Models\Wilayah;

class ODCController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = Odc::with('wilayah')->get();
        return view('odc.index')->with(['data' => $data]);
    }

    public function add_page()
    {
        $wilayah = Wilayah::all();
        return view('odc.add')->with([
            'wilayah' => $wilayah
        ]);
    }

    public function create()
    {
        try {
            $data = [
                'nama' => $this->postField('name'),
                'wilayah_id' => $this->postField('wilayah'),
                'latitude' => $this->postField('latitude'),
                'longitude' => $this->postField('longitude'),
                'deskripsi' => $this->postField('deskripsi'),
            ];
            ODC::create($data);
            return redirect()->back()->with(['success' => 'Berhasil Menambahkan Data...']);
        }catch (\Exception $e) {
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan' . $e->getMessage()]);
        }
    }

    public function edit_page($id)
    {

        $wilayah = Wilayah::all();
        $data = Odc::findOrFail($id);
        return view('odc.edit')->with(['data' => $data, 'wilayah' => $wilayah]);
    }

    public function patch()
    {
        try {
            $id = $this->postField('id');
            $odc = Odc::find($id);

            $data = [
                'nama' => $this->postField('name'),
                'wilayah_id' => $this->postField('wilayah'),
                'latitude' => $this->postField('latitude'),
                'longitude' => $this->postField('longitude'),
                'deskripsi' => $this->postField('deskripsi'),
            ];
            $odc->update($data);
            return redirect('/odc')->with(['success' => 'Berhasil Merubah Data...']);
        }catch (\Exception $e) {
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan' . $e->getMessage()]);
        }
    }
}
