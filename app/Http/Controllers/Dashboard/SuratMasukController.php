<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Status;
use App\Surat;
use App\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = SuratMasuk::leftJoin('surat', 'surat.id', 'surat_masuk.id_surat')
            ->leftJoin('status', 'status.id', 'surat_masuk.id_status')
            ->select('surat.asal', 'surat.tujuan', 'surat.perihal', 'surat.tipe', 'status.title_status',  'surat_masuk.*')
            ->orderBy('surat.id', 'DESC');
        if (Auth::user()->role_id == 3) {
            $query = $query->where('surat_masuk.id_status', 1);
            $query = $query->orWhere('surat_masuk.id_status', 3);
            $query = $query->orWhere('surat_masuk.id_status', 4);
        } else if(Auth::user()->role_id == 4) {
            $query = $query->where('surat_masuk.id_status', 5);
            $query = $query->orWhere('surat_masuk.id_status', 6);
        }
        
          
        $data =  $query->get();

        return view('dashboard.suratMasuk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::where('jenis', 'id')->get();
        return view('dashboard.suratMasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try {
            $request->validate([
                'perihal' => 'required',
                'asal' => 'required',
                'tujuan' => 'required',
                'nomor_surat' => 'required',
                'tipe' => 'required',
            ]);
            $name = str_replace(" ", "_", $request->file_surat->getClientOriginalName());
            $inputSurat['file_surat'] = Storage::putFileAs('fileSurat', $request->file('file_surat'), $name);
            $inputSurat['nomor_surat'] = $request->nomor_surat;
            $inputSurat['perihal'] = $request->perihal;
            $inputSurat['asal'] = $request->asal;
            $inputSurat['tujuan'] = $request->tujuan;
            $inputSurat['tipe'] = $request->tipe;

            $surat = Surat::create($inputSurat);

            SuratMasuk::create([
                'id_surat' => $surat->id,
                'id_status' => 1, // Diteruskan ke kadis
            ]);

            return redirect('dashboard/surat/suratMasuk')->with('status', 'Berhasil menambahkan surat masuk');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = SuratMasuk::where('id', $id)->first();
        // return $surat;
        if ($surat->id_status == 1 && Auth::user()->role_id == 3) {
            SuratMasuk::where('id', $id)->update(['id_status' => 3]);
            
        }
        $data = SuratMasuk::leftJoin('surat', 'surat.id', 'surat_masuk.id_surat')
            ->leftJoin('status', 'status.id', 'surat_masuk.id_status')
            ->select('surat.asal', 'surat.tujuan', 'surat.perihal', 'surat.file_surat', 'surat.nomor_surat', 'surat.tipe', 'status.title_status', 'surat_masuk.*')
            ->where('surat_masuk.id', $id)
            ->first();
        
        return view('dashboard.suratMasuk.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $update = [];
            if ($request->tipe == '1') { 
                $update['id_status'] = 4;//acc kadis
            } else if ($request->tipe == '2') { 
                $update['id_status'] = 5;// diteruskan ke bagian dokumen
            } else if ($request->tipe == '3') { 
                $update['id_status'] = 6; // diteruskan ke tujuan
            }
            $update['updated_at'] = Carbon::now();
            
            SuratMasuk::where('id', $id)->update($update);
            return redirect('dashboard/surat/suratMasuk/'.$id)->with('status', 'Berhasil memverifikasi surat masuk');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
