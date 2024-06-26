<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Controller Index
     * Menampilkan seluruh daftar surat yang ada d table jenis_surat
     * 
     */
    public function index()
    {
        $data = [
            'jenis_surat' => JenisSurat::all()
        ];
        return view('jenissurat.index', $data);
    }

    /**
     * Controller Form Tambah Jenis Surat
     */
    public function formTambah()
    {
        return view('jenissurat.tambah');
    }

    public function simpan(Request $request){
        $data = $request->validate([
            'jenis_surat' => ['required']
        ]);

        // Periksa apakah ada id_jenis_surat pada form yang dikirim

        if (isset($request->id_jenis_surat)) :
            // Update jika id_jenis_surat ditemukan
            $update = JenisSurat::where('id_jenis_surat', '=', $request->id_jenis_surat)->update($data);
            if ($update) {
                return redirect()->route('jenissurat.index');
            } else {
                return redirect()->route('jenissurat.tambah');
            }
        else :

            // Tambah data baru jenis_surat
            $insert = JenisSurat::create($data);
            if ($insert) {
                return redirect()->route('jenissurat.index');
            } else {
                return redirect()->route('jenissurat.tambah');
            }
        endif;
    }

    public function formEdit(Request $request)
    {
        //Query ke database berdasarkan $request->id
        $data = [
            'jnsSurat' => JenisSurat::where('id_jenis_surat', $request->id)->first()
        ];

        return view('jenissurat.edit', $data);
    }
    public function hapus(Request $request, Response $response){
        //id_jenis_surat
        //check apakah data dengan id yang dimaksud ada pada database?
        $check = JenisSurat::where('id_jenis_surat',$request->id_jenis_surat)->get();

        if($check->count() > 0):
            //lakukan proses hapus
            $hapus = JenisSurat::where('id_jenis_surat',$request->id_jenis_surat)->delete();
            //periksa apakah proses hapus berhasil?
            if($hapus):
                //proses hapus berhasil
            $pesan = [
                'status' => true,
                'pesan'  => "Data berhasil dihapus"
            ];
        else:
            //proses hapus gagal
            $pesan = [
                'status' => false,
                'pesan'  => 'Data gagal dihapus'
            ];

        endif;
    else:
        $pesan = [
            'status' => false,
            'pesan'  => 'Data yang akan dihapus tidak tersedia'
        ];
    endif;
    return response()->json($pesan);
    }
}