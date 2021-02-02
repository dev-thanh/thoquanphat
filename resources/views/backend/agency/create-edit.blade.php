@extends('backend.layouts.app')
@section('controller', $module['name'] )
@section('controller_route', route($module['module'].'.index'))
@section('action', renderAction(@$module['action']))
@section('content')
	<div class="content">
		<div class="clearfix"></div>
       	@include('flash::message')
       	<form action="{!! updateOrStoreRouteRender( @$module['action'], $module['module'], @$data) !!}" method="POST">
			@csrf
			@if(isUpdate(@$module['action']))
		        {{ method_field('put') }}
		    @endif
			<div class="row">
				<div class="col-sm-9">
					<div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin đại lý</a>
							</li>
		                </ul>
		                <div class="tab-content">
							<?php if(!empty($data->content)){
								$content = json_decode($data->content);
							} ?>
		                    <div class="tab-pane active" id="activity">
		                    	<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Khu vực</label>
											<select name="area" class="form-control">
												<option value="mien-bac">Miền Bắc</option>
												<option value="mien-trung">Miền Trung</option>
												<option value="mien-nam">Miền Nam</option>
											</select>
										</div>
									</div>
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
		                                    <label>Tên đại lý</label>
		                                    <input type="text" class="form-control" name="name" id="name" value="{!! old('name', @$data->name) !!}">
		                                </div>
		                                <div class="form-group">
		                                    <label>Địa chỉ</label>
		                                    <input type="text" class="form-control" name="address" id="address" value="{!! old('address', @$data->address) !!}">
		                                </div>
		                                <div class="form-group">
		                                    <label>Số điện thoai</label>
		                                    <input type="text" class="form-control" name="phone" id="phone" value="{!! old('phone', @$data->phone) !!}">
		                                </div>
		                                <div class="form-group">
		                                    <label>Fax</label>
		                                    <input type="text" class="form-control" name="fax" id="fax" value="{!! old('fax', @$data->fax) !!}">
		                                </div>
		                    		</div>
		                    	</div>
							</div>
							
						</div>
						
		            </div>
				</div>
				<div class="col-sm-3">
					<div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Đăng</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group">
                                <label class="custom-checkbox">
		                        	@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="status" value="1" {{ @$data->status == 1 ? 'checked' : null }}> Hiển thị
		                            @else
		                            	<input type="checkbox" name="status" value="1" checked> Hiển thị
		                            @endif
		                        </label>
		                    </div>
		                    <div class="form-group text-right">
		                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại </button>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</form>
	</div>
@stop
