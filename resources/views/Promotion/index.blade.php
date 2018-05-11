@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            @if (Session::has('info'))
                <div class="alert alert-info">{{ Session::get('info') }}</div>
            @endif
        <!-- courses list -->
            @if(!empty($promo))
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Coupon/Promotion List </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('promo.showadd') }}"> Add New Coupon/Promotion</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th width="15%">Coupon Code</th>
                            <th width="10%">Created By</th>
                            <th width="10%">Discount</th>
                            <th width="25%">Description</th>
                            <th width="10%">Free-ship</th>
                            <th width="10%">Limit Use</th>
                            <th width="20%">Action</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($promo as $post)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$post->promocoder}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$post->createby}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div> {{$post->salemore}}</div>
                                    </td>
                                    <td class="table-text" style="overflow: auto;">
                                        <div>{{$post->info}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$post->freeship}}</div>
                                    </td>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$post->limit}}</div>
                                    </td>
                                    <td>

                                        <a href="{{ route('promo.edit', $post->id) }}"
                                           class="badge badge-success">Edit</a>
                                        <a href="{{ route('promo.remove', $post->id) }}" class="badge badge-danger"
                                           onclick="return confirm('Are you sure to delete this Coupon ? Once you done you cannot undo!')">Delete</a>
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
                    <label><h2>There's Empty Coupon/Promotion Code Currently</h2></label>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('promo.showadd') }}"> Add New Coupon/Promotion</a>
                </div>
            @endif
        </div>
    </div>
@endsection