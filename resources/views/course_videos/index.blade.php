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
                <h5 class="card-title">All Course Videos</h5>
                <div class="list-icons text-right">
                    <a href="{{route('course_videos.create')}}" class="btn btn-primary">
                        Add Course Videos
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <th>S.No.</th>
                    <th>Course Video Name</th>
                    <th>Course</th>
                    <th>Thumbnail</th>
                    <th>Description</th>
                    <th>Video</th>
                    <th>Status</th>
                    <th>Action</th>
    
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
                    
                    @foreach($course_videos as $key=>$row)
                    <tr>
                        <td>{{$i+$key+1}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->course ? $row->course->name : "N/A"}}</td>
                        <td><img src="{{url('public/uploads/course_videos/'.$row->thumbnail)}}">
                        <td>{!! $row->description !!}</td>
                        <td>
                            <video width="100" height="50" autoplay>
                                <source src="{{url('public/uploads/course_videos/'.$row->file)}}" type="video/mp4">
                              </video>    
                        </td>
                        <td>
                            @if ($row->status == 0)
                                <span class="badge badge-warning">Pending</span>
                            @elseif($row->status == 1)
                                <span class="badge badge-success">Active</span>
                            @endif
                        </td>
                        <td>
                            <a title="View Application"
                                href="{{ url('admin/course_video/edit/'. $row->id) }}"
                                class="btn btn-icon text-till-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a title="Delete"
                                href="{{ url('admin/course_video/delete/'. $row->id) }}"
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