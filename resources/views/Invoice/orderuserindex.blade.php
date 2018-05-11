@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
   @if (Session::has('info'))
    <div class="alert alert-info">{{ Session::get('info') }}</div>
    @endif
    <!-- courses list -->
    @if(!empty($order))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Order List </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('index') }}"> Start Shopping</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th width="15%">Order ID</th>
                         <th width="20%">Ordered at</th>
                        <th width="20%">State</th>
                        <th width ="20%">Method</th>
                        <th width="10%">Total</th>
                        
                        <th width="15%">Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                    @foreach($order as $post)
                        <tr>
                            <td class="table-text">
                                <div>{{$post->ordercode}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$post->created_at}}</div>
                            </td>
                            <td class="table-text">

                                @if(!is_null($post->payments_id))
                                <div> @if($post->payments->state == "1")
                                        <span class="badge badge-info">Pending</span>
                                @elseif($post->payments->state == "2")
                                        <span class="badge badge-light">Preparing</span>
                                @elseif($post->payments->state == "3")
                                        <span class="badge badge-warning">In Delivery Process</span>
                                @elseif($post->payments->state == "4")
                                        <span class="badge badge-success">Delivered</span>
                                @else
                                        <span class="badge badge-danger">Faild Payment</span>
                                @endif</div>@endif
                            </td>
                            <td class="table-text" style="overflow: auto;">
                                <div>{{$post->methods}}</div>
                            </td>
                                <td class="table-text">
                                <div>฿{{$post->total}}</div>
                            </td>
                            <td>
                                @if($post->payments_id != null)
                                <a href="{{ route('public.order.status', $post->id) }}" class="badge badge-primary">Check Status</a>
                                <a href="{{ route('invoice.generate', $post->id) }}" class="badge badge-warning">See Invoice</a>
                                @endif
                                @if($post->payments_id == null)
                                <a href="{{ route('invoice.trypaid.credit', $post->id) }}" class="badge badge-success">Pay this Order</a>
                                <a href="{{ route('invoice.cancel', $post->id) }}" class="badge badge-danger">Cancel Order</a>
                                    @elseif($post->methods == "transfer")
                                    <a href="{{ route('invoice.receipt', $post->id) }}" class="badge badge-warning">See Receipt</a>
                                @endif
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
        <label><h2>There's Empty Order Currently Go Buy Some!</h2></label>
    </div>
        <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('index') }}">Go Shopping</a>
                </div>
    @endif
    </div>
</div>
@endsection