<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <img src="./img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">E-Library</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="./img/online-library.png"  class="navbar-brand-img h-200" alt="main_logo">
                    </div>
                    <span class="nav-link-text ms-1">Available Books</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('student-profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Actions</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'borrow') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'borrow']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="./img/borrow.png"  class="navbar-brand-img h-200" alt="main_logo">
                    </div>
                    <span class="nav-link-text ms-1">Borrow Book</span>
                </a>
            </li>
              <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'return') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'return']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="./img/return.png"  class="navbar-brand-img h-200" alt="main_logo">
                    </div>
                    <span class="nav-link-text ms-1">Return Book</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'feedback') == true ? 'active' : '' }}"  href="{{ route('page', ['page' => 'feedback']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="./img/feedback.png"  class="navbar-brand-img h-200" alt="main_logo">
                    </div>
                    <span class="nav-link-text ms-1">Feedback</span>
                </a>
            </li>
        </ul>
    </div>

</aside>

