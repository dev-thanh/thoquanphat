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
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin ngân hàng</a>
							</li>
		                </ul>
		                <div class="tab-content">

		                    <div class="tab-pane active" id="activity">
		                    	<div class="row">
                                    <div class="col-sm-12">
										<div class="form-group">
											<label for="">Tên ngân hàng</label>
											<input type="text" name="name_bank" class="form-control" value="{{ old('name_bank', @$data->name_bank) }}">
										</div>
										<div class="form-group">
											<label for="">Tên chủ thẻ</label>
											<input type="text" name="name_account" class="form-control" value="{{ old('name_account', @$data->name_account) }}">
										</div>
										<div class="form-group">
											<label for="">số tài khoản</label>
											<input type="text" name="bank_number" class="form-control" value="{{ old('bank_number', @$data->bank_number) }}" onkeypress="return isNumberKey(event)">
										</div>
										<div class="form-group">
											<label for="">Chi nhánh</label>
											<input type="text" name="address" class="form-control" value="{{ old('address', @$data->address) }}">
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
		            <div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Ảnh đại diện</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group" style="text-align: center;">
		                        <div class="image">
		                            <div class="image__thumbnail">
		                                <img src="{{ !empty(@$data->image) ? @$data->image : __IMAGE_DEFAULT__ }}"
		                                     data-init="{{ __IMAGE_DEFAULT__ }}">
		                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
		                                    <i class="fa fa-times"></i></a>
		                                <input type="hidden" value="{{ old('image', @$data->image) }}" name="image"/>
		                                <div class="image__button" onclick="fileSelect(this)">
		                                	<i class="fa fa-upload"></i>
		                                    Upload
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</form>
	</div>

@stop
@section('scripts')
	<script>
		function isNumberKey(evt) {
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
</script>
@endsection

