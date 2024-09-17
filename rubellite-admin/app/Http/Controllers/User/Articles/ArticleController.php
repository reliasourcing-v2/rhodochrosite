<?php

namespace App\Http\Controllers\User\Articles;

use Inertia\Inertia;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use App\Models\Articles\Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $featured = Article::query()->where('is_highlight', 1);
        $blogs = Article::query()->where('article_type', 'blogs')->where('is_highlight', 0);
        $caseStudies = Article::query()->where('article_type', 'case-studies')->where('is_highlight', 0);
        $cms = CmsPage::where('slug', 'resources')->first();

        return Inertia::render('User/Pages/Resources/Index', [
            'cms' => $cms?->content,
            'featured' => $featured->orderBy('publish_date', 'desc')->paginate(1)->appends(request()->query()),
            'blogs' => $blogs->orderBy('publish_date', 'desc')->paginate(10)->appends(request()->query()),
            'caseStudies' => $caseStudies->orderBy('publish_date', 'desc')->paginate(10)->appends(request()->query()),
        ]);
    }

    public function show(Article $article)
    {
        $cms = CmsPage::where('slug', 'resources')->first();
        return Inertia::render('User/Pages/Resources/View', [
            'cms' => $cms?->content,
            'article' => $article,
            'suggestedArticles' =>$article->where('is_highlight', 0)->inRandomOrder()->limit(2)->get()
        ])->withViewData([
            'title' => $article->meta_title,
            'description' => $article->meta_description,
            'og_image_path' => Storage::url($article->meta_image),
            'keywords' => $article->meta_keyword
        ]);
    }
}
