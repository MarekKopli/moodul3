<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $spiciness = $request->input('spiciness'); // Get spiciness level from the request
        $vegan = $request->input('vegan'); // Get vegan preference from the request
        $glutenFree = $request->input('gluten_free'); // Get gluten free preference from the request
        $vegetarian = $request->input('vegetarian'); // Get vegetarian preference from the request

        // Start with all articles
        $articlesQuery = Article::query();

        // Filter articles based on spiciness level
        if ($spiciness) {
            $articlesQuery->where('spiciness', $spiciness);
        }

        // Filter articles based on dietary preferences
        if ($vegan) {
            $articlesQuery->where('vegan', true);
        }
        if ($glutenFree) {
            $articlesQuery->where('gluten_free', true);
        }
        if ($vegetarian) {
            $articlesQuery->where('vegetarian', true);
        }

        // Get paginated articles
        $articles = $articlesQuery->latest()->simplePaginate(12);

        return view('welcome', compact('articles'));
    }

    public function article(Article $article)
    {
        return view('article', compact('article'));
    }

    public function tag(Tag $tag)
    {
        $articles = $tag->articles()->paginate(12);
        return view('welcome', compact('articles'));
    }

    public function about()
    {
        return view('about');
    }
}
