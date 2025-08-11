<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>
        .swal2-modal .swal2-title{
            color:black;
        }
        </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
       @include('admin.navbar')
       <div style class="main-panel">
        <div style="background:none" class="content-wrapper">
              <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
            <div class="card shadow-lg border-0" style="border-radius: 15px;">
                <div class="card-body">
                    <h4 class="card-title text-primary" style="font-weight: 600;">Add New Category</h4>
                    
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form class="forms-sample mt-4" action="{{ route('add_category') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name" style="font-weight: 500;">Category Name</label>
                            <input style="color:#0090e7 !important" type="text" class="form-control form-control-lg rounded-pill" 
                                   id="category_name" name="category_name" 
                                   placeholder="Enter category name">
                            @error('category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary btn-lg btn-block rounded-pill" 
                                style="font-weight: 600; letter-spacing: 0.5px; border: 2px solid white;">
                            + Add Category
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional: Category List -->
       <div class="col-md-6 grid-margin stretch-card">
    <div class="card shadow-lg border-0" style="border-radius: 15px;">
        <div class="card-body">
            <h4 class="card-title text-primary" style="font-weight: 600;">Existing Categories</h4>
            <ul class="list-group list-group-flush mt-3">
                @foreach(\App\Models\Category::all() as $category)
                    <li style="color:#0090e7 !important" class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->category_name }}                                <span class="badge badge-primary badge-pill">ID: {{ $category->id }}</span>

                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $category->id }}">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

</div>      
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            let categoryId = this.getAttribute('data-id');
            
            Swal.fire({
                title: 'Do you want to delete it?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/delete_category/${categoryId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Deleted!',
                                data.message,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
    });
});
</script>

  </body>
</html>