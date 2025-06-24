{{-- 
    Breadcrumb Component
    
    Usage example:
    @include('backend.includes.breadcrumb', [
        'title' => 'Dashboard',
        'subtitle' => 'Overview',
        'breadcrumbs' => [
            ['name' => 'Home', 'url' => route('dashboard')],
            ['name' => 'Dashboard', 'active' => true]
        ]
    ])
--}}

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                {{ $title ?? 'Home' }} - <span class="fw-normal">{{ $subtitle ?? 'Dashboard' }}</span>
            </h4>
            <a href="#page_header"
               class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
               data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>
    </div>
    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                
                @if(isset($breadcrumbs) && is_array($breadcrumbs))
                    @foreach($breadcrumbs as $breadcrumb)
                        @if(isset($breadcrumb['active']) && $breadcrumb['active'])
                            <span class="breadcrumb-item active">{{ $breadcrumb['name'] }}</span>
                        @else
                            <a href="{{ $breadcrumb['url'] ?? '#' }}" class="breadcrumb-item">{{ $breadcrumb['name'] }}</a>
                        @endif
                    @endforeach
                @else
                    {{-- Default breadcrumb if none provided --}}
                    <a href="#" class="breadcrumb-item">{{ $title ?? 'Home' }}</a>
                    <span class="breadcrumb-item active">{{ $subtitle ?? 'Dashboard' }}</span>
                @endif
            </div>
            <a href="#breadcrumb_elements"
               class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
               data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>
    </div>
</div>
<!-- /page header -->