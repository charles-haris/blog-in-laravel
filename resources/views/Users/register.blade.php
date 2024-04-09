@extends("master2")

@section("content")

<div class="card mt-3 mb-3 col-4 " style="margin-left: auto; margin-right: auto;">

    <div class="card-body">

      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
        <p class="text-center small">Enter your personal details to create account</p>
      </div>

      <form class="row g-3 needs-validation" method="POST" action="{{route('registration')}}" novalidate>
        @csrf
        @method("post")
        <div class="col-12">
          <label for="yourName" class="form-label">First name</label>
          <input type="text" name="First_name" value="{{old("First_name")}}" class="form-control" id="yourName" >
          <div class="invalid-feedback">Please, enter your fist name!</div>
          @error("First_name")
            <span class="text text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="col-12">
          <label for="yourName" class="form-label">Last name</label>
          <input type="text" name="Last_name" value="{{old("Last_name")}}" class="form-control" id="yourName" >
          <div class="invalid-feedback">Please, enter your last name!</div>
          @error("Last_name")
          <span class="text text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="col-12">
          <label for="yourEmail" class="form-label">Email</label>
          <input type="email" name="email" value="{{old("email")}}" class="form-control" id="yourEmail" >
          <div class="invalid-feedback">Please enter a valid Email adddress!</div>
          @error("email")
          <span class="text text-danger">{{$message}}</span>
        @enderror
        </div>

       

        <div class="col-12">
          <label for="yourPassword" class="form-label">Password</label>
          <input type="password" name="password" value="{{old("password")}}" class="form-control" id="yourPassword" >
          <div class="invalid-feedback">Please enter your password!</div>
          @error("password")
          <span class="text text-danger">{{$message}}</span>
        @enderror
        </div>

       
        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Create Account</button>
        </div>
        <div class="col-12">
          <p class="small mb-0">Already have an account? <a href="{{route('login')}}">Log in</a></p>
        </div>
      </form>

    </div>
  </div>
@endsection