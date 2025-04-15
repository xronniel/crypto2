<form action="{{ isset($page) ? route('admin.mortgage-landing-page.update', $page) : route('admin.mortgage-landing-page.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($page))
        @method('PUT')
    @endif

    <!-- Hero Title -->
    <label for="hero_title" class="form-label">Hero Title</label>
    <input type="text" id="hero_title" name="hero_title" value="{{ old('hero_title', $page->hero_title ?? '') }}" placeholder="Hero Title" class="form-control mb-2">

    <!-- Trust Section Title -->
    <label for="trust_section_title" class="form-label">Trust Section Title</label>
    <input type="text" id="trust_section_title" name="trust_section_title" value="{{ old('trust_section_title', $page->trust_section_title ?? '') }}" placeholder="Trust Section Title" class="form-control mb-2">

    <!-- Trust Section Image -->
    <label for="trust_section_image" class="form-label">Trust Section Image</label>
    @if(isset($page) && $page->trust_section_image)
        <div class="mb-2">
             <img src="{{ asset('storage/' . $page->trust_section_image) }}" alt="Trust Image" width="150">
        </div>
    @endif
    <input type="file" id="trust_section_image" name="trust_section_image" class="form-control mb-2">

    <!-- Step Section Title -->
    <label for="step_section_title" class="form-label">Step Section Title</label>
    <input type="text" id="step_section_title" name="step_section_title" value="{{ old('step_section_title', $page->step_section_title ?? '') }}" placeholder="Step Section Title" class="form-control mb-4">

    <h5>Trust Items</h5>
    <div id="trust-items-wrapper">
        @if(isset($page))
            @foreach($page->trustItems as $item)
                <div class="trust-item-row mb-3 border p-2 rounded">
                    <input type="hidden" name="trust_items[{{ $loop->index }}][id]" value="{{ $item->id }}">

                    <!-- Icon Preview -->
                    @if($item->icon)
                        <label class="form-label d-block">Current Icon</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $item->icon) }}" width="50" alt="Icon">
                        </div>
                    @endif

                    <!-- Icon Upload -->
                    <label class="form-label">Upload Icon</label>
                    <input type="file" name="trust_items[{{ $loop->index }}][icon]" class="form-control mb-2">

                    <!-- Description -->
                    <label class="form-label">Description</label>
                    <input type="text" name="trust_items[{{ $loop->index }}][description]" value="{{ $item->description }}" placeholder="Description" class="form-control mb-2">

                    <button type="button" class="btn btn-danger btn-sm remove-trust-item">X</button>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Add Trust Item Button -->
    <button type="button" id="add-trust-item" class="btn btn-outline-primary btn-sm mt-2">
        <i class="bi bi-plus-circle me-1"></i> Add Trust Item
    </button>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-success btn-lg px-5">
            <i class="bi bi-save me-2"></i> Save
        </button>
    </div>
</form>

<script>
    let trustItemIndex = {{ isset($page) ? $page->trustItems->count() : 0 }};
    document.getElementById('add-trust-item').addEventListener('click', function () {
        const wrapper = document.getElementById('trust-items-wrapper');
        const html = `
            <div class="trust-item-row mb-3 border p-2 rounded">
                <label class="form-label">Upload Icon</label>
                <input type="file" name="trust_items[${trustItemIndex}][icon]" class="form-control mb-2">
                
                <label class="form-label">Description</label>
                <input type="text" name="trust_items[${trustItemIndex}][description]" placeholder="Description" class="form-control mb-2">
                
                <button type="button" class="btn btn-danger btn-sm remove-trust-item">X</button>
            </div>
        `;
        wrapper.insertAdjacentHTML('beforeend', html);
        trustItemIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-trust-item')) {
            e.target.closest('.trust-item-row').remove();
        }
    });
</script>
