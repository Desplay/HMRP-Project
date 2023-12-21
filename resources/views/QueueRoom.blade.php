<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.Header')
    <title>Queue Room</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/lobby">Lobby Room </a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand d-none d-lg-block" href="/queue-room"> Queue Room</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container-fluid">
            <div class="row">
                @include('includes.DoctorCard')
                @if ($Patients)
                    @include('includes.TableQueue')
                @endif
            </div>
        </div>
    </section>
    <footer class="site-footer section-padding">@include('includes.Footer')</footer>
    @include('includes.Scripts')
</body>

</html>
