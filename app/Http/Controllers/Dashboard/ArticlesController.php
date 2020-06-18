<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Articles\CreateArticlesRequest;
use App\Http\Requests\Dashboard\Articles\EditArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('dashboard.pages.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.articles.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticlesRequest $request)
    {

        Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $request->file('image')->store('images/articles', 'public'),
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->input('title'), '-'),
        ]);
        session()->flash('success', 'تم انشاء المقالة بنجاح');
        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('dashboard.pages.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.pages.articles.form', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(EditArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '-');
        if ($request->hasFile('image')) {
            $image = $request->image->store('images/articles','public');
            Storage::disk('public')->delete($article->image);
            $data['image'] = $image;
        }

        $article->update($data);

        session()->flash('success', 'تم تعديل المقالة بنجاح');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::withTrashed()->where('id', $id)->firstOrFail();

        if ($article->trashed()) {
            Storage::disk('public')->delete($article->image);
            $article->forceDelete();
            session()->flash('error', 'تم حذف المقاله بشكل نهائي');
            return redirect(route('trashed.index', compact('article')));
        } else{
            $article->delete();
            session()->flash('error', 'تم حذف المقاله بنجاح وتم وضعها في قائمة المقالات المحذوفه في حال اردت استرجاعه');
            return redirect(route('articles.index', compact('article')));

        }
    }

    public function trashed()
    {
        $trashes = Article::onlyTrashed()->get();
        return view('dashboard.pages.articles.trashed', compact('trashes'));
    }

    public function restore($id, Request $request)
    {

       Article::withTrashed()->where('id', $id)->restore();

        session()->flash('success', 'تم استرجاع المقالة بنجاح');

        return redirect(route('articles.index'));
    }
}
