<div
class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary vh-100"
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
          <button class="dropdown-item">Sign out</button>
        </li>
      </form>
    </ul>
  </h5>
    
  </div>
</a>
<hr />
<ul class="nav nav-pills flex-column mb-auto">
  <li class="nav-item ">
    <a href="index.html" class="nav-link link-body-emphasis">
      <i class="bi bi-speedometer2 me-1"></i>
      Dashboard
    </a>
  </li>
  <li>
    <a href="manage.html" class="nav-link active" aria-current="page">
      <i class="bi bi-building-gear me-1"></i>
      Manage Room
    </a>
  </li>
  <li>
    <a href="#" class="nav-link link-body-emphasis">
      <i class="bi bi-calendar2-range me-1"></i>
      Move Schadule
    </a>
  </li>
  <li>
    <a href="#" class="nav-link link-body-emphasis">
      <i class="bi bi-file-earmark-arrow-down"></i>
      Report
    </a>
  </li>
</ul>
<hr>
</div>