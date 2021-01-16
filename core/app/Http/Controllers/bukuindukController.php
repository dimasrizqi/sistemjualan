<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class bukuindukController extends Controller
{
    public function index(){
        $data_pelanggan = DB::table('data_pelanggan')->get();
        $collections = DB::table('buku_induk')->orderBy('id','DESC')->get();
        return view('lab_kimia.bukuinduk.index',[
            'collections' => $collections,
            'data_pelanggan' => $data_pelanggan]);
    }

    public function create(){
        $parameter_uji = DB::table('parameter_uji')->OrderBy('name','ASC')->get();
        $usernya = DB::table('users')->OrderBy('name','ASC')->get();
        $pelanggan = DB::table('data_pelanggan')->OrderBy('name','ASC')->get();
        
        return view('lab_kimia.bukuinduk.tambah',['parameter_uji'=>$parameter_uji,
        'usernya'=>$usernya,
        'pelanggan'=>$pelanggan]);
       
   }
   public function store(Request $request){
    $collections = DB::table('buku_induk')->max('id')+1;
    $volume_berat = $request->volume. " " . $request->berat;
    // no urut (angka)/jenis sampel/bulan/tahun
    $get_bulan = Carbon::now()->locale('id')->isoFormat('MM');
    $get_tahun = Carbon::now()->locale('id')->isoFormat('Y');
    $no_sampel = $collections."/".$request->jenis."/".$get_bulan."/".$get_tahun;
   
    $no_fpps = $collections."/fpps"."/".$get_bulan."/".$get_tahun;
    $parameter_uji = $request->parameter_uji;
    if (empty($parameter_uji)) {
        return Redirect()->route('bukuinduk.create') -> with('failed','pilih minimal 1 parameter uji');
    }

    for($count = 0; $count < count($parameter_uji); $count++){
    $data = array(
        'parameter_uji' => $parameter_uji[$count],
        'no_fpps'=> $no_fpps
    );
    $insert_data_pu[] = $data; 
    }
    
    
    $data_insert[] = array(
        'pelanggan' => $request->pelanggan,
        'di_serahkan' => $request->di_serahkan,
        'petugas_pelayanan' => $request->petugas_pelayanan,
        'petugas_sampling' => $request->petugas_sampling,
        'lokasi' => $request->lokasi,
        'jenis' => $request->jenis,
        'wadah' => $request->wadah,
        'volume_berat' => $volume_berat,
        'no_sampel' => $no_sampel,
        'jml_sampel' => $request->jml_sampel,
        'tgl_sampling' => $request->tgl_sampling,
        'no_fpps' => $no_fpps,
        'spp' => $request->spp
    );
   

    // dd($data_insert);
        DB::table('buku_induk')->insert( $data_insert);
        DB::table('pilih_p_u')->insert($insert_data_pu);
        return Redirect()->route('bukuinduk.index') -> with('success','berhasil menambah data');
    }
    public function update(Request $request,  $id)
    {
        $volume_berat = $request->volume. " " . $request->berat;
        $data_insert[] = array(
            'pelanggan' => $request->pelanggan,
            'di_serahkan' => $request->di_serahkan,
            'petugas_pelayanan' => $request->petugas_pelayanan,
            'petugas_sampling' => $request->petugas_sampling,
            'lokasi' => $request->lokasi,
            'jenis' => $request->jenis,
            'wadah' => $request->wadah,
            'volume_berat' => $volume_berat,
            'no_sampel' => $request->no_sampel,
            'jml_sampel' => $request->jml_sampel,
            'tgl_sampling' => $request->tgl_sampling,
            'no_fpps' => $request->no_fpps,
            'spp' => $request->spp
        );
        DB::table('buku_induk')
              ->where('id', $id)
              ->update(['pelanggan' => $request->pelanggan,
              'di_serahkan' => $request->di_serahkan,
              'petugas_pelayanan' => $request->petugas_pelayanan,
              'petugas_sampling' => $request->petugas_sampling,
              'lokasi' => $request->lokasi,
              'jenis' => $request->jenis,
              'wadah' => $request->wadah,
              'volume_berat' => $volume_berat,
              'no_sampel' => $request->no_sampel,
              'jml_sampel' => $request->jml_sampel,
              'tgl_sampling' => $request->tgl_sampling,
              'no_fpps' => $request->no_fpps,
              'spp' => $request->spp]);

        return redirect()->route('bukuinduk.index')
                        ->with('success','Data berhasil di update');
    }

    
    public function edit($id)
    {
        $usernya = DB::table('users')->OrderBy('name','ASC')->get();
        $data_pelanggan = DB::table('data_pelanggan')->get();
        $buku_induk = DB::table('buku_induk')->where('id',$id)->orderBy('no_fpps','desc')->get();
        $no_fpps = $buku_induk[0]->no_fpps; 
        $parameter_uji = DB::table('parameter_uji')->get();
        $pu_fpps = DB::table('pilih_p_u')->where('no_fpps',$no_fpps)->get();
        foreach ($pu_fpps as $item_pu){
            $ppu []= $item_pu->parameter_uji;
        }
        // dd($pu_fpps);
        $ppu_implode = implode(',',$ppu);
        $ppu_explode = explode(",",$ppu_implode);
        //  dd(explode(",",$ppu_implode));
        return view('lab_kimia.bukuinduk.edit',[
            'buku_induk' => $buku_induk,
            'ppu_explode' => $ppu_explode,
            'ppu_implode' => $ppu_implode,
            'usernya' => $usernya,
            'data_pelanggan' => $data_pelanggan,
            'parameter_uji' => $parameter_uji]);
        
    }
    public function destroy($id)

    {
        // dd($id);
        
        DB::table('buku_induk')->where('id','=', $id)->delete();
        
        return redirect()->route('bukuinduk.index') -> with('deleted','berhasil menghapus');
    }
    public function print(Request $request )
    {
        $buku_induk = DB::table('buku_induk')->where('id',$request->id)->get();
        $data_pelanggan = DB::table('data_pelanggan')->get();
        $no_fpps = $buku_induk[0]->no_fpps;
        //Download as pdf
        $pdf = \PDF::setOptions(['isRemoteEnabled' => true])
            ->loadView('lab_kimia.print.fpps',
            [
                'buku_induk'=>$buku_induk
            ])
            ->setPaper('a4', 'potrait');
        return $pdf->stream($no_fpps.".pdf");
      
    }

}
