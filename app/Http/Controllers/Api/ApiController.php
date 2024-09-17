<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Models\Modular\ParentPage;
use App\Models\Modular\SubPage;
use App\Models\Modular\ChildPage;
use App\Models\Calculator\Pricing;
use App\Models\Articles\Article;

class ApiController extends Controller
{

    public function getParentPages()
    {
        $parentPages = ParentPage::orderBy('order', 'ASC')
            ->with('sub_pages.child_pages')
            ->get()
            ->map(function ($parent) {
                return [
                    'id' => $parent->id,
                    'slug' => $parent->slug,
                    'title' => $parent->title,
                    'sub_pages' => $parent->sub_pages->map(function ($subpage) {
                        return [
                            'parent_page_id' =>  $subpage->parent_page_id,
                            'id' => $subpage->id,
                            'slug' => $subpage->slug,
                            'title' => $subpage->title,
                            'child_pages' => $subpage->child_pages->map(function ($child) {
                                return [
                                    'sub_page_id' =>  $child->sub_page_id,
                                    'id' => $child->id,
                                    'slug' => $child->slug,
                                    'title' => $child->title,
                                ];
                            })
                        ];
                    })
                ];
            });

        return response()->json($parentPages);
    }

    public function getCmsHeader()
    {
        $header = CmsPage::where('slug', 'header')->first();
        return response()->json(['content' => $header ? $header->content : null]);
    }

    public function getCmsFooter()
    {
        $footer = CmsPage::where('slug', 'footer')->first();
        return response()->json(['content' => $footer ? $footer->content : null]);
    }
    
    public function getPages()
    {
        $pages = CmsPage::all();
        return response()->json($pages);
    }

    public function getPage($slug)
    {
        $page = CmsPage::where('slug', $slug)->firstOrFail();
        return response()->json($page);
    }


    public function getParentPage($slug)
    {
        $page = ParentPage::where('slug', $slug)->with('frames.cards')->firstOrFail();
        return response()->json($page);
    }

    public function getSubPage($slug)
    {
        $page = SubPage::where('slug', $slug)->with('frames.cards')->firstOrFail();
        return response()->json($page);
    }

    public function getChildPage($slug)
    {
        $page = ChildPage::where('slug', $slug)->with('frames.cards')->firstOrFail();
        return response()->json($page);
    }

    public function getPricingItems()
    {
        $items = Pricing::all();
        return response()->json($items);
    }

    public function getArticles(Request $request)
    {
        $featured = Article::query()->where('is_highlight', 1)->orderBy('publish_date', 'desc')->get();
        $blogs = Article::query()->where('article_type', 'blogs')->where('is_highlight', 0)->orderBy('publish_date', 'desc')->get();
        $caseStudies = Article::query()->where('article_type', 'case-studies')->where('is_highlight', 0)->orderBy('publish_date', 'desc')->get();

        return response()->json([
            'featured' => $featured,
            'blogs' => $blogs,
            'caseStudies' => $caseStudies,
        ]);
    }

    public function getArticle($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $suggestedArticles = Article::where('is_highlight', 0)->where('id', '!=', $article->id)->inRandomOrder()->limit(2)->get();

        return response()->json([
            'article' => $article,
            'suggestedArticles' => $suggestedArticles,
        ]);
    }
}
