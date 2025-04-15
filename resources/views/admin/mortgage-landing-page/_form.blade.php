<form action="{{ isset($page) ? route('admin.mortgage-landing-page.update', $page) : route('admin.mortgage-landing-page.store') }}" method="POST">
    @csrf
    @if(isset($page))
        @method('PUT')
    @endif

    <!-- Hero Title -->
    <input type="text" name="hero_title" value="{{ old('hero_title', $page->hero_title ?? '') }}" placeholder="Hero Title" class="form-control mb-2">

    <!-- Trust Section Title -->
    <input type="text" name="trust_section_title" value="{{ old('trust_section_title', $page->trust_section_title ?? '') }}" placeholder="Trust Section Title" class="form-control mb-2">

    <!-- Trust Section Image -->
    <input type="text" name="trust_section_image" value="{{ old('trust_section_image', $page->trust_section_image ?? '') }}" placeholder="Trust Section Image URL" class="form-control mb-2">

    <!-- Step Section Title -->
    <input type="text" name="step_section_title" value="{{ old('step_section_title', $page->step_section_title ?? '') }}" placeholder="Step Section Title" class="form-control mb-4">

    <h5>Trust Items</h5>
    <div id="trust-items-wrapper">
        @if(isset($page))
            @foreach($page->trustItems as $item)
                <div class="trust-item-row mb-2">
                    <input type="hidden" name="trust_items[{{ $loop->index }}][id]" value="{{ $item->id }}">
                    <input type="text" name="trust_items[{{ $loop->index }}][icon]" value="{{ $item->icon }}" placeholder="Icon (optional)">
                    <input type="text" name="trust_items[{{ $loop->index }}][description]" value="{{ $item->description }}" placeholder="Description">
                    <button type="button" class="btn btn-danger btn-sm remove-trust-item">X</button>
                </div>
            @endforeach
        @endif
    </div>

    <button type="button" id="add-trust-item" class="btn btn-secondary btn-sm">+ Add Trust Item</button>

    <button type="submit" class="btn btn-success mt-4">Save</button>
</form>

<script>
    let trustItemIndex = {{ isset($page) ? $page->trustItems->count() : 0 }};
    document.getElementById('add-trust-item').addEventListener('click', function () {
        const wrapper = document.getElementById('trust-items-wrapper');
        const html = `
            <div class="trust-item-row mb-2">
                <input type="text" name="trust_items[${trustItemIndex}][icon]" placeholder="Icon (optional)">
                <input type="text" name="trust_items[${trustItemIndex}][description]" placeholder="Description">
                <button type="button" class="btn btn-danger btn-sm remove-trust-item">X</button>
            </div>
        `;
        wrapper.insertAdjacentHTML('beforeend', html);
        trustItemIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-trust-item')) {
            e.target.parentElement.remove();
        }
    });
</script>
