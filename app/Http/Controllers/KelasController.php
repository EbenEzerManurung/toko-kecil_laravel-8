<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Setting;
use Illuminate\Http\Request;
use PDF;


class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index');
    }

    public function data()
    {
        $kelas = Kelas::orderBy('kode_kelas')->get();

        return datatables()
            ->of($kelas)
            ->addIndexColumn()
            ->addColumn('select_all', function ($produk) {
                return '
                    <input type="checkbox" name="id_kelas[]" value="'. $produk->id_kelas .'">
                ';
            })
            ->addColumn('kode_kelas', function ($kelas) {
                return '<span class="label label-success">'. $kelas->kode_kelas .'<span>';
            })
            ->addColumn('aksi', function ($kelas) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('kelas.update', $kelas->id_kelas) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('kelas.destroy', $kelas->id_kelas) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'select_all', 'kode_kelas'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = Kelas::latest()->first() ?? new Kelas();
        $kode_kelas = (int) $kelas->kode_kelas +1;

        $kelas = new Kelas();
        $kelas->kode_kelas = tambah_nol_didepan($kode_kelas, 5);
        $kelas->jurusan = $request->jurusan;
        $kelas->semester = $request->semester;
        
        $kelas->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);

        return response()->json($kelas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();

        return response(null, 204);
    }

    public function cetakKelas(Request $request)
    {
        $datakelas = collect(array());
        foreach ($request->id_kelas as $id) {
            $kelas = Kelas::find($id);
            $datakelas[] = $kelas;
        }

        $datakelas = $datakelas->chunk(2);
        $setting    = Setting::first();

        $no  = 1;
        $pdf = PDF::loadView('kelas.cetak', compact('datakelas', 'no', 'setting'));
        $pdf->setPaper(array(0, 0, 566.93, 850.39), 'potrait');
        return $pdf->stream('kelas.pdf');
    }
}