<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Laravel App</title>

    <!-- Bootstrap CSS (You can either use a CDN or local installation) -->
    <!-- Option 1: Using CDN (Uncomment the next two lines) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">
    <!-- Option 2: Using a local installation (Uncomment the next line) -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- Additional CSS or custom styles can be added here -->

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Laravel App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}">Tasks</a>
                    </li>
                    
                    <!-- Add a Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Item 1</a>
                            <a class="dropdown-item" href="#">Item 2</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Another Item</a>
                        </div>
                    </li>
                    <!-- End Dropdown Menu -->
                    <li class="nav-item"><a href="#" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModalMusic">Play Music</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal -->
<div class="modal fade" id="exampleModalMusic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Play Music</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="file" id="fileElem" multiple accept="image/video/*" style="display:none;">
          <a href="#" class="btn btn-dark btn-lg" id="fileSelect">Select some music files</a><br><br>
            <div id="fileList">
            <p class="lead text-muted" contenteditable="true">No files selected!</p>
            </div>
            <script type="text/javascript">
              const fileSelect = document.getElementById("fileSelect"),
                fileElem = document.getElementById("fileElem"),
                fileList = document.getElementById("fileList");

            fileSelect.addEventListener("click", function (e) {
              if (fileElem) {
                fileElem.click();
              }
              e.preventDefault(); // prevent navigation to "#"
            }, false);

            fileElem.addEventListener("change", handleFiles, false);

            function handleFiles() {
              if (!this.files.length) {
                fileList.innerHTML = "<p>No files selected!</p>";
              } else {
                fileList.innerHTML = "";
                const list = document.createElement("ul");
                
                fileList.appendChild(list);
                for (let i = 0; i < this.files.length; i++) {
                  const li = document.createElement("li");
                
                  list.appendChild(li);

                  const video = document.createElement("video");
                  video.src = URL.createObjectURL(this.files[i]);
                  video.height = 250;
                  video.width = 400;
                  video.controls = true;
                  video.autoplay=false;
                  video.onload = function() {
                    URL.revokeObjectURL(this.src);
                  }
                  li.appendChild(video);
                  const info = document.createElement("span");
                  info.innerHTML = this.files[i].name + ": " + this.files[i].size + " bytes";
                  li.appendChild(info);
                }
              }
            }
            </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save Changes</button>
      </div>
    </div>
  </div>
</div><!--end modal-->


    <div class="container-fluid mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS (You can either use a CDN or local installation) -->
    <!-- Option 1: Using CDN (Uncomment the next line) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Option 2: Using a local installation (Uncomment the next line) -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

    <!-- Additional JavaScript or custom scripts can be added here -->
</body>
</html>
