  <!-- Main navbar -->
  <div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
      <div class="container-fluid">
          <div class="d-flex d-lg-none me-2">
              <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                  <i class="ph-list"></i>
              </button>
          </div>

          <div class="navbar-brand flex-1 flex-lg-0">
              <a href="index.html" class="d-inline-flex align-items-center">
                  <img src="{{ url('limitless4.0/assets/images/logo_icon.svg') }}" alt="">
                  <img src="{{ url('limitless4.0/assets/images/logo_text_light.svg') }}"
                      class="d-none d-sm-inline-block h-16px ms-3" alt="">
              </a>
          </div>

          <ul class="nav flex-row">
              <li class="nav-item d-lg-none">
                  <a href="#navbar_search" class="navbar-nav-link navbar-nav-link-icon rounded-pill"
                      data-bs-toggle="collapse">
                      <i class="ph-magnifying-glass"></i>
                  </a>
              </li>
          </ul>

          <ul class="nav flex-row justify-content-end order-1 order-lg-2">
              <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                  <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1"
                      data-bs-toggle="dropdown">
                      <div class="status-indicator-container">
                          <img src="{{ url('limitless4.0/assets/images/demo/users/face11.jpg') }}"
                              class="w-32px h-32px rounded-pill" alt="">
                          <span class="status-indicator bg-success"></span>
                      </div>
                      <span class="d-none d-lg-inline-block mx-lg-2">Victoria</span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-end">
                      <a href="#" class="dropdown-item">
                          <i class="ph-user-circle me-2"></i>
                          My profile
                      </a>
                      <a href="#" class="dropdown-item">
                          <i class="ph-currency-circle-dollar me-2"></i>
                          My subscription
                      </a>
                      <a href="#" class="dropdown-item">
                          <i class="ph-shopping-cart me-2"></i>
                          My orders
                      </a>
                      <a href="#" class="dropdown-item">
                          <i class="ph-envelope-open me-2"></i>
                          My inbox
                          <span class="badge bg-primary rounded-pill ms-auto">26</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                          <i class="ph-gear me-2"></i>
                          Account settings
                      </a>
                      <a href="#" class="dropdown-item">
                          <i class="ph-sign-out me-2"></i>
                          Logout
                      </a>
                  </div>
              </li>
          </ul>
      </div>
  </div>
  <!-- /main navbar -->
