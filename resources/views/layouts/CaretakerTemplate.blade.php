<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="Stylesheet" href="/css/base.css">
    <link rel="Stylesheet" href="/css/userinterface.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <div class="page">
        <div class="user-sidebar">
            <div class="user-sidebar-top-container">
                    <img src="/assets/cat database logo.jpg" class="user-sidebar-logo">
                @php
                    use Illuminate\Support\Facades\Auth;

                    $user = Auth::user();
                @endphp
                @if ($user->caretaker->manager_id!=null)
                    <div class="user-sidebar-list">
                    <a href="{{route('caretaker.catActivity.sanctuaryList')}}">
                        <div class="user-sidebar-list-item-{{ ($page=='catActivity') ? 'selected' : 'notselected' }}">
                            Cats' Activity
                        </div>
                    </a>
                    <a href="{{route('caretaker.sanctuaryTask.sanctuaryList')}}">
                        <div class="user-sidebar-list-item-{{ ($page=='sanctuaryTask') ? 'selected' : 'notselected' }}">
                            Sanctuary Task
                        </div>
                    </a>
                    <a href="{{route('caretaker.adoptions.sanctuaryList')}}">
                        <div class="user-sidebar-list-item-{{($page=='adoptions') ? 'selected' : 'notselected' }}">
                            Adoptions
                        </div>
                    </a>
                    <a href="{{route('caretaker.requestSupply.list')}}">
                        <div class="user-sidebar-list-item-{{ ($page=='requestSupplies') ? 'selected' : 'notselected' }}">
                            Request Supplies
                        </div>
                    </a>
                    <a href="{{route("caretaker.feedback")}}">
                        <div class="user-sidebar-list-item-{{ ($page=='feedback') ? 'selected' : 'notselected' }}">
                            Feedback
                        </div>
                    </a>
                </div>
                @endif

            </div>
            <a href="{{route('logout.get')}}">
                <div class="user-sidebar-logout">
                Log Out
                </div>
            </a>
        </div>
        <div class="user-main">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
