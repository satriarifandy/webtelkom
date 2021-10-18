<?php

namespace App\Http\Controllers;

use App\Exports\PendaftarExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;
use App\Models\Pendaftar;
use Maatwebsite\Excel\Facades\Excel;

class DaftarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mencari(Request $request)
    {
        // $products = Product::all()->toArray();
        $cari = $request->keyword;
        $pendaftar = Pendaftar::where('nama', 'like', "%".$cari."%")->paginate(10);
        return view('admin', compact('pendaftar'));
    }

    public function index() {
        // $pendaftar = Pendaftar::all();
        $pendaftar = Pendaftar::orderBy('created_at', 'desc')->paginate(10);
        // dd($pendaftar);

        $role = Auth::user()->role;
            if($role=='admin'){
                return view('admin', compact('pendaftar'));
            }
            else {
                return 'Sorry you can not access this page';
            }
    }

    public function create($id) {
        $units = Unit::all();
        $units = Unit::find($id);
        return view('pages.daftar',[
            "units"=>$units
        ]);
    }

    public function store(Request $request) {

        $pendaftar = $request->validate([
            'nama' => 'required',
            'kelamin' => 'required',
            'institusi' => 'required',
            'jurusan' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'motivasi' => 'required',
            'foto' => 'required|mimes:png,jpeg,jpg|max:1024',
            'surat' => 'required|mimes:pdf|max:1024',
            'cv' => 'required|mimes:pdf|max:1024',
        ]);

        $pendaftar = new Pendaftar();
        $pendaftar->nama = request('nama');
        $pendaftar->kelamin = request('kelamin');
        $pendaftar->institusi = request('institusi');
        $pendaftar->jurusan = request('jurusan');
        $pendaftar->nomor_hp = request('nomor_hp');
        $pendaftar->alamat = request('alamat');
        $pendaftar->unit = request('unit');
        $pendaftar->motivasi = request('motivasi');

        $file3 = $request->file('foto');
        $extension3 = $file3->getClientOriginalExtension();
        $filename3 = 'foto_'.time().'.'.$extension3;
        $file3->storeAs('public/images', $filename3);
        $file3->move(public_path('/telkom/pendaftar/images/'), $filename3);
        $pendaftar->foto = $filename3;

        
        $file = $request->file('surat');
        $extension = $file->getClientOriginalExtension();
        $filename = 'surat_'.time().'.'.$extension;
        $file->storeAs('public/surat', $filename);
        $file->move(public_path('/telkom/pendaftar/surat/'), $filename);
        $pendaftar->surat = $filename;

        $file1 = $request->file('cv');
        $extension1 = $file1->getClientOriginalExtension();
        $filename1 = 'cv_'.time().'.'.$extension1;
        $file1->storeAs('public/cv', $filename1);
        $file1->move(public_path('/telkom/pendaftar/cv/'), $filename1);
        $pendaftar->cv = $filename1;
        
        $pendaftar->save();

        return redirect('/success');

    }

    public function show($id) {
        $pendaftar = Pendaftar::find($id);
        // dd($product);
        $role = Auth::user()->role;
        if($role=='admin'){
            return view('pendaftar.show',compact('pendaftar','id'));
        }
        else {
            return 'Sorry you can not access this page';
        }
    }

    public function edit($id) {
        $units = Unit::all();
        $pendaftar = Pendaftar::find($id);
        $role = Auth::user()->role;
        if($role=='admin'){
            return view('pendaftar.edit',compact('pendaftar','id', 'units'));
        }
        else {
            return 'Sorry you can not access this page';
        }
    }

    public function update(Request $request, $id) {
        $pendaftar = Pendaftar::find($id);
        $pendaftar->nama = request('nama');
        $pendaftar->kelamin = request('kelamin');
        $pendaftar->institusi = request('institusi');
        $pendaftar->jurusan = request('jurusan');
        $pendaftar->alamat = request('alamat');
        $pendaftar->unit = request('unit');
        $pendaftar->motivasi = request('motivasi');

        

        $pendaftar->update();
        return redirect('admin')->with('success update', 'Data telah terupdate');;
    }

    public function destroy($id){
        $pendaftar = Pendaftar::find($id);
        $pendaftar->delete();
        return redirect('admin')->with('success deleted','Product has been deleted');
    }

}
