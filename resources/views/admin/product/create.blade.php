@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          Nuevo Producto
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
      <div class="col-md-10 col-sm-10 col-xs-10">

        <div class="x_content">
          {!! Form::open(array('route'=>'admin.product.store','files' => true,'enctype'=>'multipart/form-data'))!!}
          {{ csrf_field() }} 
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sección :</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              {!! Form::select('sections_id', $Secciones, null,['class'=>'form-control'])    !!}
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Categor&iacute;a :</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
             {!! Form::select('category_id',	$categories, null,['class'=>'form-control'])  	!!}
           </div>
         </div>
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="file" name="path" class="form-control">                    
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text(
              'nombre',
              null,
              array(
                'class'=>'form-control',
                'placeholder'=>'Ingrese nombre del producto',
                'autofocus'=>'autofocus',
                'autocomplete'=>'off'
                )
              ) 
              !!}
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cod. barra :</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              {!! Form::text(
                'codbarra',
                null,
                array(
                  'class'=>'form-control',
                  'placeholder'=>'Ingrese codigo de barra',
                  'autofocus'=>'autofocus',
                  'autocomplete'=>'off'
                  )
                ) 
                !!}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock :</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                {!! Form::number(
                  'cant',
                  null,
                  array(
                    'class'=>'form-control',
                    'placeholder'=>'Stock',
                    'autofocus'=>'autofocus',
                    'min'=>'0'
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
                      'placeholder'=>'Pvp compra',
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
                        'placeholder'=>'Pvp venta',
                        'autofocus'=>'autofocus'
                        )
                      ) 
                      !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descuento">Descuento :</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {!! Form::number(
                        'descuento',
                        null,
                        array(
                          'class'=>'form-control',
                          'placeholder'=>'Valor descuento',
                          'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo :</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {!! Form::text(
                        'prgr_tittle',
                        null,
                        array(
                          'class'=>'form-control',
                          'placeholder'=>'Titulo del producto',
                          'autofocus'=>'autofocus',
                          'autocomplete'=>'off'
                          )
                        ) 
                        !!}
                      </div>
                    </div>                    <div class="form-group">
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

               <div class="row">
                <br />
                <div class="clearfix"></div>
                <br />
              </div>


              <div class="row">

               <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>Extras</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    {!! Form::checkbox( 'nuevo', null, array('class'=>'flat' ) ) !!} Nuevo
                    <br />  
                    {!! Form::checkbox( 'promocion', null, array( 'class'=>'flat' ) ) !!} Promoci&oacute;n
                    <br />  
                    {!! Form::checkbox( 'catalogo', null, array( 'class'=>'flat' ) ) !!} Catalogo

                  </div>



                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>Tamaños</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($sizes as $size)
                    @if(count($sizes)>0)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="size[]" value="{{$size->id}}" class="flat" >
                        <!--checked="checked"-->
                        ({{$size->abreviatura}}) - {{$size->name}}
                      </label>
                    </div>
                    @else                                
                    <div class="checkbox">
                      <label>
                        No se encuentra configurado los tamaños de los productos
                      </label>
                    </div>
                    @endif
                    @endforeach
                  </div>

                </div>
              </div>



              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>Disponibles</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($availables as $available)
                    @if(count($availables)>0)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="available[]" value="{{$available->id}}" class="flat">
                        {{$available->name}}
                      </label>
                    </div>
                    @else                                
                    <div class="checkbox">
                      <label>
                        No se encuentra configurado los disponibles
                      </label>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>


              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>Números</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($numbers as $number)
                    @if(count($numbers)>0)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="number[]" value="{{$number->id}}" class="flat">
                        {{$number->number}}
                      </label>
                    </div>
                    @else                                
                    <div class="checkbox">
                      <label>
                        No se encuentra configurado los números
                      </label>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>



            </div>



            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
               {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
               <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Cancelar</a>
             </div>
           </div>
           {{ Form::close() }}
         </div>
       </div>
     </div>
   </div>
   @stop
