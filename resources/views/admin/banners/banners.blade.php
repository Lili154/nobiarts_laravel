@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@lang('public.home page banners')</h4>




                            <a href="{{ url('admin/add-edit-banner') }}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-primary">@lang('public.add banner')</a>



                            @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>@lang('public.success:')</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="banners" class="table table-bordered"> {{-- using the id here for the DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>@lang('public.image')</th>
                                            <th>@lang('public.type')</th>
                                            <th>@lang('public.link')</th>
                                            <th>@lang('public.title')</th>
                                            <th>@lang('public.alt')</th>
                                            <th>@lang('public.status')</th>
                                            <th>@lang('public.actions')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td>{{ $banner['id'] }}</td>
                                                <td>
                                                    <img style="width: 180px" src="{{ asset('front/images/banner_images/' . $banner['image']) }}">
                                                </td>
                                                <td>{{ $banner['type'] }}</td>
                                                <td>{{ $banner['link'] }}</td>
                                                <td>{{ $banner['title'] }}</td>
                                                <td>{{ $banner['alt'] }}</td>
                                                <td>
                                                    @if ($banner['status'] == 1)
                                                        <a class="updateBannerStatus" id="banner-{{ $banner['id'] }}" banner_id="{{ $banner['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>
                                                        </a>
                                                    @else
                                                        <a class="updateBannerStatus" id="banner-{{ $banner['id'] }}" banner_id="{{ $banner['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-banner/' . $banner['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i>
                                                    </a>

                                                    {{-- Confirm Deletion JS alert and Sweet Alert --}}
                                                    {{-- <a title="Banner" class="confirmDelete" href="{{ url('admin/delete-banner/' . $banner['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Icons from Skydash Admin Panel Template --}}
                                                    {{-- </a> --}}
                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="banner" moduleid="{{ $banner['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i>
                                                    </a>
                                                </td>
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
