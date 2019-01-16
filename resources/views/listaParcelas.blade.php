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
                <a href="#">Visualizar Todos</a>
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
    <h1 class="page-title"> Lista de Talhões
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
    <div class="tab-content">
        <div class="tab-pane active" id="tab_0">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>Parcelas</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <!--<a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>-->
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Descrição </th>
                                    <th> Área m² </th>
                                    <th> Talhão </th>
                                    <th> Estrato </th>
                                    <th> Detalhes </th>
                                    <th> Editar </th>
                                    <th> Remover </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parcelas as $p)
                                    <tr>
                                        <td> {{$p->descricao}} </td>
                                        <td> {{$p->area}}m² </td>
                                        <td> {{$p->especie->nome_cientifico}} </td>
                                        <td> {{$p->talhao->descricao}} </td>
                                        <td> <a href="<?php echo url('/') ?>/parcela/{{$p->id}}"><span class="fa fa-search"></span></a> </td>
                                        <td> <a href="#"><span class="fa fa-edit"></span></a> </td>
                                        <td> <a href="#"><span class="fa fa-trash"></span></a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT BODY -->
@endsection
