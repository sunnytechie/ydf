<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ config('app.name') }}" />
        <meta property="og:description" content="I will be there - YDF convention flyer" />
        <meta property="og:image" content="{{ asset('assets/img/ydf-logo.png') }}" />
        <meta property="og:image:width" content="200" />
        <meta property="og:image:height" content="200" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:alt" content="{{ config('app.name') }}" />

        <title>{{ config('app.name', 'YDF') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
        </script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
        </script>

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
            .box {
                height: 1000px;
                width: 1000px
            }
            .avatar {
                position: absolute;
                z-index: 999 !important;
                border-radius: 200px;
                top: 160px;
                left: 390px;
                border: 2px solid #fff;
            }
            #imgAvatar {
              border-radius: 200px;
              z-index: 999 !important;
            }

            .flyer {
              z-index: 9999999999 !important;
            }

            
        </style>
    </head>
    <body>
      
        <div style="position: fixed; margin-top: 10px; left: 0; z-index: 1">
            <a class="btn btn-primary btn-lg" href="{{ route('attendance.index') }}" role="button" style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-top-right-radius: 100px; border-bottom-right-radius: 100px">
                Go back
              </a>
        </div>  
        
<!-- Carousel -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box" id="htmlContent">
              <div class="avatar"><img id="imgAvatar" class="img-avatar" height="380" width="380" src="/storage/{{ $attendance->thumbnail }}" alt="Your picture"></div>
              <div class="flyer"><img class="img-fluid" src="{{ asset('assets/img/print-avatar.jpg') }}" alt="flyers" style="z-index: 999"></div>
                
            </div>
            <button id="download" class="btn btn-primary mb-3" type="button">Click to Download</button>
        </div>
        
</div>
  
    </body>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script type="text/javascript">
        document.getElementById("download").onclick = function() {
        const screenshotTarget = document.getElementById('htmlContent');

        html2canvas(screenshotTarget).then((canvas) => {
        const base64image = canvas.toDataURL("image/png");
        var anchor = document.createElement('a');
        anchor.setAttribute("href", base64image);
        anchor.setAttribute("download", "my-flyer.png");
        anchor.click();
        anchor.remove();
        });
        };
    </script>
</html>
