<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TurfCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TurfCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turf_categories = DB::table('turf_categories')
                                ->where('deleted_at', Null)
                                ->where('deleted', 'No')
                                ->orderBy('id')
                                ->Paginate(5);

        return view('category.index', ['turf_categories' => $turf_categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('category.create-modal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validateWithBag('category_name',[
            'category_name'  => ['required', 'string', 'min:3', 'unique:'.TurfCategory::class],
        ]);
        
        
        $turf_category = DB::table('turf_categories')
                            ->insert(
                                [
                                    'category_name'      => $request->category_name,
                                    'created_by'         => Auth::user()->id,
                                    'created_at'         => Now(),
                                ]
                            );
        //return $turf_category;
        flash()->addSuccess('Category Create Successfully.');
        return redirect()->route('turf_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TurfCategory $turfCategory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = DB::table('turf_categories')->find($id);
        //return $category;
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validateWithBag('category_name',[
            'category_name'  => ['required', 'string', 'min:3'],
        ]);

        DB::table('turf_categories')
        ->where('id', $id)
        ->update([
            'category_name'      => $request->category_name,
            'status'             => $request->status,
            'update_by'          => Auth::user()->id,
            'update_at'          => Now(),
        ]);
        flash()->addSuccess('Category update Successfully.');
        return redirect()->route('turf_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = DB::table('turf_categories')
        ->where('id', $id)
        ->update([
            'deleted' => 'Yes',
            'deleted_by' => Auth::user()->id,
            'deleted_at' => Now(),
            'status'  => 'Inactive',
        ]);

        //return $category;
        flash()->addSuccess('Category Delete Successfully.');
        return redirect()->route('turf_category.index');
    }
}
