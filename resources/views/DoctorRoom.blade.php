<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.Header')
    <title>Doctor Room</title>
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
        <section>
            <div class="container">
                <img src="{{ asset('images/profile.png') }}" class="img-fluid" alt=""
                    style="margin: auto; display: block; width: 300px; height: auto; padding-bottom: 10px;" />
                <h2 class="text-center mb-lg-3 mb-2 text-uppercase"> Doctor {{ $Doctor['name'] }} </h2>
            </div>
            @php
                $Patients = $Doctor['queue'];
            @endphp
            @if ($Patients)
                @include('includes.TableDoctorRoom')
            @endif
        </section>
    </main>
    <footer class="site-footer section-padding">
        @include('includes.Footer')
    </footer>
    @include('includes.Scripts')
    <script src="{% static './clients/DoctorRoom.socket.js' %}"></script>
</body>

</html>
