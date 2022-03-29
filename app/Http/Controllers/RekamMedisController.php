<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    //
    public function input()
    {
        return view('rekam-medis');
    }

    public function process(Request $request)
    {
        // Alert::success('Submit Berhasil!', 'Terima kasih sudah mengisi form Penduduk!');
        $messagesError = [
            'required' => ':attribute ini wajib diisi!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
        ];
        $this->validate($request,[
            // 'nama' => ['required', 'min:2', 'max:20'],
            'doctor' => ['required'],
            'kondisi-kesehatan' => ['required', 'min:16'],
            'suhu' => ['required', 'min:2'],
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png'],
       ]);
       $img_link = $this->saveImage( $request , 1);
       $request->ktp = $img_link;
       return view('process-screening',['data' => $request]);
    }

    public function saveImage(Request $request, $id)
    {
        $img = $request->ktp; 
        $img_name = ''; 
        if ($img !== NULL) {
            $img_name = 'ktp'. $id . "." . $img->extension();
            $img_name = str_replace(' ', '-', strtolower($img_name)); 
            $img->storeAs(null, $img_name, ['disk' => 'public']); 
        }
        return asset('storage') . '/' . $img_name; 
    }
}
