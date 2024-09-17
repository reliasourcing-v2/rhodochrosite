<?php

namespace App\Http\Processors;

use App\Models\Modular\Card;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Modular\ParentPage;
use App\Models\Modular\Frame;
use App\Models\Modular\SubPage;
use Illuminate\Http\UploadedFile;
use App\Traits\FileUploadHelperTrait;
use Illuminate\Foundation\Http\FormRequest;

class ParentPageProcessor extends BaseRenderer
{
    use FileUploadHelperTrait;

    # index
    public function index(Request $request): array
    {
        $data = $this->getData($request, new ParentPage());
        $data['items'] = $data['items']
        ->paginate(request('rows') ?? 10)
        ->appends(request()->query());

        return $data;
    }

    public function store(FormRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $this->getImagePath($request->image, 'details');
        $data['meta_image'] = $this->getImagePath($request->meta_image, 'details');

        $detail = ParentPage::create($data);
    }

    public function update(FormRequest $request, ParentPage $detail)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $this->getImagePath($request->image, 'details');
        $data['meta_image'] = $this->getImagePath($request->meta_image, 'details');

        $detail->update($data);

    }

    private function getImagePath($image, $folder): ?string
    {
        if ($image instanceof UploadedFile && $image->isFile()) {
            return $this->fileUploader($image, $folder);
        }
        
        return $image ? $image : null;
    }

    public function storeFrame(FormRequest $request, ParentPage $parentPage)
    {
        $data = $request->validated();
        $data['parent_page_id'] = $parentPage->id;
        $data['image'] = $this->getImagePath($request->image, 'modular-frame-images');
        
        $frame = Frame::create($data);

    }

    public function updateFrame(FormRequest $request, Frame $frame)
    {
        $data = $request->validated();
        $data['image'] = $this->getImagePath($request->image, 'modular-frame-images');
        $frame->update($data);

    }

    public function storeCard(FormRequest $request, Frame $frame)
    {
        $data = $request->validated();
        $data['frame_id'] = $frame->id;
        $data['image'] = $this->getImagePath($request->image, 'modular-frame-card-images');
        $data['icon'] = $this->getImagePath($request->icon, 'modular-frame-card-images');
        
        $frame = Card::create($data);

    }

    public function updateCard(FormRequest $request, Card $card)
    {
        $data = $request->validated();
        $data['image'] = $this->getImagePath($request->image, 'modular-frame-card-images');
        $data['icon'] = $this->getImagePath($request->icon, 'modular-frame-card-images');
        $card->update($data);

    }
}