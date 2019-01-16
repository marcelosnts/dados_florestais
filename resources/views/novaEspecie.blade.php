@extends('layout')

@section('content')
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo url('/') ?>">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Nova Especie</a>
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
    <h1 class="page-title"> Cadastro de Especie
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
    <form action="<?php echo url('/') ?>/especie" class="form-horizontal" method="post">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_0">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i>Dados da Especie</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <!--<a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>-->
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <input value="{{ csrf_token() }}" type="hidden" name="_token"/>
                        <input value="{{{$especie->id or ''}}}" type="hidden" name="id"/>

                        <div class="form-body">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label">Nome Popular</label>
                                    <div class="col-md-4">
                                        <input id="nome" value="{{{$especie->nome or ''}}}" type="text" class="form-control" placeholder="Nome Popular" name="nome" {{isset($especie) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                        <!--<span class="help-block"> A block of help text. </span>-->
                                    </div>
                                <!--</div>-->
                                <!--<div class="form-group">-->
                                    <label class="col-md-1 control-label">Nome Científico</label>
                                    <div class="col-md-4">
                                        <input id="nome_cientifico" value="{{{$especie->nome_cientifico or ''}}}" type="text" class="form-control" placeholder="Nome Científico" name="nome_cientifico" {{isset($especie) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                        <!--<span class="help-block"> A block of help text. </span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <button type="button" id="novoEspecie" class="btn btn blue" {{isset($especie) ? (isset($visualizar) ? '' : 'disabled') : ''}}>{{isset($visualizar) ? 'Editar' : 'Novo'}}</button>
                <button type="submit" id="salvarEspecie" class="btn btn green" {{isset($especie) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>Salvar</button>
                <button type="button" id="cancelarEspecie" class="btn btn grey-salsa btn-outline" {{isset($especie) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>Cancelar</button>
            </div>
        </div>
    </form>
    <!-- END FORM-->
    <br>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-archive"></i>Espécies Cadastradas</div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                    <tr>
                        <th class="col-md-5"> Nome Popular </th>
                        <th class="col-md-5"> Nome Científico </th>
                        <th class="col-md-1"> Visualizar </th>
                        <th class="col-md-1"> Editar </th>
                        <th class="col-md-1"> Remover </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($especies))
                        @foreach($especies as $e)
                            <tr>
                                <td>{{$e->nome}}</td>
                                <td>{{$e->nome_cientifico}}</td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/especie/visualizar/{{$e->id}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/especie/{{$e->id}}"><span class="fa fa-edit"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/deletarEspecie/{{$e->id}}"><span class="fa fa-trash"></span></a></td>
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
