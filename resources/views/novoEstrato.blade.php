@extends('layout')

@section('content')
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo url('/')?>">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Estratos</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"> </li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> Cadastro de Estrato
        <small><!--texto ao lado do titulo em fonte menor--></small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN FORM-->
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="<?php echo url('/') ?>/estrato" class="form-horizontal" method="post">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_0">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i>Dados do Estrato</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <!--<a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>-->
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <!--<form action="createCliente" class="form-horizontal" method="post">-->

                            <input value="{{ csrf_token() }}" type="hidden" name="_token"/>
                            <input value="{{{$estrato->id or ''}}}" type="hidden" name="id"/>

                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Código</label>
                                        <div class="col-md-2">
                                            <input value="{{{$estrato->cod or ''}}}" type="text" class="form-control" placeholder="Código" name="cod" id="cod" {{isset($estrato) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                            <!--<span class="help-block"> A block of help text. </span>-->
                                        </div>
                                    <!--</div>-->
                                    <!--<div class="form-group">-->
                                        <label class="col-md-1 control-label">Descrição</label>
                                        <div class="col-md-5">
                                            <input value="{{{$estrato->descricao or ''}}}" type="text" class="form-control" placeholder="Descrição" name="descricao" id="descricao" {{isset($estrato) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                            <!--<span class="help-block"> A block of help text. </span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Área</label>
                                        <div class="col-md-2">
                                            <input value="{{{$estrato->area or ''}}}" type="text" class="form-control" placeholder="Área" name="area" id="area" {{isset($estrato) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                            <!--<span class="help-block"> A block of help text. </span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-9">
                                        <button type="submit" class="btn btn green">Salvar</button>
                                        <button type="button" class="btn btn grey-salsa btn-outline">Cancelar</button>
                                    </div>
                                </div>
                            </div>-->
                        <!--</form>-->
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <button type="button" class="btn btn blue" id="estratoNovo" {{isset($estrato) ? (isset($visualizar) ? '' : 'disabled') : ''}}>{{isset($visualizar) ? 'Editar' : 'Novo'}}</button>
                <button type="submit" class="btn btn green" id="estratoSalvar" {{isset($estrato) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>Salvar</button>
                <button type="reset" class="btn btn grey-salsa btn-outline" id="estratoCancelar" {{isset($estrato) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>Cancelar</button>
            </div>
        </div>
    </form>
    <!-- END FORM-->
    <br>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-archive"></i>Estratos Cadastrados</div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                    <tr>
                        <th> Código </th>
                        <th> Descrição </th>
                        <th> Área </th>
                        <th class="col-md-1"> Talhão </th>
                        <th class="col-md-1"> Visualizar </th>
                        <th class="col-md-1"> Editar </th>
                        <th class="col-md-1"> Remover </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($estratos))
                        @foreach($estratos as $e)
                            <tr>
                                <td>{{$e->cod}}</td>
                                <td>{{$e->descricao}}</td>
                                <td>{{$e->area}}</td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/talhao/{{$e->id}}"><span class="glyphicon glyphicon-zoom-in"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/estrato/visualizar/{{$e->id}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/estrato/{{$e->id}}"><span class="fa fa-edit"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/deletarEstrato/{{$e->id}}"><span class="fa fa-trash"></span></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END CONTENT BODY -->
@endsection
