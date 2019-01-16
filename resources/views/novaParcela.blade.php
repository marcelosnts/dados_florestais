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
                <a href="<?php echo url('/')?>/estrato/{{$talhao->estrato->id}}">{{$talhao->estrato->descricao}}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo url('/')?>/talhao/editar/{{$talhao->id}}">{{$talhao->descricao}}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Parcelas</span>
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
    <h1 class="page-title"> Cadastro de Parcela
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
    <form action="<?php echo url('/') ?>/parcela/{{$talhao->id}}" class="form-horizontal" method="post">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_0">
                <!--<div class="row">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Talhão</label>
                        <div class="col-md-5">
                            <select class="form-control" name="input_talhao" id="input_talhao">
                                @foreach($talhoes as $t)
                                    <option value="{{$t->id}}" {{isset($parcela) ? $parcela->talhao_id == $t->id ? 'selected' : '' : ''}}>
                                        {{$t->descricao}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <a href="javascript:;" class="btn green" id="selecionarTalhao">Selecionar</a>
                        <a href="javascript:;" class="btn red" id="naoSelecionarTalhao" disabled>Alterar</a>
                    </div>
                </div>-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i>Dados da Parcela</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <!--<a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>-->
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <input value="{{ csrf_token() }}" type="hidden" name="_token"/>
                        <input value="{{{$parcela->id or ''}}}" type="hidden" name="id"/>
                        <input value="{{{$talhao->id or $parcela->talhao_id}}}" type="hidden" name="talhao_id" id="talhao_id"/>
                        <input value="{{{$talhao->nome_arquivo or ''}}}" type="hidden" id="parcela_kml"/>
                        <input value="parcela" type="hidden" id="tela"/>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Descrição</label>
                                            <div class="col-md-4">
                                                <input id="descricao" value="{{{$parcela->descricao or ''}}}" type="text" class="form-control" placeholder="Descrição" name="descricao" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Declividade</label>
                                            <div class="col-md-4">
                                                <input id="declividade" value="{{{$parcela->declividade or ''}}}" type="text" class="form-control" placeholder="Declividade" name="declividade" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                            <label class="col-md-2 control-label">Formato</label>
                                            <div class="col-md-4">
                                                <select id="formato" class="form-control" name="formato" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                    <option value="Retangular" {{isset($parcela) ? $parcela->formato == "Retangular" ? 'selected' : '' : ''}}>Retangular</option>
                                                    <option value="Circular" {{isset($parcela) ? $parcela->formato == "Circular" ? 'selected' : '' : ''}}>Circular</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label id="lblComprimento" class="col-md-2 control-label">Comprimento</label>
                                            <div class="col-md-4">
                                                <input id="comprimento" value="{{{$parcela->comprimento or ''}}}" type="text" class="form-control" placeholder="Comprimento" name="comprimento" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                            <label class="col-md-2 control-label">Largura</label>
                                            <div class="col-md-4">
                                                <input id="largura" value="{{{$parcela->largura or ''}}}" type="text" class="form-control" placeholder="Largura" name="largura" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Latitude</label>
                                            <div class="col-md-4">
                                                <input id="latitude" value="{{{$parcela->latitude or ''}}}" type="text" class="form-control" placeholder="Latitude" name="latitude" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                            <label class="col-md-2 control-label">Longitude</label>
                                            <div class="col-md-4">
                                                <input id="longitude" value="{{{$parcela->longitude or ''}}}" type="text" class="form-control" placeholder="Longitude" name="longitude" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Área</label>
                                            <div class="col-md-4">
                                                <input id="area" value="{{{$parcela->area or ''}}}" type="text" class="form-control" placeholder="Área" name="area" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                <!--<span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                            <label class="col-md-2 control-label">Espécie</label>
                                            <div class="col-md-4">
                                                <select id="especie_id" class="form-control" name="especie_id" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>
                                                    @foreach($especies as $e)
                                                        <option value="{{$e->id}}" {{isset($parcela) ? $parcela->especie_id == $e->id ? 'selected' : '' : ''}}>{{$e->nome}} | {{$e->nome_cientifico}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="map" style="height: 250px"></div>
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
            <div class="col-md-9">
                <button type="button" id="novoParcela" class="btn btn blue" {{isset($parcela) ? (isset($visualizar) ? '' : 'disabled') : ''}}>{{isset($visualizar) ? 'Editar' : 'Novo'}}</button>
                <button type="submit" id="salvarParcela" class="btn btn green" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>Salvar</button>
                <button type="button" id="cancelarParcela" class="btn btn grey-salsa btn-outline" {{isset($parcela) ? (isset($visualizar) ? 'disabled' : '') : 'disabled'}}>Cancelar</button>
            </div>
        </div>
    </form>
    <!-- END FORM-->
    <br>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-archive"></i>Parcelas Cadastradas</div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                    <tr>
                        <th> Descrição </th>
                        <th> Área </th>
                        <th> Talhão </th>
                        <th class="col-md-1"> Visualizar </th>
                        <th class="col-md-1"> Editar </th>
                        <th class="col-md-1"> Remover </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($parcelas))
                        @foreach($parcelas as $p)
                            <tr>
                                <td>{{$p->descricao}}</td>
                                <td>{{$p->area}}</td>
                                <td>{{$p->talhao['descricao']}}</td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/parcela/visualizar/{{$p->id}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/parcela/editar/{{$p->id}}"><span class="fa fa-edit"></span></a></td>
                                <td class="col-md-1"><a href="<?php echo url('/'); ?>/deletarParcela/{{$p->id}}"><span class="fa fa-trash"></span></a></td>
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
