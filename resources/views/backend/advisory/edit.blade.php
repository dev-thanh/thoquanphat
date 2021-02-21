@extends('backend.layouts.app')
@section('controller','Đăng ký tư vấn')
@section('controller_route',route('get.list.advisory'))
@section('action','Chi tiết')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
				<form action="" method='POST' enctype="multipart/form-data" name="frmEditProduct">
			        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

			        <div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			                <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Đăng ký tư vấn</a></li>
			            </ul>
			            <div class="tab-content">
			                <div class="tab-pane active" id="activity">
			                    <div class="row">
			                        
			                        <div class="col-lg-6">
			                            <div class="form-group">
			                                <label>Họ tên</label>
			                                <input type="text" class="form-control" name="name" id="name"
			                                       value="{!! old('name', isset($data) ? $data->name : null) !!}" readonly>
			                            </div>

			                            <div class="form-group">
			                                <label>Số điện thoại</label>
			                                <input type="text" class="form-control" name="phone" value="{!! old('phone', isset($data) ? $data->phone : null) !!}" readonly>
			                            </div>
			                          
		                                <div class="form-group" style="">
		                                    <label>Địa điểm xây dựng</label>                           
		                                    <textarea class="form-control" name="building_site" readonly="">{{ isset($data) ? $data->building_site : null }}</textarea>
		                                </div>
		                                <div class="form-group" style="">
		                                    <label>Nội dung tư vấn</label>                           
		                                    <textarea class="form-control" name="advisory_content" readonly="">{{ isset($data) ? $data->advisory_content : null }}</textarea>
		                                </div>
			                           
			                            <div class="form-group">
			                                <label class="text-danger">Trạng thái</label> <br>
			                                <input type="checkbox" name="status" value="1" id="active" checked>
			                                <label for="active" class="lbl">Đã xem</label>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			       <!--  <button type="submit" class="btn btn-primary">Cập nhật</button> -->
			    </form>
            </div>
        </div>
    </div>
@stop