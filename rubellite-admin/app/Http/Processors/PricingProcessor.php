<?php

namespace App\Http\Processors;

use Illuminate\Http\Request;
use App\Models\Calculator\Pricing;
use App\Traits\FileUploadHelperTrait;
use Illuminate\Foundation\Http\FormRequest;

class PricingProcessor extends BaseRenderer
{
    use FileUploadHelperTrait;

    # index
    public function index(Request $request): array
    {
        $data = $this->getData($request, new Pricing());
        $data['items'] = $data['items']
        ->paginate(request('rows') ?? 10)
        ->appends(request()->query());

        return $data;
    }

    public function store(FormRequest $request)
    {
        $data = $request->validated();
        $detail = Pricing::create($data);
    }

    public function update(FormRequest $request, Pricing $detail)
    {
        $data = $request->validated();

        $detail->update($data);

    }

    
}