<?php

namespace App\Http\Controllers\Front;

use App\Events\ArticleViews;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home() {
        return view('front.pages.home');
    }

    public function articles() {
        $articles = Article::latest()->paginate(6);
        return view('front.pages.articles.index', compact('articles'));
    }

    public function articleShow( $id) {
        $article = Article::findOrFail($id);
        event(new ArticleViews($article));
        return view('front.pages.articles.show', compact('article'));
    }

    public function projects() {
        $projects = Project::latest()->paginate(6);
        return view('front.pages.projects.index', compact('projects'));
    }

    public function projectShow($id) {
        $project = Project::findOrFail($id);
        return view('front.pages.projects.show', compact('project'));
    }
}
