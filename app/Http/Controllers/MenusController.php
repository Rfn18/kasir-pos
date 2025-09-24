<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('children')->get();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('menus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'sluq' => 'required|string|max:255|unique:menus',
            'parent_id' => 'nullable|exists:menus,id',
        ]);

        $menu = Menu::create($validate);
        return redirect()->route('menus.index')->with('success', 'Create menu successfuly');
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
        $menu = Menu::find($id);
        $menus = Menu::where('id', '!=', $id)->get();
        return view('menus.edit', compact('menu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'sluq' => 'required|string|max:255|unique:menus,sluq,' . $id,
            'parent_id' => 'nullable|exists:menus,id',
        ]);

        $menu->update($validate);
        return redirect()->route('menus.index')->with('success', 'Update menu successfuly');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $menu->delete();
            return redirect()->route('menus.index')->with('success', 'Delete menu success');
        }

        return redirect()->route('menus.index')->with('error', 'Menu not found');
    }
}
