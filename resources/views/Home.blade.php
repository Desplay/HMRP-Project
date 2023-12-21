<!DOCTYPE html>
<html lang="en">

<head>
@include('includes.Header')
    <title>Menu</title>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/lobby">Lobby Room </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/queue-room"> Queue Room</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </main>
    <section class="section-padding">
        @include('includes.Background')
    </section>
    <footer class="site-footer section-padding">
        @include('includes.Footer')
    </footer>
    @include('includes.Scripts')
</body>

</html>
