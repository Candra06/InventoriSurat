<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Status;
use App\Surat;
use App\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $query = SuratKeluar::leftJoin('surat', 'surat.id', 'surat_keluar.id_surat')
        ->leftJoin('status', 'status.id', 'surat_keluar.id_status')
        ->select('surat.asal', 'surat.tujuan', 'surat.perihal', 'surat.tipe', 'status.title_status',  'surat_keluar.*')
        ->orderBy('surat.id', 'DESC');
        $where = 0;
        if (Auth::user()->role_id == 3) {
            $query = $query->where('surat_keluar.id_status', 7);
        } else  if (Auth::user()->role_id == 4) {
            $query = $query->where('surat_keluar.id_status', 7);
            $query = $query->orWhere('surat_keluar.id_status', 8);
            $query = $query->orWhere('surat_keluar.id_status', 9);
        }
        
        $data = $query->get();
        // return $data;
        return view('dashboard.suratKeluar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dashboard.suratKeluar.create');
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

            SuratKeluar::create([
                'id_surat' => $surat->id,
                'id_status' => 7, // Dikirim oleh kadis
            ]);

            return redirect('dashboard/surat/suratKeluar')->with('status', 'Berhasil menambahkan surat keluar');
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
        $surat = SuratKeluar::where('id', $id)->first();
       
        $data = SuratKeluar::leftJoin('surat', 'surat.id', 'surat_keluar.id_surat')
            ->leftJoin('status', 'status.id', 'surat_keluar.id_status')
            ->select('surat.asal', 'surat.tujuan', 'surat.perihal', 'surat.file_surat', 'surat.nomor_surat', 'surat.tipe', 'status.title_status', 'surat_keluar.*')
            ->where('surat_keluar.id', $id)
            ->first();
        //    return $data;
        return view('dashboard.suratKeluar.detail', compact('data'));
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
                $update['id_status'] = 9;//Diteruskan ke tujuan
            } 
            $update['updated_at'] = Carbon::now();
            
            SuratKeluar::where('id', $id)->update($update);
            return redirect('dashboard/surat/suratKeluar/')->with('status', 'Berhasil mengubah surat keluar');
        } catch (\Throwable $th) {
            return redirect('dashboard/surat/suratKeluar/'.$id)->with('status', 'Gagal mengubah surat keluar');
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
