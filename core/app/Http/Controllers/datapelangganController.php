<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class datapelangganController extends Controller
{
    public function index(){
        $data_pelanggan = DB::table('data_pelanggan')->orderBy('name','ASC')->get();
        return view('lab_kimia.data_pelanggan.index',['data_pelanggan' => $data_pelanggan]);
        
    }

    public function create(){
         return view('lab_kimia.data_pelanggan.tambah');
        
    }
    public function hapus(Request $request){
        // return $request;
        //untuk script hapus
        // DB::table('jenis_program')->where('id',$request->id)->delete();
        // return redirect()->route('lab_kimia-index-jenis-program')->with('Jenis program dihapus');
    }

    public function store(Request $request){
        $data_insert[] = array(
            'name' => $request->name,
            'tlp' => $request->tlp,
            'alamat' => $request->alamat,
            'email' => $request->email,
        );

        DB::table('data_pelanggan')->insert( $data_insert);
        return Redirect()->route('datapelanggan.index') -> with('success','berhasil menambah data');
    }

    public function update(Request $request,  $id)
    {
        // dd($request->all(), $id);
        DB::table('data_pelanggan')
              ->where('id', $id)
              ->update(['name' => $request->name]);

        return redirect()->route('datapelanggan.index')
                        ->with('success','Data berhasil di update');
    }

    public function edit($id)
    {
        $data_pelanggan = DB::table('data_pelanggan')->where('id',$id)->orderBy('name','ASC')->get();
        return view('lab_kimia.data_pelanggan.edit',['data_pelanggan' => $data_pelanggan]);
    }

    public function destroy($id)

    {
        // dd($id);
        
        DB::table('users')->where('id','=', $id)->delete();
        
        return redirect()->route('lihat-user') -> with('deleted','berhasil menghapus');
    }
}
