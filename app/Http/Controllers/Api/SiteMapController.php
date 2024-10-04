<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Models\Modular\ParentPage;
use App\Models\Articles\Article;

class SiteMapController extends Controller
{
    public function getSitemap()
    {
        // Initialize URLs array with static URLs
        $urls = [];

        // Fetch dynamic URLs from Parent Pages and their children
        $parentPages = ParentPage::with('sub_pages.child_pages')->get();
        foreach ($parentPages as $parentPage) {
            $urls[] = [
                'url' => '/pages/' . $parentPage->slug,
                'lastmod' => $parentPage->updated_at->toIso8601String(),
            ];
            foreach ($parentPage->sub_pages as $subPage) {
                $urls[] = [
                    'url' => '/pages/' . $parentPage->slug . '/' . $subPage->slug,
                    'lastmod' => $subPage->updated_at->toIso8601String(),
                ];
                foreach ($subPage->child_pages as $childPage) {
                    $urls[] = [
                        'url' => '/pages/' . $parentPage->slug . '/' . $subPage->slug . '/' . $childPage->slug,
                        'lastmod' => $childPage->updated_at->toIso8601String(),
                    ];
                }
            }
        }

        // Fetch dynamic URLs from Articles
        $articles = Article::all();
        foreach ($articles as $article) {
            $urls[] = [
                'url' => '/resources/' . $article->slug,
                'lastmod' => $article->updated_at->toIso8601String(),
            ];
        }

        // You can continue to add more entities in a similar manner
        // For example, products or other custom routes...

        return response()->json($urls);
    }
}
