@extends('admin.template')
@section('content')
<div class="right_col" role="main">  

    @if(count($errors) > 0)
    @include('admin.partials.errors');
    @endif  
    <div class="">  
        <div class="page-title">
            <div class="title_left">
                <h3>

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
        <div class="x_content">
            <script type="text/javascript">
                $(document).ready(function () {
// Smart Wizard
$('#wizard').smartWizard();
});

                $(document).ready(function () {
// Smart Wizard
$('#wizard_verticle').smartWizard({
    transitionEffect: 'slide'
});

});
</script>




</div>

<div class="row">


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">


            <div class="form-horizontal form-label-left" >

                {!! Form::model($empresa, [
                            'method' => 'PATCH',
                            'url' => ['/admin/geo', $empresa->id],
                            'class' => 'form-horizontal',
                            'files' => true
                            ]) !!}

                <input type="hidden" name="_method" value="PUT">


                <p><code></code> <a href=""></a>
                </p>
                <span class="section">Configuración</span>

                
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Geolocalización <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                            'key_google',
                            null,
                            array(
                                'class'=>'form-control col-md-7 col-xs-12',
                                'placeholder'=>'Key',
                                'autofocus'=>'autofocus',
                                'autocomplete'=>'off'
                            )
                        ) 
                        !!}
                    </div>
                </div>

                
                


            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <a href="{{ route('admin.entiti.index') }}" class="btn btn-primary">Cancelar</a>
                    <button id="send" type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
            {{ Form::close() }}  
        </div>
    </div>



</div>

</div>

</div>
</div>





    @stop
