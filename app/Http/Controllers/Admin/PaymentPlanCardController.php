<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\PaymentPlanCard;
use Illuminate\Http\Request;

class PaymentPlanCardController extends Controller
{
    public function index(Listing $listing)
    {
        $paymentPlanCards = $listing->paymentPlanCards;
        return view('admin.payment-plan-cards.index', compact('listing', 'paymentPlanCards'));
    }

    public function create(Listing $listing)
    {
        return view('admin.payment-plan-cards.create', compact('listing'));
    }

    public function store(Request $request, Listing $listing)
    {
        $validated = $request->validate([
            'payment_plan_name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
            'text' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $listing->paymentPlanCards()->create($validated);

        return redirect()->route('admin.listings.payment-plan-cards.index', $listing)
            ->with('success', 'Payment plan card created successfully.');
    }

    public function edit(Listing $listing, PaymentPlanCard $paymentPlanCard)
    {
        return view('admin.payment-plan-cards.edit', compact('listing', 'paymentPlanCard'));
    }

    public function update(Request $request, Listing $listing, PaymentPlanCard $paymentPlanCard)
    {
        $validated = $request->validate([
            'payment_plan_name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
            'text' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $paymentPlanCard->update($validated);

        return redirect()->route('admin.listings.payment-plan-cards.index', $listing)
            ->with('success', 'Payment plan card updated successfully.');
    }

    public function destroy(Listing $listing, PaymentPlanCard $paymentPlanCard)
    {
        $paymentPlanCard->delete();

        return redirect()->route('admin.listings.payment-plan-cards.index', $listing)
            ->with('success', 'Payment plan card deleted successfully.');
    }
}
