<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
<a class="navbar-brand" href="{{ route('admin.index') }}">CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
         <a class="nav-link" href="{{ route('pages.index') }}">View Frontend</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.pages') }}">Pages</a>
      </li>

    </ul>
    <div class="dropdown my-2 my-lg-0">
        <button class="btn btn-link dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }} 
        </button>
        <div class="dropdown-menu my-2 my-sm-0" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item my-2 my-sm-0" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>

  </div>
</nav>