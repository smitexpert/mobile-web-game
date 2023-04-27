<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    @stack('styles')
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 100px">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Upload Challenge</a>
                    <a href="{{ route('visitor') }}" class="list-group-item list-group-item-action">Visitors</a>
                    <a href="{{ route('visitor.analytics') }}" class="list-group-item list-group-item-action">Analytics</a>
                    <a href="{{ route('social-visit') }}" class="list-group-item list-group-item-action">Social Visits</a>
                  </div>
            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
