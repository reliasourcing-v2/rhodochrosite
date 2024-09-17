<?php

namespace App\Http\Processors;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Articles\Article;
use Illuminate\Http\UploadedFile;
use App\Traits\FileUploadHelperTrait;
use Illuminate\Foundation\Http\FormRequest;

class ArticleProcessor extends BaseRenderer
{
    use FileUploadHelperTrait;

    # index
    public function index(Request $request): array
    {
        $data = $this->getData($request, new Article());
        $data['items'] = $data['items']
        ->paginate(request('rows') ?? 10)
        ->appends(request()->query());

        return $data;
    }

    public function store(FormRequest $request)
    {
        $data = $request->validated();
        if (empty($request->slug)) {
            $data['slug'] = Str::slug($request->title);
        } else {
            $data['slug'] = Str::slug($request->slug);
        }
        $data['banner_image_path'] = $this->getImagePath($request->banner_image_path, 'articles');
        $data['meta_image'] = $this->getImagePath($request->meta_image, 'articles');

        
        if ($data['is_highlight']) {
            Article::where('is_highlight', true)->update(['is_highlight' => false]);
        }

        $detail = Article::create($data);
    }

    public function update(FormRequest $request, Article $detail)
    {
        $data = $request->validated();
        if (empty($request->slug)) {
            $data['slug'] = Str::slug($request->title);
        } else {
            $data['slug'] = Str::slug($request->slug);
        }
        $data['banner_image_path'] = $this->getImagePath($request->banner_image_path, 'articles');
        $data['meta_image'] = $this->getImagePath($request->meta_image, 'articles');

        if ($data['is_highlight']) {
            Article::where('is_highlight', true)->update(['is_highlight' => false]);
        }

        $detail->update($data);

    }

    private function getImagePath($image, $folder): ?string
    {
        if ($image instanceof UploadedFile && $image->isFile()) {
            return $this->fileUploader($image, $folder);
        }
        
        return $image ? $image : null;
    }

    
}