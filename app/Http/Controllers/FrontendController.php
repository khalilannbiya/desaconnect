<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.frontend.index');
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
    public function show(Complaint $complaint)
    {
        return view('pages.frontend.detail-public', compact('complaint'));
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

    /**
     * Tracking Complaints.
     */
    public function tracking(Request $request)
    {
        $unicCode = implode("",  $request->all());

        $complaint = Complaint::where('unic_code', $unicCode)->first();

        if (!$complaint) {
            Alert::toast("<strong>Data yang anda cari tidak ada!</strong>", 'error')->toHtml()->timerProgressBar();

            return redirect()->back();
        }

        return view('pages.frontend.detail', compact('complaint'));
    }

    public function publicComplaints()
    {
        $complaints = Complaint::where('is_private', 0)->latest()->paginate(10);
        return view('pages.frontend.public-complaints', compact('complaints'));
    }
}
