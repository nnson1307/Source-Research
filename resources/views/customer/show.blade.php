@extends('layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        @include('breadcrumb', ['module' => 'Admin', 'view' => 'Customers'])

        <h2 class="h4">Detail Customer</h2>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{route('customers.index')}}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
            </svg>
            Back
        </a>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Full name</label>
            <input type="text" class="form-control" value="{{$info['full_name']}}" disabled>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="text" class="form-control" value="{{$info['phone']}}" disabled>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Birthday</label>
            <input type="text" class="form-control" value="{{\Carbon\Carbon::parse($info['birthday'])->format('d/m/Y')}}" disabled>
        </div>

        <div class="mb-3">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Company</th>
                            <th class="border-0">Start date</th>
                            <th class="border-0">End date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($info->profiles) > 0)
                            @foreach($info->profiles as $k => $v)
                                 <!-- Item -->
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$v['company_name']}}</td>
                                    <td>{{\Carbon\Carbon::parse($v['date_start'])->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($v['date_end'])->format('d/m/Y')}}</td>
                                </tr>
                                <!-- End of Item -->
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@section('after_style')
<link rel="stylesheet" href="{{asset('static/css/customize.css')}}">
@endsection

@section('after_script')

@endsection