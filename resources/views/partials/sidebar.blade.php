<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/post')}}">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

     

      <li class="nav-heading">Action on My Blog</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/post/create">
          <i class="bi bi-person"></i>
          <span>New Post</span>
        </a>
      </li><!-- End Profile Page Nav -->

    

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('my_posts')}}">
          <i class="bi bi-envelope"></i>
          <span>My Posts</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-heading">Action on My Profile</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('my_profile')}}">
          <i class="bi bi-person"></i>
          <span>My Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

     

    

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('logout')}}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside>