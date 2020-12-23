<?php

namespace App\Http\Controllers\Api;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{

    private $rules = [
        'name' => 'required|max:255',
        'is_active' => 'boolean'
    ];
    
    // GET genre
    public function index()
    {
        return Genre::all();
    }

    // POST genre
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        return Genre::create($request->all()); // 201
    }

    // GET genre/n
    public function show(Genre $genre)
    {
        return $genre;
    }

    // PUT genre/n
    public function update(Request $request, Genre $genre)
    {
        // dd($genre); // dump and die
        $this->validate($request, $this->rules);
        $genre->update($request->all());
        return $genre; // 200 
    }

    // DELETE genre/n
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->noContent(); // 204 - no content
    }
}
