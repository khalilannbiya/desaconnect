<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Requests\ComplaintRequest;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $complaints = Complaint::where('user_id', auth()->user()->id)->latest();

        if ($request->has('keyword')) {
            $complaints = $complaints->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('unic_code', $request->keyword);
        }

        $complaints = $complaints->paginate(5);
        return view('pages.frontend.history', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.frontend.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComplaintRequest $request)
    {
        // Generate Bilangan Random
        $randomNumber = random_int(000000, 999999);
        $randomNumber = str_pad($randomNumber, 6, '0', STR_PAD_LEFT);
        while (Complaint::where('unic_code', $randomNumber)->exists()) {
            $randomNumber = random_int(000000, 999999);
            $randomNumber = str_pad($randomNumber, 6, '0', STR_PAD_LEFT);
        }

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->storePublicly("photos", "public");
        }

        Complaint::create([
            'user_id' =>  auth()->user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'body' => $request->body,
            'status' => 'belum diproses',
            'photo_url' => $photo,
            'unic_code' => $randomNumber,
            'is_private' => $request->is_private ? $request->is_private : '0',
            'is_anonymous' => $request->is_anonymous ? $request->is_anonymous : '0',
        ]);

        Alert::toast("<strong>Data Berhasil Dikirim!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->route('complainant.complaints.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        if (auth()->user()->role->role === 'complainant') {
            return view('pages.frontend.detail', compact('complaint'));
        } else {
            $status = [
                'belum diproses',
                'sedang diproses',
                'selesai'
            ];
            return view('pages.admin.detail', compact('complaint', 'status'));
        }
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
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        Alert::toast("<strong>Data Berhasil Dihapus!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateResponse(Request $request, Complaint $complaint)
    {
        $request->validate([
            'response' => 'required|string',
        ], [
            'response.required' => 'Isikan Response terlebih dahulu!'
        ]);


        $data = $request->all();

        $complaint->update($data);

        Alert::toast("<strong>Anda sudah memberikan respon!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required|string',
        ], [
            'status.required' => 'Pilih status terlebih dahulu!'
        ]);

        $data = $request->all();

        $complaint->update($data);

        Alert::toast("<strong>Berhasil Ubah Status!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Generate PDF the specified resource in storage.
     */
    public function generatePDFDetail(Complaint $complaint)
    {
        $data = [
            'complaint' => $complaint,
            'date' => Carbon::now()
        ];

        $pdf = Pdf::loadView('pages.pdf.generate-detail-complaint', $data)->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])->setPaper('a4', 'potrait');
        return $pdf->download("Data Aduan " . $complaint->user->name . ".pdf");
    }

    /**
     * Generate PDF the specified resource in storage.
     */
    public function generatePDFAll(Request $request)
    {
        $complaints = Complaint::latest();

        if ($request->has(['start-date', 'end-date'])) {
            $startDate = $request->date('start-date');
            $endDate = $request->date('end-date');

            $complaints = $complaints->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($request->has(['month'])) {
            $month = $request->month; // example => "2023-06"
            $dateParts = explode("-", $month); // example => ["2023", "06"]
            $year = $dateParts[0]; // example => "2023"
            $month = $dateParts[1]; // example => "06"

            $complaints = $complaints->whereMonth('created_at', $month)
                ->whereYear('created_at', $year);
        } elseif ($request->has('year')) {
            $yearInput = $request->year;

            $complaints = $complaints->whereYear('created_at', $yearInput);
        }

        $complaints = $complaints->get();

        $data = [
            'complaints' => $complaints,
            'total' => $complaints->count(),
            'date' => Carbon::now()
        ];

        $pdf = Pdf::loadView('pages.pdf.generate-complaints', $data)
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'potrait');

        return $pdf->download("Data Aduan.pdf");
    }
}
