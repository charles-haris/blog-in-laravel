<!DOCTYPE html>
<html lang="en">

@include("partials.head")

<body>

  <!-- ======= Header ======= -->
  @auth
    @include("partials.header")
  @endauth
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @auth
    @include("partials.sidebar")
  @endauth
  <!-- End Sidebar-->


  @yield("content")


 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include("partials.linksJS")

</body>

</html>