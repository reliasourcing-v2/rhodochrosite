<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use App\Models\Modular\ParentPage;
use App\Http\Controllers\Controller;
use App\Models\Modular\ChildPage;
use App\Models\Modular\SubPage;
use App\Models\Calculator\Pricing;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function parentPage($parentPage, Request $request)
    {
        $parentPage = ParentPage::where('slug', $parentPage)->firstOrFail()->load([]);

        $frames = $parentPage->frames()
            ->with([
                'cards',
            ]);

        $frames = $frames->get();

        return Inertia::render('User/Pages/Modular/Show', [
            'item' => $parentPage,
            'frames' => $frames,
        ])->withViewData([
            'title' => $parentPage?->meta_title ? $parentPage->meta_title : $parentPage->title,
            'description' => $parentPage?->meta_description,
            'og_image_path' => $parentPage?->meta_image ? Storage::url($parentPage?->meta_image) : null,
            'keywords' => $parentPage?->meta_keywords,
        ]);
    }

    public function subPage($parentPage, $subPage, Request $request)
    {
        $subPage = SubPage::where('slug', $subPage)->firstOrFail()->load([]);

        $frames = $subPage->frames()
            ->with([
                'cards',
            ]);

        $frames = $frames->get();

        return Inertia::render('User/Pages/Modular/Show', [
            'item' => $subPage,
            'frames' => $frames,
        ])->withViewData([
            'title' => $subPage?->meta_title ? $subPage->meta_title : $subPage->title,
            'description' => $subPage?->meta_description,
            'og_image_path' => $subPage?->meta_image ? Storage::url($subPage?->meta_image) : null,
            'keywords' => $subPage?->meta_keywords,
        ]);
    }

    public function childPage($parentPage, $subPage, $childPage, Request $request)
    {
        $childPage = ChildPage::where('slug', $childPage)->firstOrFail()->load([]);

        $frames = $childPage->frames()
            ->with([
                'cards',
            ]);

        $frames = $frames->get();

        return Inertia::render('User/Pages/Modular/Show', [
            'item' => $childPage,
            'frames' => $frames,
        ])->withViewData([
            'title' => $childPage?->meta_title ? $childPage->meta_title : $childPage->title,
            'description' => $childPage?->meta_description,
            'og_image_path' => $childPage?->meta_image ? Storage::url($childPage?->meta_image) : null,
            'keywords' => $childPage?->meta_keywords,
        ]);
    }

    public function index() {

        $cms = CmsPage::where('slug', 'home')->first();

        return Inertia::render('User/Pages/Home/Index', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

    /** INDUSTRIES */
    // Finance
    public function finance() {
        $cms = CmsPage::where('slug', 'industries-finance')->first();
        return Inertia::render('User/Pages/Industries/Finance', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }
    // Gaming
    public function gaming() {
        $cms = CmsPage::where('slug', 'industries-gaming')->first();
        return Inertia::render('User/Pages/Industries/Gaming', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }
    // Saas
    public function saas() {
        $cms = CmsPage::where('slug', 'industries-saas')->first();
        return Inertia::render('User/Pages/Industries/Saas', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

    // E-commerce
    public function eCommerce() {
        $cms = CmsPage::where('slug', 'industries-ecommerce')->first();
        return Inertia::render('User/Pages/Industries/ECommerce', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

    // Careers
    public function careers() {
        $cms = CmsPage::where('slug', 'careers')->first();
        return Inertia::render('User/Pages/Careers/Index', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

     // Calculator
    public function calculator() {
        $items = Pricing::query()->get();
        $cms = CmsPage::where('slug', 'calculator')->first();
        return Inertia::render('User/Pages/Calculator/Index', [
            'items' => $items,
            'cms' => $cms?->content,
            ])->withViewData([
                'title' => $cms->title,
                'description' => $cms->description,
                'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
                'keywords' => $cms->keywords,
            ]);
    }
    public function calculatorView(Request $request) {
        // Access the form data
        $items = Pricing::query()->get();
        $role = $request->role;
        $experience = $request->experience;
        $country = $request->country;
        $cms = CmsPage::where('slug', 'calculator')->first();
        return Inertia::render('User/Pages/Calculator/View', [
            'cms' => $cms?->content,
            'items' => $items,
            'role' => $role,
            'experience' => $experience,
            'country' => $country,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

    // Contact Us
    public function contactUs() {
        $cms = CmsPage::where('slug', 'contact-us')->first();

        return Inertia::render('User/Pages/ContactUs/Index', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

    public function privacyPolicy() {

        $cms = CmsPage::where('slug', 'privacy-policy')->first();

        return Inertia::render('User/Pages/GenericPage/Index', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }

    public function termsAndConditions() {

        $cms = CmsPage::where('slug', 'terms-and-conditions')->first();

        return Inertia::render('User/Pages/GenericPage/Index', [
            'cms' => $cms?->content,
        ])->withViewData([
            'title' => $cms->title,
            'description' => $cms->description,
            'og_image_path' => $cms->og_image_path ? Storage::url($cms->og_image_path) : asset('/icons/logo.png'),
            'keywords' => $cms->keywords,
        ]);
    }
}
