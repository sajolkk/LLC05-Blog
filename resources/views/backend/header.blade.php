


<section class="container">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }} " href="{{ route('dashboard') }}">Home</a>
        </li>
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is('dashboard/category/add') ? 'active' : '' || request()->is('/dashboard/category/index') ? 'active' : '' }} " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Category</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('dashboard.category.add') }}">Add Category</a>
            <a class="dropdown-item" href="{{ route('dashboard.category.index') }}">All Categories</a>
            
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is('dashboard/post/create') ? 'active' : '' || request()->is('dashboard/post') ? 'active' : '' }} " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Post</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('post.create') }}">Add Post</a>
            <a class="dropdown-item" href="{{ route('post.index') }}">All Post</a>
            
          </div>
        </li>
       
  
        
        <li class="nav-item dropdown float-right">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name }}</a>
          <div class="dropdown-menu">
            <span class="dropdown-item text-center" > <img class="rounded-circle" src="{{ '/'.Auth::user()->image }}" width="60px" height="60px"> </span>
            <a class=" nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Signout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
          </div>

        </li>

         

      </ul>
    </section>