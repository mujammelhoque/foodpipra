@extends('dashboard.admin.layout.layout')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('common.message.message')

            <form action="{{ route('admin.product.store') }}" method="Post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <!-- /.form-group -->
                 
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Sku</label>
                    <input type="text" class="form-control" name="sku">
                  </div>
                  <!-- /.form-group -->
                 
                  <!-- /.form-group -->
                </div>
              </div>

            <div class="row">
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Featured Image</label>
                  <input type="file" class="form-control" name="photo">
                </div>
                </div>
                <!-- /.form-group -->
                <div class="col-md-6">

                <div class="form-group">
                  <label>More Image</label>
                  <input type="file" multiple class="form-control" name="more_photo[]">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category</label>
                  <select name="cat_id" id="category" class="form-control" required>
                    <option disabled selected value=""> Select category</option>
                   @forelse ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                   @empty
                   <option disabled value="">No Category Found</option>

                   @endforelse
                  </select>
                  </div>
                <!-- /.form-group -->
               
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sub Category </label>
                  <select name="sub_cat_id" id="subCategory" class="form-control" required>
                    {{-- <option value="">test</option> --}}
                  </select>
                  </div>
                <!-- /.form-group -->
          
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" id="discountPrice" class="form-control" name="price">
                </div>
                </div>
                <!-- /.form-group -->
                <div class="col-md-6">
                <div class="form-group">
                  <label>Original Price</label>
                  <input type="number" class="form-control"  id="originalPrice" name="ori_price">
                </div>
                <!-- /.form-group -->
              </div>
              </div>
              <!-- /.col -->

              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Discount</label>
                    <input type="number"  class="form-control" name="discount" readonly id="discountvalue">
  
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">

              <div class="col-md-12">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Discription</label>
                  <textarea name="description" class="form-control" id="" cols="30" rows="4"></textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Stock</label>
                  <input type="number" class="form-control" name="stock">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Weight</label>
                  <input type="text" class="form-control" name="stock">

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Brand</label>
                  <select name="brand" class="form-control" id="">
                    <option selected value="home">other</option>
                    @forelse ($brands as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                    @empty
                        
                    @endforelse
                
                  </select>
                  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Condition</label>
                  <input type="text" class="form-control" name="condition">

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>

          
          </div>
          <div class="mb-2">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
         </form>
          <!-- /.card-body -->
        
        </div>
        <!-- /.card -->




 
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    $(document).ready(function(){
      $("#originalPrice").change(function(){
        $("#myInput").val();
        var discountPrice =  $("#discountPrice").val();
        var originalPrice =  $("#originalPrice").val();
      var discount = 100 * (originalPrice - discountPrice) / originalPrice;
      $("#discountvalue").val(discount)
      console.log(discount)

    });
    });
    </script>
  
  <script type=text/javascript>
    $(document).ready(function(){
      $('#category').change(function(){
      var categoryId = $(this).val();  
      if(categoryId){
        $.ajax({
          type:"GET",
          url:"{{url('admin/getSubCategory')}}?category_id="+categoryId,
          success:function(res){        
          if(res){
            $("#subCategory").empty();
            $("#subCategory").append('<option>Select Sub Category</option>');
            $.each(res,function(key,value){
              $("#subCategory").append('<option value="'+key+'">'+value+'</option>');
            });
          
          }else{
            $("#subCategory").empty();
          }
          }
        });
      }else{
        $("#subCategory").empty();

   
      }   
      });
    }); 
    </script>
    
    
@endsection