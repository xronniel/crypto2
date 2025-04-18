<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\PaymentPlanTimeline;
use Illuminate\Http\Request;

class PaymentPlanTimelineController extends Controller
{
    public function index(Listing $listing)
    {
        $paymentPlanTimelines = $listing->paymentPlanTimelines;
        return view('admin.payment-plan-timelines.index', compact('listing', 'paymentPlanTimelines'));
    }

    public function create(Listing $listing)
    {
        return view('admin.payment-plan-timelines.create', compact('listing'));
    }

    public function store(Request $request, Listing $listing)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:active,inactive'
        ]);

        $listing->paymentPlanTimelines()->create($validated);

        return redirect()->route('admin.listings.payment-plan-timelines.index', $listing)
            ->with('success', 'Payment plan timeline created successfully.');
    }

    public function edit(Listing $listing, PaymentPlanTimeline $paymentPlanTimeline)
    {
        return view('admin.payment-plan-timelines.edit', compact('listing', 'paymentPlanTimeline'));
    }

    public function update(Request $request, Listing $listing, PaymentPlanTimeline $paymentPlanTimeline)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:active,inactive'
        ]);

        $paymentPlanTimeline->update($validated);

        return redirect()->route('admin.listings.payment-plan-timelines.index', $listing)
            ->with('success', 'Payment plan timeline updated successfully.');
    }

    public function destroy(Listing $listing, PaymentPlanTimeline $paymentPlanTimeline)
    {
        $paymentPlanTimeline->delete();

        return redirect()->route('admin.listings.payment-plan-timelines.index', $listing)
            ->with('success', 'Payment plan timeline deleted successfully.');
    }
}
