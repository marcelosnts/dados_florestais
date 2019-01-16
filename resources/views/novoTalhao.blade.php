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
                <a href="<?php echo url('/')?>/estrato/{{$estrato->id}}">{{$estrato->descricao}}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Talhões</span>
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
    <h1 class="page-title"> Cadastro de Talhão
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
    <form action="<?php echo url('/'); ?>/talhao/{{$estrato->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_0">
                <!--<div class="row">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Estrato</label>
                        <div class="col-md-5">
                            <select class="form-control" name="input_estrato" id="input_estrato">
                                @foreach($estratos as $e)
                                    <option value="{{$e->id}}" {{isset($talhao) ? $talhao->estrato_id == $e->id ? 'selected' : '' : ''}}>
                                        {{$e->descricao}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <a href="javascript:;" class="btn green" id="selecionarEstrato">Selecionar</a>
                        <a href="javascript:;" class="btn red" id="naoSelecionarEstrato" disabled>Alterar</a>
                    </div>
                </div>-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i>Dados do Talhão</div>
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
                        <input value="{{{$talhao->id or ''}}}" type="hidden" name="id" id="id"/>
                        <input value="{{{$talhao->nome_arquivo or ''}}}" type="hidden" id="talhao_kml" name="talhao_kml"/>
                        <input value="{{{$estrato->id or $talhao->estrato_id}}}" type="hidden" id="estrato_id" name="estrato_id"/>
                        <input value="talhao" type="hidden" id="tela"/>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Código</label>
                                            <div class="col-md-9">
                                                <input type="text" id="cod" class="form-control" placeholder="Código" name="cod" value="{{{$talhao->cod or ''}}}" {{isset($talhao) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Descrição</label>
                                            <div class="col-md-9">
                                                <input type="text" id="descricao" class="form-control" placeholder="Descrição" name="descricao" value="{{{$talhao->descricao  or ''}}}" {{isset($talhao) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Área</label>
                                            <div class="col-md-9">
                                                <input type="text" id="area" class="form-control" placeholder="Área" name="area" value="{{{$talhao->area or ''}}}" {{isset($talhao) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Data do Plantio</label>
                                            <div class="col-md-9">
                                                <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-date-start-date="+0d">
                                                    <span class="input-group-btn">
                                                        <button class="btn default" type="button" id="data_plantio_calendario" {{isset($talhao) ? '' : 'disabled'}}>
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </span>
                                                    <input type="text" class="form-control" name="data_plantio" id="data_plantio" readonly="" value="{{{$talhao->data_plantio or ''}}}" {{isset($talhao) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Data do Plantio</label>
                                            <div class="col-md-9">
                                                <input type="date" id="talhaoData_plantio" class="form-control date-picker" placeholder="Data do Plantio" name="data_plantio" value="{{{$talhao->data_plantio or ''}}}" {{isset($talhao) ? '' : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>--
                                            </div>
                                        </div>
                                    </div>-->
                                    <!--<span class="row"></span>
                                    <!--<div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Estrato</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="estrato_id">
                                                    @foreach($estratos as $e)
                                                        <option value="{{$e->id}}">
                                                            {{$e->descricao}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <!--<span class="help-block"> A block of help text. </span>--
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="kml" class="col-md-3 control-label">Upload KML</label>
                                            <div class="col-md-9">
                                                <input id="arquivoKml" name="kml" type="file" {{isset($talhao) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <p class="help-block">Selecione um arquivo KML.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="map" style="height: 250px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br/>
                                            <a href="<?php echo url('/') ?>/removerKml/{{isset($talhao) ? $talhao->id : ''}}/{{isset($talhao) ? $talhao->nome_arquivo : ''}}" type="button" id="removerKml"
                                            class="btn red pull-right {{isset($talhao) ? ($talhao->nome_arquivo == '' ? 'disabled' : '') : 'disabled'}}">Remover Kml</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn blue" id="talhaoNovo" {{isset($talhao) ? (isset($visualizar) ? '' : 'disabled') : ''}}>{{isset($visualizar) ? 'Editar' : 'Novo'}}</button>
                <button type="submit" class="btn green" id="talhaoSalvar" {{isset($talhao) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>Salvar</button>
                <button type="reset" class="btn grey-salsa btn-outline" id="talhaoCancelar" {{isset($talhao) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>Cancelar</button>
            </div>
        </div>
    </form>
    <!-- END FORM-->
    <br>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-archive"></i>Talhões Cadastrados</div>
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
                        <th> Estrato </th>
                        <th class="col-md-1"> Parcela </th>
                        <th class="col-md-1"> Visualizar </th>
                        <th class="col-md-1"> Editar </th>
                        <th class="col-md-1"> Remover </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($talhoes))
                        @foreach($talhoes as $t)
                            <tr>
                                <td>{{$t->cod}}</td>
                                <td>{{$t->descricao}}</td>
                                <td>{{$t->area}}</td>
                                <td>{{$t->estrato->descricao}}</td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/parcela/{{$t->id}}"><span class="glyphicon glyphicon-zoom-in"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/talhao/visualizar/{{$t->id}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/talhao/editar/{{$t->id}}"><span class="fa fa-edit"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/deletarTalhao/{{$t->id}}"><span class="fa fa-trash"></span></a></td>
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
