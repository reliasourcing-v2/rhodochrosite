<?php

namespace App\Http\Processors;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Modular\Frame;
use App\Models\Modular\Card;
use Illuminate\Http\UploadedFile;
use App\Traits\FileUploadHelperTrait;
use Illuminate\Foundation\Http\FormRequest;

class FrameProcessor extends BaseRenderer
{
    use FileUploadHelperTrait;

    # index
    public function index(Request $request): array
    {
        $data = $this->getData($request, new Frame());
        $data['items'] = $data['items']
        ->paginate(request('rows') ?? 10)
        ->appends(request()->query());

        return $data;
    }

    public function store(FormRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->getImagePath($request->image, 'frame');

        $frame = Frame::create($data);

        return redirect()
        ->route('admin.pages.parent.index')
        ->with('success', 'Frame successfully created!');

    }

    public function update(FormRequest $request, Frame $frame)
    {
        $data = $request->validated();
        $data['image'] = $this->getImagePath($request->image, 'frame');

        $frame->update($data);

    }

    private function getImagePath($image, $folder): ?string
    {
        if ($image instanceof UploadedFile && $image->isFile()) {
            return $this->fileUploader($image, $folder);
        }
        
        return $image ? $image : null;
    }

    public function storeCard(FormRequest $request, Frame $frame)
    {
        $data = $request->validated();
        $data['frame_id'] = $frame->id;
        $data['image'] = $this->getImagePath($request->image, 'modular-frame-card-images');
        
        $card = Card::create($data);
       
    }

    public function updateCard(FormRequest $request, Card $card)
    {
        $data = $request->validated();
        $data['image'] = $this->getImagePath($request->image, 'modular-frame-card-images');
        $card->update($data);
       
    }
}