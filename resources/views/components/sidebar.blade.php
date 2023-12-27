<div
class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary vh-100 sticky-top"
style="width: 300px"
>
<a
  href="/"
  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
>
  <div class="dropdown">
    <h5>
    <a
      href="#"
      class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
      data-bs-toggle="dropdown"
      aria-expanded="false"
    >

    <i class="bi bi-person-circle me-2"></i>
      {{ auth()->user()->name }}
    </a>
    <ul class="dropdown-menu text-small shadow mt-2">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <li>
          <button class="dropdown-item">Logout</button>
        </li>
      </form>
    </ul>
  </h5>
    
  </div>
</a>
<hr />
<ul class="nav nav-pills flex-column mb-auto">
  <li class="nav-item ">
    <a href="/" class="nav-link link-body-emphasis">
      <i class="bi bi-speedometer2 me-1"></i>
      Halaman Utama
    </a>
  </li>
  <li>
    <a href="{{ route('labs.index') }}" class="nav-link {{ request()->routeIs('labs.*') ? 'active' : 'link-body-emphasis' }}">
      <i class="bi bi-building-gear me-1"></i>
      Atur Ruangan
    </a>
  </li>
  <li>
    <a href="{{ route('class-schedule.index') }}" class="nav-link {{ request()->routeIs('class-schedule.*') ? 'active' : 'link-body-emphasis' }}">
      <i class="bi bi-calendar3"></i>
      Jadwal Kelas
    </a>
  </li>
  <li>
    <a href="{{ route('reschedule.index') }}" class="nav-link {{ request()->routeIs('reschedule.*') ? 'active' : 'link-body-emphasis' }}">
      <i class="bi bi-calendar2-range me-1"></i>
      Pindah Jadwal
    </a>
  </li>
  <li>
    <a href="{{ route('report') }}" class="nav-link {{ request()->routeIs('report') ? 'active' : 'link-body-emphasis' }}">
      <i class="bi bi-file-earmark-arrow-down"></i>
      Laporan
    </a>
  </li>
  <li>
    <a href="{{ route('lecturer.create') }}" class="nav-link {{ request()->routeIs('lecturer.*') ? 'active' : 'link-body-emphasis' }}">
      <i class="bi bi-person-plus"></i>
      Dosen
    </a>
  </li>
</ul>
<hr>
</div>