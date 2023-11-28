<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DocumentRequirement;
use App\Http\Requests\DocumentRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Complaint; // TODO: delete after index view has finish

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $documents = Document::where('user_id', auth()->user()->id)->latest();
        $isDataNotValid = Document::where('user_id', auth()->user()->id)->where('status', 'tidak valid')->exists();
        $isLetterReadyForPickup = Document::where('user_id', auth()->user()->id)->where('status', 'siap diambil')->exists();

        if ($request->has('keyword')) {
            $documents = $documents->where('request_number', 'like', '%' . $request->keyword . '%');
        }

        $documents = $documents->paginate(5);
        return view('pages.frontend.documents.history', compact('documents', 'isDataNotValid', 'isLetterReadyForPickup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.frontend.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        $time = time();
        $generateRequestNumber = date("Ymd", $time) . $time;
        $document =  Document::create([
            "user_id" =>  auth()->user()->id,
            "request_number" => $generateRequestNumber,
            "document_type" => $request->document_type,
            "status" => "proses validasi",
        ]);

        $id = $document->id;

        $files = $request->file('document_requirements');
        $names = $request->input('names');
        if ($request->hasFile('document_requirements')) {
            foreach (array_combine($names, $files) as $name => $file) {
                $photo = $file->storePublicly("photos", "public");

                DocumentRequirement::create([
                    "document_id" => $id,
                    "name" => $name,
                    "url" => $photo
                ]);
            }
        }

        Alert::toast("<strong>Data Berhasil Dikirim!</strong>", 'success')->toHtml()->timerProgressBar();

        return redirect()->route('complainant.documents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        if (auth()->user()->role->role === 'complainant') {
            return view('pages.frontend.documents.detail', compact("document"));
        } else {
            $status = [
                'tidak valid',
                'proses validasi',
                'diproses',
                'siap diambil',
                'selesai'
            ];
            return view('pages.admin.documents.detail', compact('document', 'status'));
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
    public function update(Request $request, Document $document)
    {
        $files = $request->file('document_requirements');
        $names = $request->input('names');
        if ($request->hasFile('document_requirements')) {
            foreach (array_combine($names, $files) as $name => $file) {
                $photo = $file->storePublicly("photos", "public");

                DocumentRequirement::where('document_id', $document->id)->where('name', $name)->update([
                    "url" => $photo
                ]);
            }
        }

        $document->update([
            "status" => "proses validasi"
        ]);

        Alert::toast("<strong>Data Berhasil Diubah!</strong>", 'success')->toHtml()->timerProgressBar();

        return redirect()->route('complainant.documents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();

        Alert::toast("<strong>Data Berhasil Dihapus!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->back();
    }

    public function updateResponse(Request $request, Document $document)
    {
        $request->validate([
            'response' => 'required|string',
        ], [
            'response.required' => 'Isikan Response terlebih dahulu!'
        ]);

        $data = $request->all();

        $document->update($data);

        Alert::toast("<strong>Anda sudah memberikan pesan kesalahan!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->back();
    }

    public function updateStatus(Request $request, Document $document)
    {
        $request->validate([
            'status' => 'required|string',
        ], [
            'status.required' => 'Pilih status terlebih dahulu!'
        ]);

        $data = $request->all();

        $document->update($data);
        Alert::toast("<strong>Berhasil Ubah Status!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->back();
    }

    public function generatePDFDetail(Document $document)
    {
        $data = [
            'document' => $document,
            'date' => Carbon::now()
        ];

        $pdf = Pdf::loadView('pages.pdf.documents.generate-detail-document', $data)->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('a4', 'potrait');
        return $pdf->download("Bukti Pengajuan Surat " . $document->user->name . ".pdf");
    }

    public function generatePDFAll(Request $request)
    {
        $documents = Document::latest();

        if ($request->has(['start-date', 'end-date'])) {
            $startDate = $request->date('start-date');
            $endDate = $request->date('end-date');

            $documents = $documents->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($request->has(['month'])) {
            $month = $request->month; // example => "2023-06"
            $dateParts = explode("-", $month); // example => ["2023", "06"]
            $year = $dateParts[0]; // example => "2023"
            $month = $dateParts[1]; // example => "06"

            $documents = $documents->whereMonth('created_at', $month)
                ->whereYear('created_at', $year);
        } elseif ($request->has('year')) {
            $yearInput = $request->year;

            $documents = $documents->whereYear('created_at', $yearInput);
        }

        $documents = $documents->get();

        $data = [
            'documents' => $documents,
            'total' => $documents->count(),
            'date' => Carbon::now()
        ];

        $pdf = Pdf::loadView('pages.pdf.documents.generate-documents', $data)
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'potrait');

        return $pdf->download("Data Pengajuan.pdf");
    }
}
