<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {

        $data = Employee::all();
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai() {
        return view('tambahdata');
    }

    public function insertdata(Request $request) {
        Employee::create($request->all());
        return redirect()->route('pegawai')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    public function tampilkandata($id) {
        
        $data = Employee::find($id);
        
        return view('editdata', compact('data'));
    }

    public function updatedata(Request $request, $id) {

        // $data = Employee::find($id);
        // $data->update($request->all());

        Employee::find($id)->update($request->all());

        return redirect()->route('pegawai')->with('sukses', 'Data Berhasil Diubah');
    }

    public function delete($id) {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('sukses', 'Data Berhasil Dihapus');
    }
}
