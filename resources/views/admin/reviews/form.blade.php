<div class="mb-3">
    <label class="form-label">Reviewer Name</label>
    <input type="text" name="reviewer_name" class="form-control" value="{{ old('reviewer_name', $review->reviewer_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Country Name</label>
    <input type="text" name="country_name" class="form-control" value="{{ old('country_name', $review->country_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Reviewer Details</label>
    <input type="text" name="reviewer_details" class="form-control" value="{{ old('reviewer_details', $review->reviewer_details ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Review</label>
    <textarea name="review" class="form-control" required>{{ old('review', $review->review ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Country Image</label>
    <input type="file" name="country_image" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Active</label>
    <select name="active" class="form-control">
        <option value="1" {{ old('active', $review->active ?? 1) == 1 ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ old('active', $review->active ?? 1) == 0 ? 'selected' : '' }}>No</option>
    </select>
</div>
