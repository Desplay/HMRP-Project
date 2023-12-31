<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.Header')
    <title>404 not found</title>
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
      <div class="contain-fluid text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <a href="/">← Back to Home</a>
      </div>
    </main>
    <footer class="site-footer section-padding">@include('includes.Footer')</footer>
    @include('includes.Scripts')
  </body>
</html>
