<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::withCount('projects')->orderBy('name')->get();
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:types,name'],
        ]);

        $data['slug'] = Str::slug($data['name']);

        Type::create($data);

        return redirect()->route('admin.types.index')->with('success', __('Category created successfully.'));
    }

    public function show(Type $type)
    {
        $type->load('projects');
        return view('admin.types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:types,name,' . $type->id],
        ]);

        $data['slug'] = Str::slug($data['name']);

        $type->update($data);

        return redirect()->route('admin.types.index')->with('success', __('Category updated successfully.'));
    }

    public function destroy(Type $type)
    {
        if ($type->projects()->count() > 0) {
            return redirect()->route('admin.types.index')
                ->with('error', __('Cannot delete category: it has associated projects.'));
        }

        $type->delete();

        return redirect()->route('admin.types.index')->with('success', __('Category deleted successfully.'));
    }
}
