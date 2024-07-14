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
                    <li class="breadcrumb-item active">All Courses</li>
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
                <h5 class="card-title">All Courses</h5>
                <div class="list-icons text-right">
                    <a href="{{route('course.create')}}" class="btn btn-primary">
                        Add Courses
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <th style="width:10%">S.No.</th>
                    <th style="width:15%">Course Name</th>
                    <th style="width:15%">Thumbnail</th>
                    <th style="width:30%">Description</th>
                    <th style="width:10%">Status</th>
                    <th style="width:20%">Action</th>
    
                </thead>
                <tbody>
                    <?php
                    if (app('request')->input('page_content')) {
                        $page_limit = app('request')->input('page_content');
                    } else {
                        $page_limit = 25;
                    }
                    app('request')->input('page') > 1 ? ($i = $page_limit * (app('request')->input('page') - 1)) : ($i = 0);
                    ?>
                    
                    @foreach($courses as $key=>$row)
                    <tr>
                        <td>{{$i+$key+1}}</td>
                        <td>{{$row->name}}</td>
                        <td>                            
                            <img src="{{asset('uploads/courses/'.$row->thumbnail)}}" class="w-20 text-center">
                        </td>
                        {{-- <td><img src="{{asset('uploads/courses/'.$row->thumbnail)}}"> --}}
                        <td>{!! $row->description !!}</td>
                        <td>
                            @if ($row->status == 'inactive')
                                <span class="badge badge-warning">Pending</span>
                            @elseif($row->status == 'active')
                                <span class="badge badge-success">Active</span>
                            @endif
                        </td>
                        <td>
                            <a title="View Application"
                                href="{{ url('admin/course/edit/'. $row->id) }}"
                                class="btn btn-icon text-till-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a title="Delete"
                                href="{{ url('admin/course/delete/'. $row->id) }}"
                                class="btn btn-icon text-till-600">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </section>
</div>
@endsection