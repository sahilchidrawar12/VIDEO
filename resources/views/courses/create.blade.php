@extends('admin.layout.admin-layout')
@section('title') Admin Dashboard @endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Courses</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add Courses</h5>
                <div class="header-elements">
                    <div class="list-icons"></div>
                </div>
            </div>
            {!! Form::open(['route' => 'course.store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id'=>'add_course']) !!}
            <div class="card-body row">                
                <div class="col-md-05 col-sm-12 col-xs-12">
                    <div class="form-group row">
                        {!! Html::decode(
                            Form::label('Name', 'Title <span class="error">*</span>', ['class' => 'col-lg-3 col-form-label'])) !!}
                        <div class="col-lg-9">
                            {!! Form::text('name',app('request')->input('name'), ['class' => 'form-control']) !!}
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif 
                        </div>
                    </div>
                </div>
                <div class="col-md-05 col-sm-12 col-xs-12">
                    <div class="form-group row">
                        {!! Html::decode (Form::label ('', 'Tumbnail <span class="error">*</span>', ['class' => 'file col-lg-3 col-form-label']))!!}
                        <div class="col-lg-9">
                            <div class="input-group">
                                {!! Form::file ('thumbnail', ['class' => 'form-control','accept'=>'image/jpeg,image/gif,image/png,application/pdf'] )!!}
                            </div>
                            
                            @error('thumbnail')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" style="max-width:12.5%">Description<span class="error">*</span></label>
                        <div class="col-lg-8 col-md-12 col-sm-12" style="max-width:100%;flex:87.5%">
                            {!! Form::textarea('description', app('request')->input('description'), [
                                'class' => 'form-control content',
                                'placeholder' => 'content']) !!}
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif  
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 m-t-15 m-b-20 m-r-10" style="text-align:right">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-raised wave-effect text-right']) !!}
                </div>
            </div>
            {{ Form::close() }}
            <!-- /default ordering -->
        </div>

    </section>
</div>
@endsection
