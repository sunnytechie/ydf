<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ config('app.name') }}" />
        <meta property="og:description" content="I will be there - YDF convention flyer" />
        <meta property="og:image" content="{{ asset('assets/img/convention-flyer.jpg') }}" />
        <meta property="og:image:width" content="200" />
        <meta property="og:image:height" content="200" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:alt" content="{{ config('app.name') }}" />

        <title>{{ config('app.name', 'YDF') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/ydf-logo.png') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .avatar {
              position: absolute;
              border-radius: 75px;
              margin-left: 70px;
              margin-top: 63px;
            }

            @media only screen and (max-width: 1440px) {
              .avatar {
              position: absolute;
              border-radius: 75px;
              margin-left: 110px;
              margin-top: 90px;
            }
          }

            @media only screen and (max-width: 1024px) {
              .avatar {
              position: absolute;
              border-radius: 75px;
              margin-left: 60px;
              margin-top: 40px;
            }
          }

            @media only screen and (max-width: 768px) {
              .avatar {
              position: absolute;
              border-radius: 75px;
              margin-left: 40px;
              margin-top: 28px;
            }
          }
            

            @media only screen and (max-width: 500px) {
              .avatar {
              position: absolute;
              border-radius: 75px;
              margin-left: 41px;
              margin-top: 28px;
            }
          }

          @media only screen and (max-width: 320px) {
              .avatar {
              position: absolute;
              border-radius: 75px;
              margin-left: 24px;
              margin-top: 20px;
            }
          }
        </style>
    </head>
    <body id="app">
      
        <div style="position: fixed; margin-top: 10px; left: 0; z-index: 1">
            <a class="btn btn-primary btn-lg" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-top-right-radius: 100px; border-bottom-right-radius: 100px">
                Get yours here
              </a>
        </div>  
        
<!-- Carousel -->
<div class="container">
    <div class="row">
      @foreach ($attendances as $attendance)
      <div class="col-md-3 col-6">
        <img class="avatar" height="75" width="75" src="/storage/{{ $attendance->thumbnail }}" alt="profile">
        <img class="img-fluid" src="{{ asset('assets/img/print-avatar.jpg') }}" alt="flyers">
      </div>
      @endforeach       
</div>
  
  

{{-- modal --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Get your own personalized flyer</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <form action="{{ route('attendance.store') }}" method="POST" enctype="multipart/form-data">
       @csrf

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Your Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Miss. Jane">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" required>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="formFile" class="form-label">Upload your picture</label>
          <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="thumbnail" id="formFile" required>
          @error('thumbnail')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div>
          <button class="btn btn-primary" type="submit">Create yours</button>
        </div>
      </form>
    </div>
    </div>
  </div>
    </body>
</html>
