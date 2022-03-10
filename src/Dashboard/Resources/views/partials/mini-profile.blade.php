@php($user = auth()->user())
<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
    <span class="avatar avatar-sm bg-primary fs-3">{{ $user->fullname[0] ?? '' }}</span>
    <div class="d-none d-xl-block ps-2">
        <div>{{ $user->fullname }}</div>
        <div class="mt-1 small text-muted">Member</div>
    </div>
</a>
<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
    <a href="{{ route('me.show') }}" class="dropdown-item">Profile</a>
    <a href="{{ route('login.logout') }}" class="dropdown-item">Logout</a>
</div>
