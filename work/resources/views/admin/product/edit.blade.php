@extends('layouts.admin')
@section('title','Editar producto')
@section('styles')
{!! Html::style('melody/vendors/lightgallery/css/lightgallery.css')!!}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de producto</li>
            </ol>
        </nav>
    </div>
    {!! Form::model($product,['route'=>['products.update',$product], 'method'=>'PUT','files' => true]) !!}
  <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name)}}" aria-describedby="helpId">
                      @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                      </div>
                  <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="code">Código de barras</label>
                          <input type="text" name="code"  value="{{ old('code', $product->code)}}" id="code" class="form-control  @error('code') is-invalid @enderror"> <small id="helpId" class="text-muted">Campo opcional</small>
                          @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-group">
                          <label for="sell_price">Precio de venta</label>
                          <input type="number" name="sell_price"value="{{ old('sell_price', $product->sell_price)}}" id="sell_price" class="form-control  @error('sell_price') is-invalid @enderror" aria-describedby="helpId" >
                          @error('sell_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="short_description">Extracto</label>
                      <textarea class="form-control  @error('short_description') is-invalid @enderror" name="short_description" id="short_description" rows="3">
                      {{ old('short_description', $product->short_description)}}
                      </textarea>
                      @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                  </div>
                  <div class="form-group">
                    <label for="long_description">Descripción</label>
                    <textarea class="form-control  @error('name') is-invalid @enderror" name="long_description" id="long_description" rows="10">
                    {{ old('long_description', $product->long_description)}}
                    </textarea>
                    @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                  </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">  
                  <div class="form-group">
                    <label for="category">Categoria</label>
                          <select class="select2 @error('category') is-invalid @enderror" id="category" name="category" style="width: 100%; ">                         
                              @foreach ($categories as $category)
                                  <option value="{{$category->id}}"
                                  
                                  {{ old('category')}}
                                  >{{$category->name}}</option>
                              @endforeach
                          </select>
                          @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                  </div> 
              <div class="form-group">
                <label for="subcategory_id">Subcategoria</label>
                    <select class="select2  @error('subcategory_id') is-invalid @enderror" id="subcategory_id" name="subcategory_id" style="width: 100%;">     
                         <option value="" disabled selected>--Seleccione una Categoria--</option>                     
                    </select>
                    @error('subcategory_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
              </div> 
              <div class="form-group">
                  <label for="provider_id">Proveedor</label>
                    <select class="select2  @error('provider_id') is-invalid @enderror" name="provider_id" id="provider_id"style="width: 100%;">
                        @foreach ($providers as $provider)
                            <option value="{{$provider->id}}"
                                {{ old('provider_id', $product->provider_id)==
                                $provider->id ? 'selected' : ''}}
                                >{{$provider->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('provider_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
              </div>
              <div class="form-group">
              <label for="tags">Etiquetas</label>
                <select class="select2" name="tags[]" id="tags"style="width: 100%;" multiple>
                     @foreach($tags as $tag)
                        <option value="{{$tag->id}}"
                             {{ collect(old('tags', $product->tags->pluck('id')))
                            ->contains($tag->id) ? 'selected' :''}}
                            >{{$tag->name}}
                        </option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
              <h4 class="card-title">Subir imágenes</h4>
                  <div class="file-upload-wrapper">
                    <div id="fileuploader">Subir</div>
                  </div>
              </div>
        </div>
      </div>
    </div>
  </div>
            <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Galeria de imágenes</h4>
                  <div id="lightgallery" class="row lightGallery">
                  @foreach ($product->images as $image)
                    <a href="{{asset($image->url)}}" class="image-tile"><img src="{{asset($image->url)}}"
                     alt="No cargó la imagen"></a>
                    @endforeach
                  </div>
                </div>
              </div>
          </div>
        </div>
            <button type="submit" class="btn btn-primary float-right">Registrar</button>
                     <a href="{{route('products.index')}}" class="btn btn-light">
                        Cancelar
                     </a>

            {!! Form::close() !!}

</div>
@endsection
@section('scripts')


  <!-- plugin js for this page -->
  {!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js')!!}

  {!! Html::script('melody/js/light-gallery.js')!!}
  <!-- End custom js for this page-->
{!! Html::script('melody/js/dropify.js') !!}
{!! Html::script('ckeditor/ckeditor.js') !!}
    <script>
    CKEDITOR.replace('long_description');
    </script>

    <script>
(function($) {
  'use strict';
  if ($("#fileuploader").length) {
      $("#fileuploader").uploadFile({
      url: "../../upload/product/{{$product->id}}/image",
      fileName:"image"
    });
  }
})(jQuery);
</script>
    <script>
    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
        $('#category').select2();
        $('#subcategory_id').select2();
        $('#provider_id').select2();
        $('#tags').select2();

        });
    </script>

    <script>
var category=$('#category');
var Subcategory_id=$('#subcategory_id');
category.change(function(){
  $.ajax({
    url:"{{route('get_subcategories')}}",
    method:'GET',
    data:{
      category:category.val(),
    },
    success:function(data){
      Subcategory_id.empty();
      Subcategory_id.append('<option disabled selected>-- Seleccione una subcategoria--</Option>');
      $.each(data, function(index,element){
        Subcategory_id.append('<option value="'+ element.id+'">'+ element.name + '</option>' )
      });
   
    }
  })
})
category
</script>
@endsection
