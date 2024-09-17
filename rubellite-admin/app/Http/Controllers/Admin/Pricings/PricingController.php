<?php

namespace App\Http\Controllers\Admin\Pricings;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Calculator\Pricing;
use App\Http\Controllers\Controller;
use App\Http\Requests\PricingManagement\PricingRequest;
use App\Http\Processors\PricingProcessor;

class PricingController extends Controller
{
    protected $pricingProcessor;
    protected $indexRoute = 'admin.pricing-management.pricings.index';

    public function __construct(PricingProcessor $pricingProcessor)
    {
        $this->pricingProcessor = $pricingProcessor;
    }

    public function index(Request $request)
    {
        $data = $this->pricingProcessor->index($request);

        return Inertia::render('Admin/PricingManagement/Pricings/Index', $data);
    }
    
    public function create()
    {
        return Inertia::render('Admin/PricingManagement/Pricings/Create', [
        ]);
    }

    public function store(PricingRequest $request)
    {
        $this->pricingProcessor->store($request);

        return to_route($this->indexRoute)
            ->with('success', 'Saved!');
    }

    public function edit(Request $request, Pricing $pricing)
    {
        return Inertia::render('Admin/PricingManagement/Pricings/Edit', [
            'item' => $pricing,
        ]);
    }

    public function update(PricingRequest $request, Pricing $pricing)
    {
        $this->pricingProcessor->update($request, $pricing);

        return to_route($this->indexRoute)
            ->with('success', 'Saved!');
    }

    public function archive(Pricing $pricing)
    {
        $pricing->delete();

        return to_route($this->indexRoute)
            ->with('success', 'Archived!');
    }

    public function restore(Request $request)
    {
        Pricing::withTrashed()->find($request->id)->restore();

        return to_route($this->indexRoute)
            ->with('success', 'Restored!');
    }
}
