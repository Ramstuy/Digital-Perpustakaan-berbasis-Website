<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
  <div class="container-fluid">
    <img src="https://i.ibb.co/F0bNpT1/book-clipart-1.png" class="imgicon" alt=""><a class="navbar-brand ms-3" href="/">Digital Library</a>
      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                      <i class="bi bi-person-circle"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                      <li>
                          <a class="dropdown-item">
                            @if(auth()->user()->is_admin == 1)
                            <span class="badge rounded-pill text-bg-danger">
                                Admin
                            </span>
                            @else
                            <span class="badge rounded-pill text-bg-success">
                                User
                            </span>
                            @endif
                              <br>
                              <span class="username">
                                  Hey, <strong>{{ auth()->user()->username }}</strong>
                              </span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider" style="border-color: white">
                      </li>
                      <li>
                          <a class="dropdown-item" href="/dashboard">
                              <i class="bi bi-columns-gap me-2"></i>Dashboard
                          </a>
                      </li>
                      <li>
                          <form action="/logout" method="post">
                              @csrf
                              <button type="submit" class="dropdown-item">
                                  <i class="bi bi-box-arrow-right me-2"></i>Logout
                              </button>
                          </form>
                      </li>
                      
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
              </li>
              
              
          </ul>
      </div>
  
  </div>
</nav>