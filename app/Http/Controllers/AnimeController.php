<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        $animedata = Anime::all();
        return view('anime', compact('animedata'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Title' => 'required|max:255',
            'Author' => 'required|max:255',
            'Eps' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Anime::create($validatedData);
        return redirect()->route('anime.index')->with('success', 'Anime Added Successfully');
    }

    public function edit(Anime $anime)
    {
        return view('edit', compact('anime'));
    }

    public function update(Request $request, Anime $anime)
    {
        $rules = [
            'Title' => 'required|max:255',
            'Author' => 'required|max:255',
            'Eps' => 'required'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        $anime->update($validatedData);

        return redirect()->route('anime.index')->with('success', 'Anime Updated Successfully');
    }

    public function destroy(Anime $anime)
    {
        $anime->delete();
        return redirect()->route('anime.index')->with('success', 'Anime Has Been Deleted');
    }
}
