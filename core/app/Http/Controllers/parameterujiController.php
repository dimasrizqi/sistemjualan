<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class parameterujiController extends Controller
{
    public function index(){
        $parameter_uji = DB::table('parameter_uji')->orderBy('name','ASC')->get();
        return view('lab_kimia.parameter_uji.index',['parameter_uji' => $parameter_uji]);
        
    }

    public function create(){
         return view('lab_kimia.parameter_uji.tambah-parameter-uji');
        
    }
    

    public function store(Request $request){
        $data_insert[] = array(
            'name' => $request->name,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
        );

        DB::table('parameter_uji')->insert( $data_insert);
        return Redirect()->route('parameteruji.index') -> with('success','berhasil menambah data');
    }

    public function update(Request $request,  $id)
    {
        // dd($request->all(), $id);
        DB::table('parameter_uji')
              ->where('id', $id)
              ->update(['name' => $request->name]);

        return redirect()->route('parameteruji.index')
                        ->with('success','Data berhasil di update');
    }

    public function edit($id)
    {
        $parameter_uji = DB::table('parameter_uji')->where('id',$id)->orderBy('name','ASC')->get();
        return view('lab_kimia.parameter_uji.edit',['parameter_uji' => $parameter_uji]);
    }

    public function destroy($id)

    {
        // dd($id);
        
        DB::table('parameter_uji')->where('id','=', $id)->delete();
        
        return redirect()->route('parameteruji.index') -> with('deleted','berhasil menghapus');
    }
}
