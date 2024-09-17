<?php

namespace App\Http\Controllers\Admin\Contents;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class CmsPageController extends Controller
{
    /**
     * Admin index
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Admin/CMS/Index', [
            'items' => CmsPage::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Inertia\Response
     */
    public function edit(CmsPage $cmsPage, Request $request)
    {
        $schema = Arr::where(config('cms.schema'), function ($page) use ($cmsPage) {
            return $page['slug'] === $cmsPage->slug;
        });

        $schema = reset($schema); // get first element

        return Inertia::render('Admin/CMS/Edit', [
            'page' => $cmsPage,
            'schema' => $schema,
            'selectedTab' => $request->input('tab'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsPage $cmsPage)
    {
        $schema = Arr::where(config('cms.schema'), function ($page) use ($cmsPage) {
            return $page['slug'] === $cmsPage->slug;
        });

        $schema = reset($schema); // get first element

        $this->validateRules($schema, $request);
        $this->populateData($schema, $request, $cmsPage);

        $cmsPage->save();

        return to_route('admin.cms.edit', ['cmsPage' => $cmsPage->id])
            ->with('success', $cmsPage->label . ' successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Populate Page
     *
     * @param array  $schema
     * @return json
     */
    protected function populateData($schema, $request, &$cmsPage)
    {
        $cmsPage->content = $this->buildContent($schema, $request);

        $cmsPage->title = $request->title;
        $cmsPage->description = $request->description;
        $cmsPage->keywords = $request->keywords;

        if ($request->hasFile('og_image_path')) {
            $file = $request->file('og_image_path');
            $path = $file->store('cms_images');
            $cmsPage->og_image_path = $path;
        }
        
        $cmsPage->robots_follow = $request->robots_follow;
        $cmsPage->robots_index = $request->robots_index;
    }

    /**
     * Validate
     *
     * @param array  $schema
     * @return json
     */
    protected function buildContent($schema, $request)
    {
        $content = [];
        foreach ($schema['sections'] as $section) {
            foreach ($section['items'] as $item) {
                $key = "{$section['id']}_{$item['id']}";
                switch ($item['type']) {
                    case 'text':
                    case 'textarea':
                    case 'checkbox':
                    case 'url':
                        $content[$key] = $request->$key;
                        break;
                    case 'htmleditor':
                        $content[$key] = $request->$key;
                    case 'image':
                        $file_key = $key . '_file';
                        $content[$key] = $request->$file_key ? $request->$file_key->store('cms_images') : $request->$key;
                        break;
                    case 'list_table':
                        $content[$key] = [];
                        $key_check = $key . "_{$item['items'][0]['id']}";
                        $length = is_array($request->$key_check) ? count($request->$key_check) : 0;
                        for ($i = 0; $i < $length; $i++) {
                            $item_array = [];
                            foreach ($item['items'] as $list_item) {
                                $item_key = $key . "_{$list_item['id']}";
                                switch ($list_item['type']) {
                                    case 'text':
                                    case 'textarea':
                                    case 'checkbox':
                                    case 'url':
                                        $item_array[$list_item['id']] = $request->$item_key[$i];
                                        break;
                                    case 'htmleditor':
                                        $item_array[$list_item['id']] = $request->$item_key[$i];
                                        break;
                                    case 'image':
                                        $file_key = $item_key . '_file';
                                        $item_array[$list_item['id']] = $request->$file_key[$i] ? $request->$file_key[$i]->store('cms_images') : $request->$item_key[$i];
                                        break;
                                }
                            }
                            array_push($content[$key], $item_array);
                        }
                        break;
                }
            }
        }
        return $content;
    }
    /**
     * Validate
     *
     * @param array  $schema
     * @return void
     */
    protected function validateRules($schema, $request)
    {
        $rules = [];
        foreach ($schema['sections'] as $section) {
            foreach ($section['items'] as $item) {
                if (array_key_exists('rules', $item)) {
                    switch ($item['type']) {
                        case 'text':
                        case 'textarea':
                        case 'checkbox':
                        case 'url':
                            $rules["{$section['id']}_{$item['id']}"] = $item['rules'];
                            break;
                        case 'image':
                            # Apply file rules if string component is null
                            if ($request->{"{$section['id']}_{$item['id']}"} === null) {
                                $rules["{$section['id']}_{$item['id']}_file"] = $item['rules'];
                            }
                            break;
                    }
                }
            }
        }

        $request->validate($rules);
    }
}
