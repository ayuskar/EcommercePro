<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <base href='/public'>
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
     <div class="row justify-content-center">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card shadow-lg border-0" style="border-radius: 15px;">
                        <div class="card-body">
                            <h4 class="card-title text-primary" style="font-weight: 600;">Edit Product</h4>

                            @if(session('message'))
                                <div class="alert alert-success alert-dismissible fade show mt-3">
                                    {{ session('message') }}
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            @endif

                            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                                @csrf

                                <div class="form-group">
                                    <label>Title</label>
                                    <input style="color:#0090e7 !important" type="text" name="title" value="{{ $product->title }}" class="form-control rounded-pill">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea style="background:white; color:#0090e7 !important" name="description" class="form-control rounded" rows="3">{{ $product->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select style="background:white; color:#0090e7 !important" name="category" class="form-control rounded-pill">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_name }}" {{ $product->category == $category->category_name ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input style="color:#0090e7 !important" type="number" name="quantity" value="{{ $product->quantity }}" class="form-control rounded-pill">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input style="color:#0090e7 !important" type="number" name="price" value="{{ $product->price }}" class="form-control rounded-pill">
                                </div>

                                <div class="form-group">
                                    <label>Discount (%)</label>
                                    <input style="color:#0090e7 !important" type="number" name="discount" value="{{ $product->discount }}" class="form-control rounded-pill">
                                </div>

                                <div class="form-group">
                                    <label>Product Image</label><br>
                                    @if($product->image)
                                        <img src="{{ asset('product_images/' . $product->image) }}" width="100" height="100" style="border-radius: 8px;">
                                    @endif
                                    <input type="file" name="image" class="form-control rounded-pill mt-2">
                                </div>

                                <button type="submit" style="border: 2px solid white;" class="btn btn-gradient-primary btn-lg btn-block rounded-pill">
                                    Update Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
     

  </body>
</html>