<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::latest();

        if ($request->has('keyword')) {
            $categories->where('category', 'like', '%' . $request->keyword . '%');
        }

        $categories = $categories->paginate(10);
        return view('pages.admin.category-index', compact('categories'));
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
        try {
            $validatedData = $request->validate([
                'category' => 'required|string|max:20|unique:categories',
            ], [
                'category.required' => 'Isikan Category terlebih dahulu!',
                'category.max' => 'Kalimat kategori terlalu panjang!',
                'category.unique' => 'Kategori sudah ada sebelumnya!',
            ]);

            DB::beginTransaction(); // Start transaction for performance improvement

            Category::create($validatedData);

            DB::commit(); // Commit changes if no errors occur


            Alert::toast("<strong>Anda berhasil menambahkan Kategori!</strong>", 'success')->toHtml()->timerProgressBar();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback(); // Rollback changes if any error occurs

            // Display an error message to the user
            Alert::toast("Gagal menambahkan kategori: " . $e->getMessage(), 'error')->toHtml()->timerProgressBar();
            return redirect()->back();
        }
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
    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction(); // Start transaction for performance improvement

            $category->delete();

            DB::commit(); // Commit changes if no errors occur

            Alert::toast("<strong>Data Berhasil Dihapus!</strong>", 'success')->toHtml()->timerProgressBar();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback(); // Rollback changes if any error occurs

            Alert::toast("Gagal menghapus data: " . $e->getMessage(), 'error')->toHtml()->timerProgressBar();
            return redirect()->back();
        }
    }
}
