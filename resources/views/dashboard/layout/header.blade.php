<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{url('/')}}">Rumah Makan Kito Basamo</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav" >
      <div class="nav-item text-nowrap align-items-center d-md-flex">
        @empty(auth()->user()->picture)
        <img src="{{asset('img/dfprofile.png')}}" alt="{{auth()->user()->name}}" style="width: 30px; height: 30px; margin-right: 10px;" class="img-fluid rounded-circle">
        @else
        <img src="{{asset('img/profil/'.auth()->user()->picture)}}" alt="{{auth()->user()->name}}" style="width: 30px; height: 30px; margin-right: 10px;" class="img-fluid rounded-circle">
        @endempty
        <p class="mt-2" style="font-size: 20px">|</p>
        <form action="/logout" method="POST">
          @csrf
          <button class="btn btn-primary" style="margin-right: 20px">Logout</button>
      </form>
      </div>
    </div>
  </header>
