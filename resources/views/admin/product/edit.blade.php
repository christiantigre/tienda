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
        <div class="col-md-10 col-sm-10 col-xs-10">  
          <div class="x_content">
            {!! Form::model($product, ['route' => ['admin.product.update', $product->slug],'files'=>true,'enctype'=>'multipart/form-data']) !!}
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="file" name="path" class="form-control">  
                          {!! Form::hidden(
                            'img',
                            null,
                            array(
                              'class'=>'form-control'
                              )
                            ) 
                            !!}    
                          </div>
                        </div>

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
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Sección :</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            {!! Form::select('sections_id', $Secciones, null,['class'=>'form-control'])    !!}
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo de la imagen</label>
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

                          <div class="row">
                            <br />
                            <div class="clearfix"></div>
                            <br />
                          </div>

                          <div class="row">


                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="x_panel tile fixed_height_320">
                                <div class="x_title">
                                  <h2>Imagen</h2>
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
                                 <div class="product_gallery">
                                  <img src="/upload/products/{{ $product->img }}" width="50%" height="50%" alt="..." />
                                </div>
                              </div>
                            </div>
                          </div>

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
                                Nuevo :
                                <input type="checkbox" name="nuevo" class="flat" {{ $product->nuevo == 1 ? "checked='checked'" : '' }}/>
                                <br>
                                Promoci&oacute;n :
                                <input type="checkbox" name="promocion" class="flat" {{ $product->promocion == 1 ? "checked='checked'" : '' }}/>
                                <br>
                                Catalogo :
                                <input type="checkbox" name="catalogo" class="flat" {{ $product->catalogo == 1 ? "checked='checked'" : '' }}/>
                                <br>
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
                                @if(count($sizes)>0)
                                @foreach($sizes as $size)
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="size[]" value="{{$size->size->size_id}}" class="flat" checked="checked">
                                    ({{$size->size->abreviatura}}) - {{$size->size->name}}
                                  </label>
                                </div>
                                @endforeach
                                @else                                
                                <div class="checkbox">
                                  <label>
                                    0 resultados
                                  </label>
                                </div>
                                @endif
                                <div class="form-group">
                                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm1" onclick="enviar({{ $product->id }})">Cambiar</button>
                                  </div>
                                </div>
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
                                @if(count($numbers)>0)
                                @foreach($numbers as $number)
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="number[]" value="{{$number->numbersizes->id}}" class="flat" checked="checked">
                                    {{$number->numbersizes->number}}
                                  </label>
                                </div>
                                @endforeach
                                @else                                
                                <div class="checkbox">
                                  <label>
                                    0 resultados
                                  </label>
                                </div>
                                @endif
                                <div class="form-group">
                                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm2" onclick="enviarpsz({{ $product->id }})">Cambiar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="x_panel tile fixed_height_320">
                              <div class="x_title">
                                <h2>Preferencias</h2>
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
                                @if(count($availables)>0)
                                @foreach($availables as $available)
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="available[]" value="{{$available->availables->id}}" class="flat" checked="checked">
                                    {{$available->availables->name}}
                                  </label>
                                </div>
                                @endforeach
                                @else                                
                                <div class="checkbox">
                                  <label>
                                    0 resultados
                                  </label>
                                </div>
                                @endif
                                <div class="form-group">
                                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm3" onclick="enviarpfr({{ $product->id }})">Cambiar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>


                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                     {!! Form::submit('Actualizar', array('class'=>'btn btn-success')) !!}
                     <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Cancelar</a>
                   </div>
                 </div>
                 {{ Form::close() }}

               </div>

               <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel2">Tamaños</h4>
                    </div>
                    <div class="modal-body">
                      {!! Form::model($product, ['route' => ['admin.productnumbersize.update', $product->id]]) !!}
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="idproducto" id="idproducto" value=""> 
                      @foreach($nsizes as $nsize)
                      @if(count($nsizes)>0)
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="size[]" value="{{$nsize->id}}" class="flat">
                          ({{$nsize->abreviatura}}) - {{$nsize->name}}
                        </label>
                      </div>
                      @else                                
                      <div class="checkbox">
                        <label>
                          0 resultados
                        </label>
                      </div>
                      @endif
                      @endforeach
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                      </div>                    
                      {{ Form::close() }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel2">Números</h4>
                    </div>
                    <div class="modal-body">
                      {!! Form::model($product, ['route' => ['admin.productsize.update', $product->id]]) !!}
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="idproductops" id="idproductops" value=""> 
                      @foreach($numbersizes as $numbersize)
                      @if(count($numbersizes)>0)
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="number[]" value="{{$numbersize->id}}" class="flat">
                          {{$numbersize->number}}
                        </label>
                      </div>
                      @else                                
                      <div class="checkbox">
                        <label>
                          0 resultados
                        </label>
                      </div>
                      @endif
                      @endforeach
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                      </div>                    
                      {{ Form::close() }}
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Preferencias</h4>
                  </div>
                  <div class="modal-body">
                    {!! Form::model($product, ['route' => ['admin.productavailables.update', $product->id]]) !!}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="idproductopfr" id="idproductopfr" value=""> 
                    @foreach($pavailables as $pavailable)
                    @if(count($pavailables)>0)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="available[]" value="{{$pavailable->id}}" class="flat">
                        {{$pavailable->name}}
                      </label>
                    </div>
                    @else                                
                    <div class="checkbox">
                      <label>
                        0 resultados
                      </label>
                    </div>
                    @endif
                    @endforeach
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                    </div>                    
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
            </div>

            <script>
              function enviar($val){ document.getElementById("idproducto").value = $val; }
              function enviarpsz($val){ document.getElementById("idproductops").value = $val; }
              function enviarpfr($val){ document.getElementById("idproductopfr").value = $val; }
            </script>



            @stop
