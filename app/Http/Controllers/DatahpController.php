<?php

namespace App\Http\Controllers;

use App\Models\Datahp;
use Illuminate\Http\Request;
use PDF;

class DatahpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_hp = Datahp::latest()->paginate(5);
    
        return view('list_hp.index',compact('list_hp'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list_hp.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk_hp' => 'required',
            'tipe_hp' => 'required',
            'thn_produksi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        //Datahp::create($request->all());

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
  
        Datahp::create($input);
     
        return redirect()->route('list_hp.index')
                        ->with('Sukses','Data berhasil di simpan');
    }

    public function edit(Datahp $list_hp)
    {
        return view('list_hp.edit',compact('list_hp'));
    }
    

    public function update(Request $request, Datahp $list_hp)
    {
        $request->validate([
            'merk_hp' => 'required',
            'tipe_hp' => 'required',
            'thn_produksi' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        
        $list_hp->update($input);
    
        //$datahp->update($request->all());
    
        return redirect()->route('list_hp.index')
                        ->with('Sukses','Data berhasil di ubah');
    }
    

    public function destroy(Datahp $list_hp)
    {
        $list_hp->delete();
    
        return redirect()->route('list_hp.index')
                        ->with('Sukses','Data berhasil di hapus');
    }

    public function exportpdf(){
        $list_hp = Datahp::all();

        view()->share('list_hp', $list_hp);
        $pdf = PDF::loadview('data_hp_pdf');
        return $pdf->download('data_hp.pdf');
    }
}
