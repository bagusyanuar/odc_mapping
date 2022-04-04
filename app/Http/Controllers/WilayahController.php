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
        return view('wilayah.index')->with([
            'data' => $data
        ]);
    }

    public function add_page()
    {
        return view('wilayah.add');
    }

    public function create() {
        try {
            $data = [
                'nama' => $this->postField('name')
            ];
            Wilayah::create($data);
            return redirect()->back()->with(['success' => 'Berhasil Menambahkan Data...']);
        }catch (\Exception $e) {
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan' . $e->getMessage()]);
        }
    }

    public function edit_page($id)
    {
        $data = Wilayah::findOrFail($id);
        return view('wilayah.edit')->with(['data' => $data]);
    }

    public function patch()
    {
        try {
            $id = $this->postField('id');
            $wilayah = Wilayah::find($id);

            $data = [
                'nama' => $this->postField('name')
            ];
            $wilayah->update($data);
            return redirect('/wilayah')->with(['success' => 'Berhasil Merubah Data...']);
        }catch (\Exception $e) {
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan' . $e->getMessage()]);
        }
    }
}
