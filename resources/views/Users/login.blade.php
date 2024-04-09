@extends("master2")

@section("content")

<div class="card mt-3 mb-3 col-4 " style="margin-left: auto; margin-right: auto;">

    <div class="card-body">

      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
        @if (session()->has("success"))
          <div class="alert alert-success">{{session("success")}}</div>
        @endif
        @if (session()->has("error"))
          <div class="alert alert-danger">{{session("error")}}</div>
        @endif
        <p class="text-center small">Enter your username & password to login</p>
      </div>

      <form class="row g-3 needs-validation" method="POST" action="{{route('login')}}" novalidate>
        @csrf
        @method("post")
        <div class="col-12">
          <label for="yourUsername" class="form-label">Email</label>
          <div class="input-group has-validation">
            <input type="text" name="email" value="{{old('email')}}" class="form-control" id="yourUsername" required>
            <div class="invalid-feedback">Please enter your Email.</div>
            @error("email")
              <span class="text text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>

        <div class="col-12">
          <label for="yourPassword" class="form-label">Password</label>
          <input type="password" name="password" value="{{old('password')}}" class="form-control" id="yourPassword" required>
          <div class="invalid-feedback">Please enter your password!</div>
          @error("password")
          <span class="text text-danger">{{$message}}</span>
        @enderror
        </div>

       
        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Login</button>
        </div>
        <div class="col-12">
          <p class="small mb-0">Don't have account? <a href="{{route('registration')}}">Create an account</a></p>
        </div>
      </form>

    </div>
  </div>


@endsection