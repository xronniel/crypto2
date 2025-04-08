<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="text" 
           id="{{ $id }}-input"
           name="{{ $name }}"
           class="form-control"
           placeholder="Type and press Enter to add tags">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('{{ $id }}-input');
    // Get all existing tags for suggestions
    const existingTags = @json($existingTags->pluck('name'));
    // Get selected tags for current item (if editing)
    const selectedTags = @json(isset($tags) && is_object($tags) ? $tags->map(function($tag) { return ['value' => $tag->name]; })->toArray() : []);

    console.log('Existing tags:', existingTags);
    console.log('Selected tags:', selectedTags);

    const tagify = new Tagify(input, {
        enforceWhitelist: false,
        delimiters: ',',
        hooks: {
            beforeKeydown: function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    return false;
                }
            }
        },
        whitelist: existingTags.map(tag => ({ value: tag })),
        dropdown: {
            enabled: 1,
            maxItems: 10,
            position: 'text',
            closeOnSelect: false
        }
    });

    // Add existing tags after Tagify is initialized
    if (selectedTags.length > 0) {
        tagify.addTags(selectedTags);
    }
});
</script>