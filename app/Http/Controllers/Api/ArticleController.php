<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Article::create($request->only(['title', 'description']));

        return response()->json("Article store");
    }

    /**
     * Display the specified resource.
     */
    public function show($articleId)
    {
        $article = Article::findOrFail($articleId);

        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Article::find($id)->update($request->only(['title', 'description']));

        return response()->json("Article update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::find($id)->delete();

        return response()->json("Article destroy");
    }
}
