<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function store(ReviewRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('reviews', 'public');
        }
        
        if ($request->hasFile('country_image')) {
            $data['country_image'] = $request->file('country_image')->store('countries', 'public');
        }

        Review::create($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully.');
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('reviews', 'public');
        }
        
        if ($request->hasFile('country_image')) {
            $data['country_image'] = $request->file('country_image')->store('countries', 'public');
        }

        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }


    public function toggleActive(Review $review)
    {
        // Toggle the 'active' status of the review
        $review->update(['active' => !$review->active]);

        session()->flash('success', 'Review status updated successfully!');

        return back();
    }

}
