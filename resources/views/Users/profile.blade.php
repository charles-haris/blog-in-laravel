@extends("master")

@section("content")
<div class="pagetitle">
    <h1>Blog</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Blog</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @empty(Auth::user()->photo)
              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            @else
              <img src="{{asset(Auth::user()->photo)}}" alt="Profile" class="rounded-circle" height="100" width="100">
            @endempty
            <h2>{{Auth::user()->First_name}} {{Auth::user()->Last_name}}</h2>
            <h3>{{Auth::user()->job}}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

             

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">
              @if (session()->has("success"))
                <div class="alert alert-success">{{session("success")}}</div>
              @endif
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{Auth::user()->First_name}} {{Auth::user()->Last_name}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  @empty (Auth::user()->job)
                    <div class="col-lg-9 col-md-8">---</div>
                  @else
                    <div class="col-lg-9 col-md-8">{{Auth::user()->job}}</div>
                  @endempty
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  @empty (Auth::user()->country)
                    <div class="col-lg-9 col-md-8">---</div>
                  @else
                    <div class="col-lg-9 col-md-8">{{Auth::user()->country}}</div>
                  @endempty               
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  @empty (Auth::user()->address)
                    <div class="col-lg-9 col-md-8">---</div>
                  @else
                    <div class="col-lg-9 col-md-8">{{Auth::user()->address}}</div>
                  @endempty                
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  @empty (Auth::user()->phone)
                    <div class="col-lg-9 col-md-8">---</div>
                  @else
                    <div class="col-lg-9 col-md-8">{{Auth::user()->phone}}</div>
                  @endempty                
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" action="{{url('/profile')}}" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      @empty(Auth::user()->photo)
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                      @else
                        <img src="{{asset(Auth::user()->photo)}}" alt="Profile" class="rounded-circle" height="50" width="50">
                      @endempty
                      <div class="col-md-8 col-lg-12 pt-2">
                        <input name="photo" type="file" class="form-control" id="fullName">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="First_name" type="text" class="form-control" id="fullName" value="{{Auth::user()->First_name}}">
                      @error("First_name")
                        <span class="text text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="Last_name" type="text" class="form-control" id="fullName" value="{{Auth::user()->Last_name}}">
                      @error("First_name")
                        <span class="text text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                  </div>

              {{--     <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                    </div>
                  </div> --}}

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="{{Auth::user()->job}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Country" value="{{Auth::user()->country}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="{{Auth::user()->address}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="{{Auth::user()->phone}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="{{Auth::user()->email}}">
                      @error("First_name")
                        <span class="text text-danger"> {{$message}} </span>
                      @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>


              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection