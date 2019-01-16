@extends('layout')

@section('content')
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Detalhes da Parcela {{$parcela->descricao}}</span>
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
    <h1 class="page-title"> Detalhes
        <small><!--texto ao lado do titulo em fonte menor--></small>
    </h1>
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-users"></i>
                <!--TITULO DA BLUE BOX-->
                Detalhes da Parcela {{$parcela->descricao}}
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <!--<a href="#portlet-config" data-toggle="modal" class="config"> </a>
                <a href="javascript:;" class="reload"> </a>
                <a href="javascript:;" class="remove"> </a>-->
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="col-md-6">Área m²</th>
                        <td class="col-md-6">{{$parcela->area}}m²</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Declividade</th>
                        <td class="col-md-6">{{$parcela->declividade}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Largura</th>
                        <td class="col-md-6">{{$parcela->largura}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Comprimento</th>
                        <td class="col-md-6">{{$parcela->comprimento}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Latitude</th>
                        <td class="col-md-6">{{$parcela->latitude}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Longitude</th>
                        <td class="col-md-6">{{$parcela->longitude}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Formato</th>
                        <td class="col-md-6">{{$parcela->formato}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-users"></i>
                <!--TITULO DA BLUE BOX-->
                Detalhes do Talhão {{$parcela->talhao->descricao}}
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <!--<a href="#portlet-config" data-toggle="modal" class="config"> </a>
                <a href="javascript:;" class="reload"> </a>
                <a href="javascript:;" class="remove"> </a>-->
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="col-md-6">Código</th>
                        <td class="col-md-6">{{$parcela->talhao->cod}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Área m²</th>
                        <td class="col-md-6">{{$parcela->talhao->area}}m²</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Data do Plantio</th>
                        <td class="col-md-6">{{$parcela->talhao->data_plantio}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Arquivo KML</th>
                        <td class="col-md-6">{{$parcela->talhao->nome_arquivo}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-users"></i>
                <!--TITULO DA BLUE BOX-->
                Detalhes do Estrato {{$parcela->talhao->estrato->descricao}}
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <!--<a href="#portlet-config" data-toggle="modal" class="config"> </a>
                <a href="javascript:;" class="reload"> </a>
                <a href="javascript:;" class="remove"> </a>-->
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="col-md-6">Código</th>
                        <td class="col-md-6">{{$parcela->talhao->estrato->cod}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-6">Área m²</th>
                        <td class="col-md-6">{{$parcela->talhao->area}}m²</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->                
</div>

@endsection
