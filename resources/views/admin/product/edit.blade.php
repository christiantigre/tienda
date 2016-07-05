@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
        <div class="">  
<div class="page-title">
            <div class="title_left">
              <h3>
                    Editar Producto
                    <small>
                        
                    </small>
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>

            </div>
          <div class="clearfix">

          </div>
<div class="row">
            @if(count($errors) > 0)
            	@include('admin.partials.errors');
            @endif
  <div class="col-md-12 col-sm-12 col-xs-12">           
      <div class="col-md-7 col-sm-7 col-xs-7">  
      <div class="x_content">
                  {!! Form::model($product, array('route' => array('admin.product.update', $product->slug))) !!}
                  <input type="hidden" name="_method" value="PUT">
                    
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Producto :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'nombre',
                          null,
                          array(
                            'class'=>'form-control',
                            'required'=>'required',
                            'placeholder'=>'Ingrese nombre del producto',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cod: barra :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'codbarra',
                          null,
                          array(
                            'class'=>'form-control',
                            'required'=>'required',
                            'placeholder'=>'Ingrese codigo de barra',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'cant',
                          null,
                          array(
                            'class'=>'form-control',
                            'required'=>'required',
                            'placeholder'=>'Ingrese la cantidad',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pvp compra :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'pre_com',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Precio de compra',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pvp venta :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'pre_ven',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Ingrese precio de venta',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'img',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Url de la imagen',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo de la imagen :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'prgr_tittle',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Ingrese el titulo de la imagen',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="product_gallery">
                        <a>
                        <img src="{{ $product->img }}" alt="..." />
                        </a>
                        </div>
                      </div>
                    </div>
      </div>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-5">  
      <div class="x_content">
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Categor&iacute;a :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::select('category_id', $categories, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::select('brand_id', $brands, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::select('isactive_id', $isactives, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>  

                      Nuevo :
                        <input type="checkbox" name="nuevo" class="flat" {{ $product->nuevo == 1 ? "checked='checked'" : '' }}/>
                      <br>
                      Promoci&oacute;n :
                        <input type="checkbox" name="promocion" class="flat" {{ $product->promocion == 1 ? "checked='checked'" : '' }}/>
                      <br>
                      Catalogo :
                        <input type="checkbox" name="catalogo" class="flat" {{ $product->catalogo == 1 ? "checked='checked'" : '' }}/>
                      <br>
                        
                        

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      	{!! Form::submit('Actualizar', array('class'=>'btn btn-success')) !!}
                      	<a href="{{ route('admin.product.index') }}" class="btn btn-primary">Cancelar</a>
                      </div>
                    </div>
                    {{ Form::close() }}               
    </div>
  </div>
</div>
        </div>
@stop
