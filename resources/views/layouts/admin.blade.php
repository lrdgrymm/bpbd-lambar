<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel BPBD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
</head>
<body>
    <div class="admin-wrapper">
        @include('partials.admin-sidebar')
        <div class="admin-main-content">
            <header class="admin-header">
                <h2>@yield('title')</h2>
                <div class="admin-user-info">
                    <span>{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" title="Log Out">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </form>
                </div>
            </header>
            <div class="admin-content-area">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>