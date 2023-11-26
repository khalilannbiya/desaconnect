<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Document;
use App\Models\Complaint;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = collect([[
            // Jumlah data complaint dengan status "belum diproses"
            'unprocessedCount' => Complaint::where('status', 'belum diproses')->count(),

            // Jumlah data complaint dengan status "sedang diproses"
            'processingCount' => Complaint::where('status', 'sedang diproses')->count(),

            // Jumlah data complaint dengan status "telah selesai"
            'completedCount' => Complaint::where('status', 'selesai')->count(),

            // Jumlah data keseluruhan
            'totalCount' => Complaint::count(),

            // Jumlah Kategori
            'totalCategory' => Category::count(),

            // Jumlah Masyarakat
            'totalComplainant' => User::where('role_id', 3)->count(),

            // Pengajuan tidak valid
            'invalidSubmission' => Document::where('status', 'tidak valid')->count(),

            // Pengajuan Proses validasi
            'validationProcess' => Document::where('status', 'proses validasi')->count(),

            // Pengajuan Diproses
            'onProccess' => Document::where('status', 'diproses')->count(),

            // Pengajuan Siap diambil
            'readyToPickup' => Document::where('status', 'siap diambil')->count(),

            // Pengajuan selesai
            'submissionCompleted' => Document::where('status', 'selesai')->count(),

            // Total Pengajuan
            'totalSubmission' => Document::count(),
        ]]);

        if (auth()->user()->role_id === 1) {
            $cards->push([
                'totalUser' => User::count(),
            ]);
            $cards->push([
                'totalStaff' =>  User::where('role_id', 2)->count(),
            ]);
            $cards->push([
                'totalAdmin' => User::where('role_id', 1)->count()
            ]);

            $complaints = Complaint::take(5)->latest()->get();

            $users = User::take(5)->latest()->get();

            $cards = $cards->collapse();

            return view('pages.admin.dashboard', compact('cards', 'complaints', 'users'));
        }

        $cards = $cards->collapse();
        return view('pages.admin.dashboard', compact('cards'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
