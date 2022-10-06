 <div id="layoutSidenav_nav">
          <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
              <div class="sb-sidenav-menu">
                  <div class="nav">
                      <div class="sb-sidenav-menu-heading">Core</div>
                      <a class="nav-link" href="{{url('/')}}">
                          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                          Dashboard
                      </a>
                      <a class="nav-link" href="{{url('/register')}}">
                          <div class="sb-nav-link-icon"><i class="fas fa-registered"></i></div>
                          Register
                      </a>
                      {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                          Patients
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="{{url('/patients')}}">Find Patient</a>
                              <a class="nav-link" href="{{url('/patient-form')}}">Patient Registration</a>
                          </nav>
                      </div>
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#doctor" aria-expanded="false" aria-controls="collapseLayouts">
                          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                          Doctor
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="doctor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="{{url('/doctors')}}">Find Doctor</a>
                              <a class="nav-link" href="{{url('/doctor-form')}}">Doctor Registration</a>
                          </nav>
                      </div>
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#department" aria-expanded="false" aria-controls="collapseLayouts">
                          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                          Department Section
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="department" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="{{url('/departments')}}">Department List</a>
                              <a class="nav-link" href="{{url('/department-form')}}">Add Department</a>
                          </nav>
                      </div>
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#test" aria-expanded="false" aria-controls="collapseLayouts">
                          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                             Test Section
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="test" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="{{url('/tests')}}">Available Test</a>
                              <a class="nav-link" href="{{url('/test-form')}}">Add Test</a>
                          </nav>
                      </div>
                      
                      {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                          <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                          Pages
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                          <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                  Authentication
                                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                              <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                  <nav class="sb-sidenav-menu-nested nav">
                                      <a class="nav-link" href="login.html">Login</a>
                                      <a class="nav-link" href="register.html">Register</a>
                                      <a class="nav-link" href="password.html">Forgot Password</a>
                                  </nav>
                              </div>
                              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                  Error
                                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                              <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                  <nav class="sb-sidenav-menu-nested nav">
                                      <a class="nav-link" href="401.html">401 Page</a>
                                      <a class="nav-link" href="404.html">404 Page</a>
                                      <a class="nav-link" href="500.html">500 Page</a>
                                  </nav>
                              </div>
                          </nav>
                      </div> --}}
                      {{-- <div class="sb-sidenav-menu-heading">Addons</div> --}}
                      <a class="nav-link" href="{{url('consultations')}}">
                          <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                          Consultation
                      </a>
                      <a class="nav-link" href="{{url('/lab')}}">
                          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                          Laboratory
                      </a>
                  </div>
              </div>
              <div class="sb-sidenav-footer">
                  <div class="small">Logged in as:</div>
                  Start Bootstrap
              </div>
          </nav>
      </div>


