<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::latest();

        if ($request->has(['keyword'])) {
            $categories = $categories->where('category', 'like', '%' . $request->keyword . '%');
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
        $request->validate([
            'category' => 'required|string|max:20|unique:categories',
        ], [
            'category.required' => 'Isikan Category terlebih dahulu!',
            'category.max' => 'Kalimat kategori terlalu panjang!',
            'category.unique' => 'Kategori sudah ada sebelumnya!'
        ]);

        $data = $request->all();

        Category::create($data);

        Alert::toast("<strong>Anda berhasil menambahkan Kategori!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->back();
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
        $category->delete();

        Alert::toast("<strong>Data Berhasil Dihapus!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->back();
    }
}
