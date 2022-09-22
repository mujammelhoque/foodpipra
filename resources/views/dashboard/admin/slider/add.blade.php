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

            <form action="{{ route('admin.slider.store') }}" method="Post" enctype="multipart/form-data">
              @csrf

            <div class="row">
              <!-- /.col -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="image">
                </div>
                </div>
                <!-- /.form-group -->
              <!-- /.col -->
            </div>

            <div class="row">
              <!-- /.col -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Title 1 </label>
                  <input type="text" class="form-control" name="title1">
                </div>
                </div>
                <!-- /.form-group -->
              <!-- /.col -->
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Title 2 <small>(Heading)</small> </label>
                  <input type="text" class="form-control" name="title2">
                </div>
                </div>
                <!-- /.form-group -->
              <!-- /.col -->
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Title 3</label>
                  <input type="text" class="form-control" name="title3">
                </div>
                </div>
                <!-- /.form-group -->
              <!-- /.col -->
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" id="" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>

                  </select>
                </div>
                </div>
                <!-- /.form-group -->
              <!-- /.col -->
            </div>
            
            <!-- /.row -->
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
  
    
    
@endsection