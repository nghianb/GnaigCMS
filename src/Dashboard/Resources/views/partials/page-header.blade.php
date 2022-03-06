@section('page-header')
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">{{ $page->getHeaderPreTitle() }}</div>
                <h2 class="page-title">{{ $page->getHeaderTitle() }}</h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    @yield('page-actions')
                </div>
            </div>
        </div>
    </div>
@show
