<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\TechnologyCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    // Categories Index
    public function categoriesIndex()
    {
        $categories = TechnologyCategory::orderBy('display_order')->get();

        return view('admin.technologies.categories.index', compact('categories'));
    }

    // Category Create Form
    public function categoryCreate()
    {
        return view('admin.technologies.categories.create');
    }

    // Category Store
    public function categoryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'color' => 'required|string|max:30',
            'display_order' => 'nullable|integer',
        ]);

        TechnologyCategory::create($validated);

        return redirect()->route('admin.technology.categories.index')
            ->with('success', 'Category created successfully');
    }

    // Category Edit Form
    public function categoryEdit(TechnologyCategory $category)
    {
        return view('admin.technologies.categories.edit', compact('category'));
    }

    // Category Update
    public function categoryUpdate(Request $request, TechnologyCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'color' => 'required|string|max:30',
            'display_order' => 'nullable|integer',
        ]);

        $category->update($validated);

        return redirect()->route('admin.technology.categories.index')
            ->with('success', 'Category updated successfully');
    }

    // Category Delete
    public function categoryDestroy(TechnologyCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.technology.categories.index')
            ->with('success', 'Category deleted successfully');
    }

    // Technologies Index
    public function technologiesIndex()
    {
        $technologies = Technology::with('category')->orderBy('category_id')->orderBy('display_order')->get();

        return view('admin.technologies.index', compact('technologies'));
    }

    // Technology Create Form
    public function technologyCreate()
    {
        $categories = TechnologyCategory::orderBy('name')->pluck('name', 'id');

        return view('admin.technologies.create', compact('categories'));
    }

    // Technology Store
    public function technologyStore(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:technology_categories,id',
            'name' => 'required|string|max:255',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Technology::create($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology created successfully');
    }

    // Technology Edit Form
    public function technologyEdit(Technology $technology)
    {
        $categories = TechnologyCategory::orderBy('name')->pluck('name', 'id');

        return view('admin.technologies.edit', compact('technology', 'categories'));
    }

    // Technology Update
    public function technologyUpdate(Request $request, Technology $technology)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:technology_categories,id',
            'name' => 'required|string|max:255',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $technology->update($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology updated successfully');
    }

    // Technology Delete
    public function technologyDestroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology deleted successfully');
    }
}
