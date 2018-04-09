@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
   @if (Session::has('info'))
    <div class="alert alert-info">{{ Session::get('info') }}</div>
    @endif
    <!-- courses list -->
    @if(!empty($cat))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>All Categories List </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('addcat') }}"> Add New Categories</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th width="15%">Categories Name</th>
                         <th width="10%">Created By</th>
                        <th width="10%">Modified</th>
                        <th width ="25%">Description</th>
                        <th width="10%">Updated</th>
                        
                        <th width="20%">Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                    @foreach($cat as $post)
                        <tr>
                            <td class="table-text">
                                <div>{{$post->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$post->createby}}</div>
                            </td>
                            <td class="table-text">
                                <div> {{$post->updated_at}}</div>
                            </td>
                            <td class="table-text" style="overflow: auto;">
                                <div>{{$post->description}}</div>
                            </td>
                                <td class="table-text">
                                <div>{{$post->created_at}}</div>
                            </td>
                            <td>
                               
                                <a href="{{ route('cat.edit', $post->id) }}" class="badge badge-success">Edit</a>
                                <a href="{{ route('cat.delete', $post->id) }}" class="badge badge-danger"  onclick="return confirm('Are you sure to delete this Categories? Once you done you cannot undo!')" >Delete</a>
                              <!--   <span class="badge badge-default">Default</span>
<span class="badge badge-primary">Primary</span>
<span class="badge badge-success">Success</span>
<span class="badge badge-info">Info</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-danger">Danger</span> -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
     <div class="pull-left">
        <label><h2>There's Empty Categories Currently</h2></label>
    </div>
        <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('addcat') }}"> Add New Categories</a>
                </div>
    @endif
    </div>
</div>
@endsection