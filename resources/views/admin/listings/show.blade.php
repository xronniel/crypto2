@extends('layouts.back-office.app')

@section('content')
<div class="report-container pt-2">
    <h1>Listing Details</h1>
    <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary mb-3">Back to Listings</a>

    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">Basic Information</h4>
            <div class="row">
                @foreach($fillable as $column)
                    <div class="col-md-6 mb-3">
                        <strong>{{ ucfirst(str_replace('_', ' ', $column)) }}:</strong>
                        @if(in_array($column, ['exclusive', 'featured', 'price_on_application', 'off_plan', 'new', 'verified', 'superagent', 'xml']))
                            {{ $listing->$column ? 'Yes' : 'No' }}
                        @elseif(strpos($column, 'price') !== false || strpos($column, 'area') !== false)
                            AED {{ number_format($listing->$column, 2) }}
                        @elseif(strpos($column, 'date') !== false || strpos($column, 'updated_at') !== false || strpos($column, 'created_at') !== false)
                            {{ $listing->$column ? \Carbon\Carbon::parse($listing->$column)->format('d M Y') : 'N/A' }}
                        @elseif($column == 'type')
                            {{ $listing->$column ?? 'N/A' }}
                        @elseif($column == 'listing_agent_photo' || $column == 'company_logo' || $column == 'qr_code')
                            @if($listing->$column)
                                <img src="{{ asset($listing->$column) }}" alt="{{ $column }}" class="img-fluid" width="150">
                            @else
                                N/A
                            @endif
                        @elseif($column == 'web_remarks')
                            {!! $listing->$column ?: '<p>N/A</p>' !!}
                        @elseif($column == 'description')
                            <p>{{ $listing->$column ?: 'N/A' }}</p>
                        @else
                            {{ $listing->$column ?: 'N/A' }}
                        @endif
                    </div>
                @endforeach
            </div>

            <hr>

            <!-- Facilities Section -->
            <h4 class="mt-4">Facilities</h4>
            @if($listing->facilities->isNotEmpty())
                <ul>
                    @foreach($listing->facilities as $facility)
                        <li>{{ $facility->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>No facilities added.</p>
            @endif

            <hr>

            <!-- Images Section -->
            <h4 class="mt-4">Images</h4>
            <div class="row">
                @if($listing->images->isNotEmpty())
                    @foreach($listing->images as $image)
                        <div class="col-md-3 mb-3">
                            @if($listing->xml)
                                <!-- Use direct URL if XML is 1 -->
                                <img src="{{ $image->url }}" alt="Image" class="img-fluid" style="max-height: 200px;">
                            @else
                                <!-- Use storage path if XML is not 1 -->
                                <img src="{{ asset('storage/' . $image->url) }}" alt="Image" class="img-fluid" style="max-height: 200px;">
                            @endif
                        </div>
                    @endforeach
                @else
                    <p class="col-md-12">No images available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection