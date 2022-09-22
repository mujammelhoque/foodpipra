@extends('dashboard.admin.layout.layout')
@section('content')
<div class="container">
  @include('common.message.message')
    <table class="table table-boardered table-hover ">
  <tbody>
    <tr>
      <th class="bg-secondary  text-light">Product Name</th>
      <td class="bg-info text-light">{{ $product->name }}</td>
    </tr>
    
    <tr>
      <th class="bg-secondary  text-light">Category Name</th>
      <td class="bg-info text-light" >{{ $product->cat_info['name'] }}</td>
    </tr>
    <tr>
      <th class="bg-secondary text-light">Sub Category Name</th>
      <td class="bg-info text-light">{{ $product->sub_cat_info['name']}}</td>
    </tr>

    <tr>
      <th class="bg-secondary  text-light">Sub Category Name</th>
      <td class="bg-info text-light">{{ $product->sub_cat_info['name']}}</td>
    </tr>

    <tr>
      <th class="bg-secondary  text-light">SKU</th>
      <td class="bg-info text-light">{{ $product->sku}}</td>
    </tr>

    {{-- <tr>
      <th class="w-25 bg-secondary  text-light">Title</th>
      <td>{{ $product->title}}</td>
    </tr> --}}

    <tr>
      <th class="bg-secondary  text-light">Summary</th>
      <td class="bg-info text-light" >{{ $product->summary}}</td>
    </tr>

    <tr>
      <th class="w-25 bg-secondary  text-light">Discription</th>
      <td>{{ $product->description}}</td>
    </tr>

    <tr>
      <th class="bg-secondary  text-light">Featued Image</th>
      <td class="bg-info text-light"><img style="width: 350px; height:250px" src="{{asset('upload/featured-image/'.$product->photo)}}" alt=""></td>
    </tr>

    <tr>
      <th class="bg-secondary  text-light">Other Images</th>
    @forelse ($product->more_image as $more_img)
    <td class="bg-info text-light">
      <img style="width: 150px; height:100px" src="{{asset('upload/more-image/'.$more_img->more_photo)}}" alt=""></td>
    @empty
        <td class="bg-info text-light"></td>
    @endforelse
   
    </tr>

    <tr>
      <th class="bg-secondary  text-light">Brand</th>
      <td class="bg-info text-light">
      
        {{ $product->brand }}
      </td>
    </tr>

  </tbody>
  </table>
  <form action="{{ route('admin.product.destroy',$product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
     &nbsp;<a class="btn btn-info" href="{{ route('admin.product.index') }}">Back</a>
  </form>
</div>
@endsection
