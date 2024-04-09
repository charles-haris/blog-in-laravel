@extends("master")
@section("content")
<div class="pagetitle">
    <h1>Blog</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Create</a></li>
        <li class="breadcrumb-item active">Post</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        

             <!-- News & Updates Traffic -->
             <div class="card">
              <div class="card-body">
                <h5 class="card-title">New Post</h5>
  
                <!-- Floating Labels Form -->
                <form class="row g-3" method="POST" action="{{url('/post')}}" enctype="multipart/form-data">
                  @csrf
                  @method("POST")
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="title" id="floatingName" placeholder="Your title">
                      <label for="floatingName">Title Post</label>
                      @error("title")
                        <span class="text text-danger" >{{$message}} </span>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="col-12">
                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Description Post" name="description" id="floatingTextarea" style="height: 200px;"></textarea>
                      <label for="floatingTextarea">Description Post</label>
                      @error("description")
                        <span class="text text-danger" >{{$message}} </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label">picture 1</label>
                    <div class="col-sm-12">
                      <input class="form-control" type="file" name="photo_1" id="formFile">
                      @error("photo_1")
                      <span class="text text-danger" >{{$message}} </span>
                    @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Picture 2</label>
                    <div class="col-sm-12">
                      <input class="form-control" type="file" name="photo_2" id="formFile">
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Picture 3</label>
                    <div class="col-sm-12">
                      <input class="form-control" type="file" name="photo_3" id="formFile">
                      <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">

                    </div>
                  </div>
                  
                 
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form><!-- End floating Labels Form -->
  
              </div>
            </div>

         

        
      </div><!-- End Left side columns -->

    

    </div>
  </section>

@endsection