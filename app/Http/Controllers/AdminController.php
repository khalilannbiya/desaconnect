<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $complaints = Complaint::with(['category'])->latest();

        if ($request->has(['keyword'])) {
            $complaints = $complaints->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('status', 'like', '%' . $request->keyword . '%')
                ->orWhereHas('category', function ($categoryQuery) use ($request) {
                    $categoryQuery->where('category', 'like', '%' . $request->keyword . '%');
                });
        } elseif ($request->has(['start-date', 'end-date'])) {
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

        $complaints = $complaints->paginate(10);

        return view('pages.admin.index', compact('complaints'));
    }

    public function indexDocuments(Request $request)
    {
        $documents = Document::with('user')->latest();
        if ($request->has(['keyword'])) {
            $documents = $documents->where('status', 'like', '%' . $request->keyword . '%')
                ->orWhere('document_type', 'like', '%' . $request->keyword . '%')
                ->orWhereHas('user', function ($userQuery) use ($request) {
                    $userQuery->where('name', 'like', '%' . $request->keyword . '%');
                });
        } elseif ($request->has(['start-date', 'end-date'])) {
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

        $documents = $documents->paginate(10);
        return view('pages.admin.documents.index', compact('documents'));
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
