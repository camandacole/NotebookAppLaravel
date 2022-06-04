<section>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                @if(!Auth::check())
                    <a class="navbar-brand" href="/">NoteBook App</a>
                    @else
                    <a class="navbar-brand" href="{{route('home')}}">NoteBook App</a>
                    @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                              <a href="/"  class="nav-link">home</a>
                          </li>

                           <li class="nav-item">
                              <a href="/contact"  class="nav-link">reach me</a>
                          </li>

                      </ul>
                    </div>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto">
                     
                        <li class="nav-item dropdown">
                        @if (Auth::check())
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                          </a>
                          @else
                          <a class="nav-link dropdown-toggle btn btn-success text-white" href="#" id="navbarDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            signin/create an account
                          </a>
                        @endif
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @guest
                                  <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @else
                                  <div class="dropdown-divider"></div>

                                      <div>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                  </div>
                                  @endguest
                                
                          </div>
                        </li>
                       
                      </ul>
                
                    </div>
                </div>
                  </nav>

      </section>