<div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0" style="z-index: 2000">
    <div class="toast-container mt-5">
        @foreach($toaster->getToasts() as $toast)
            <div x-data="{ visible: true }" x-show="visible" x-init="setTimeout(() => visible = false, 2000)"
                class="toast align-items-center text-white bg-{{ $toast->getType() }} border-0 fade show"
                role="alert" aria-live="polite" aria-atomic="true"
            >
                <div class="d-flex">
                    <div class="toast-body">{{ $toast->getMessage() }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endforeach
    </div>
</div>
