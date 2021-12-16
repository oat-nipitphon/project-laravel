<?php

namespace App\Http\Controllers;
use App\Models\Membe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlFormController extends Controller
{
    //
    public function viewList(){
        return view('form.view-list');
    }

    public function viewListTable(){
        $data['data'] = Membe::get();
        return $data;

        // return response()->json([
        //     'data' => $data,
        // ]);
    }

    public function insertConfig(Request $req){
        // dd($req);

        // $req->validate([
        //     'image' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
        // ]);

        // $imageName = time().'.'.$req->image->extension();
        // $req->image->move(public_path('image'), $imageName);


        $insertMenbe = Membe::create([
            'card_code' => $req->cardCode,
            'fullname' => $req->fullname,
            'address' => $req->address,
            'tel' => $req->tel,
            'image' => $req->image
        ]);
        // dd($insertMenbe);
    }

    public function deleteConfig($id){

        $delete = DB::table('membes')->where('id', $id)->delete();

        // return redirect()->route('inv.report-status-config');
    }

}
