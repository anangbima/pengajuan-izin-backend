<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIzinRequest;
use App\Http\Requests\UpdateIzinRequest;
use App\Models\Izin;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $izin = Izin::with('user')->get();

        return response()->json([
            'izin'      => $izin,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIzinRequest $request)
    {
        $data = $request->validated();
        
        $storeIzin = Izin::create([
            'judul'     => $data['judul'],
            'isi'       => $data['isi'],
            'jenis'     => $data['jenis'],
            'user_id'   => $request['user_id'],
            'status'    => 'belum diproses'
        ]);

        if($storeIzin) {
            return response()->json([
                'message'   => 'success'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Izin $izin)
    {
        return response()->json([
            'izin'      => $izin::with('user', 'komentar')->first(),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIzinRequest $request, Izin $izin)
    {
        $data = $request->validated();

        $updateIzin = $izin->update($data);

        if ($updateIzin) {
            return response()->json([
                'message'   => 'Update Successfully'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Izin $izin)
    {
        $deleteIzin = $izin->delete();

        if ($deleteIzin) {
            return response()->json([
                'message'   => 'Delete Successfully'
            ], 200);
        }
    }
}
