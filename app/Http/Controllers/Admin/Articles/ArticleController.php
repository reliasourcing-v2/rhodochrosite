<?php

namespace App\Http\Controllers\Admin\Articles;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Articles\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleManagement\ArticleRequest;
use App\Http\Processors\ArticleProcessor;

class ArticleController extends Controller
{
    protected $articleProcessor;
    protected $indexRoute = 'admin.article-management.articles.index';

    public function __construct(ArticleProcessor $articleProcessor)
    {
        $this->articleProcessor = $articleProcessor;
    }

    public function index(Request $request)
    {
        $data = $this->articleProcessor->index($request);

        return Inertia::render('Admin/ArticleManagement/Articles/Index', $data);
    }
    
    public function create()
    {
        return Inertia::render('Admin/ArticleManagement/Articles/Create', [
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $this->articleProcessor->store($request);

        return to_route($this->indexRoute)
            ->with('success', 'Saved!');
    }

    public function edit(Request $request, Article $article)
    {
        return Inertia::render('Admin/ArticleManagement/Articles/Edit', [
            'item' => $article,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $this->articleProcessor->update($request, $article);

        return to_route($this->indexRoute)
            ->with('success', 'Saved!');
    }

    public function archive(Article $article)
    {
        $article->delete();

        return to_route($this->indexRoute)
            ->with('success', 'Archived!');
    }

    public function restore(Request $request)
    {
        Article::withTrashed()->find($request->id)->restore();

        return to_route($this->indexRoute)
            ->with('success', 'Restored!');
    }
}
