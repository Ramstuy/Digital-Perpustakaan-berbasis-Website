<div class="sidebar col-md-3 col-lg-2 p-0" id="customSidebar">
  <div class="d-block" tabindex="0" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="d-md-flex flex-column">
        <span><h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-2 text-muted">User</h6></span>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link nav-linke {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-columns-gap me-2"></i>
            <span>Dashboard</span>
          </a>
        </li>
        @if(auth()->user()->is_admin == 1)
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-2 text-muted">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link nav-linke {{ Request::is('dashboard/books*') ? 'active' : '' }}" href="/dashboard/books">
            <i class="bi bi-book me-2"></i>
            <span>Books</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-linke {{ Request::is('dashboard/categories*') ? 'active' : '' }}" aria-current="page" href="/dashboard/categories">
            <i class="bi bi-tags me-2"></i>
            <span>Book Categories</span>
          </a>
        </li>
        </ul>
        </ul>
            @else
            <li class="nav-item">
              <a class="nav-link nav-linke {{ Request::is('dashboard/books*') ? 'active' : '' }}" href="/dashboard/books">
                <i class="bi bi-book me-2"></i>
                <span>My Books</span>
              </a>
            </li>
          </ul>
            @endif
    </div>
  </div>
</div>
