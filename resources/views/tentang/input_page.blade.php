@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tentang
            <!-- <small>Control panel</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tentang</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                @if(Session::get('alert'))
                    <div class="alert alert-danger" id="alert">
                        <div style="text-align: center;">{{Session::get('alert')}}</div>
                    </div>
                @endif
                @if(Session::get('success'))
                    <div class="alert alert-success" id="alert">
                        <div style="text-align: center;">{{Session::get('success')}}</div>
                    </div>
                @endif
    
                <h3 class="box-title">Tentang</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ url('/tentang/store') }}" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>Judul<b style="color: red;">*</b></label>
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>Sub Judul<b style="color: red;">*</b></label>
                                    <input type="text" name="sub_judul" id="sub_judul" class="form-control" placeholder="Sub Judul" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Konten</label>
                                    <textarea name="konten" id="konten" class="form-control" rows="10" cols="80" data-sample-short></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="box-footer col-md-12">
                                    <div class="pull-right">
                                        <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection