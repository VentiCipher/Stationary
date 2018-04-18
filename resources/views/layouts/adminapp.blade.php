@extends('layouts.app')

@section('contenter')


    {{--<div class="container-fluid">--}}
        <div class="row">
            <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar removepadding ">

                <ul class="nav nav-pills flex-column marginbot20">
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('dashboardindex') }} blackfont"
                           href="{{route('dashboardindex')}}">Administrator Dashboard <span
                                    class="sr-only">(current)</span></a>
                    </li>

                    <!-- <div class="text-center">----------------------------------</div> -->
                </ul>


                <ul class="nav nav-pills flex-column marginbot20">


                    <li class="nav-item">

                        <a class="nav-link {{ isActiveRoute('cat.edit') }} blackfont">⚫Categories Management</a>


                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('addcat') }} blackfont" href="{{route('addcat')}}">Add
                            Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('indexcat') }} blackfont" href="{{route('indexcat')}}">Edit/View
                            Categories</a>
                    </li>


                </ul>


                <ul class="nav nav-pills flex-column marginbot20">


                    <li class="nav-item">

                        <a class="nav-link {{ isActiveRoute('acc.edit') }} blackfont">⚫Users Management</a>


                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('acc.show.add') }} blackfont"
                           href="{{route('acc.show.add')}}">Add Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('acc.index') }} blackfont" href="{{route('acc.index')}}">View
                            All Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('acc.show.manage') }} blackfont"
                           href="{{route('acc.show.manage')}}">Dealers Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('acc.show.approve') }} blackfont"
                           href="{{route('acc.show.approve')}}">Pending Dealers Approval</a>
                    </li>


                </ul>

                <ul class="nav nav-pills flex-column marginbot20">


                    <li class="nav-item">

                        <a class="nav-link {{ isActiveRoute('acc.edit') }} blackfont">⚫Product Dealers Management</a>


                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('acc.index') }} blackfont" href="{{route('acc.index')}}">View
                            All Product</a>
                    </li>

                    <li class="nav-item nav-link">

                        <form method="POST" action="{{ route('admin.prod.show.search') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="text" name="searcher" placeholder="Search all Product ...">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>


                </ul>

            </nav>

                @yield('content')

        </div>
    {{--</div>--}}

@endsection
