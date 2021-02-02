<?php $text = request()->type =='gift' ? 'gift' : ''; ?>
@extends('backend.layouts.app')
@section('controller', 'Danh sách sản phẩm '.$text )
@section('controller_route', route($module['module'].'.index',['type'=>request()->type]))
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
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin sản phẩm</a>
		                    </li>
		                    <li class="">
		                        <a href="#gallery" data-toggle="tab" aria-expanded="true">Thêm ảnh sản phẩm</a>
		                    </li>
							<li class="">
		                    	<a href="#setting" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>
		                    </li>
		                </ul>
		                <div class="tab-content">

		                    <div class="tab-pane active" id="activity">
		                    	<div class="row">
                                    <?php 
										$code = old('code', @$data->code);
		                    			if(empty($code)){
		                    				$code = generateRandomCode();
		                    			}
		                    		?>
		                    		<input type="hidden" name="type" value="{{request()->type =='gift' ? 'gift' : 'product'}}">
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
				                    		<label for="">Mã sản phẩm</label>
											<input type="text" name="code" class="form-control" value="{{ @$code }}">
				                    	</div>
		                    		</div>
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
		                                    <label>Tên sản phẩm</label>
		                                    <input type="text" class="form-control" name="name" id="name" value="{!! old('name', @$data->name) !!}">
		                                </div>
		                                @if(isUpdate(@$module['action']))
			                                <div class="form-group" id="edit-slug-box">
			                                    @include('backend.products.permalink')
			                                </div>
		                                @endif
                                    </div>
                                    <div class="col-sm-6">

		                    			<div class="form-group">

				                    		<label for="">Giá bán</label>

				                    		<input type="number" name="price" class="form-control" 

				                    		value="{{ old('price', @$data->price) }}">

				                    	</div>

		                    		</div>

		                    		<div class="col-sm-6">

		                    			<div class="form-group">

				                    		<label for="">Giá khuyến mại ( Nếu có )</label>

				                    		<input type="number" name="price_sale" class="form-control" 

				                    		value="{{ old('price_sale', @$data->price_sale) }}">

				                    	</div>

		                    		</div>

		                    		<div class="col-sm-6">

		                    			<div class="form-group">

				                    		<label for="">Xuất xứ</label>

				                    		<input type="text" name="xuat_xu" class="form-control" 

				                    		value="{{ old('xuat_xu', @$data->xuat_xu) }}">

				                    	</div>

		                    		</div>


		                    		<div class="col-sm-6">

		                    			<div class="form-group">

		                    				<label for="">Tình trạng</label>

		                    				<select name="tinh_trang" class="form-control">
		                    					<option value="1" @if(old("tinh_trang", @$data->tinh_trang) ==1) selected @endif>Còn hàng</option>
		                    					<option value="2" @if(old("tinh_trang", @$data->tinh_trang) ==2) selected @endif>Hết hàng</option>
		                    				</select>

		                    			</div>

		                    		</div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <textarea class="content" name="desc">{!! old('desc', @$data->desc) !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
		                                	<label for="">Thông tin sản phẩm</label>
		                                	<textarea class="content" name="content">{!! old('content', @$data->content) !!}</textarea>
                                        </div>
                                    </div>
                                    
		                    	</div>
							</div>

							<div class="tab-pane" id="gallery">
								<div class="row">

			                        <div class="col-sm-12 image">

			                            <button type="button" class="btn btn-success" onclick="fileMultiSelect(this)"><i class="fa fa-upload"></i>  

			                                Chọn hình ảnh

			                            </button>

			                            <br><br>

			                            <div class="image__gallery">

			                            	@if (!empty($data->more_image))

			                            		<?php $more_image = json_decode($data->more_image) ?>

			                            		@foreach ($more_image as $item)

			                            			<div class="image__thumbnail image__thumbnail--style-1">

			                            				<img src="{{ @$item }}">

			                            				<a href="javascript:void(0)" class="image__delete" onclick="urlFileMultiDelete(this)">

			                            					<i class="fa fa-times"></i>

			                            			    </a>

			                            				<input type="hidden" name="gallery[]" value="{{ @$item }}">

			                            			</div>

			                            		@endforeach

			                            	@endif

			                            </div>

			                        </div>

			                    </div>
			                </div>
							
							<div class="tab-pane" id="setting">
		                    	<div class="form-group">
			                        <label>Title SEO</label>
			                        <label style="float: right;">Số ký tự đã dùng: <span id="countTitle">{{ @$data->meta_title != null ? mb_strlen( $data->meta_title, 'UTF-8') : 0 }}/70</span></label>
			                        <input type="text" class="form-control" name="meta_title" value="{!! old('meta_title', isset($data->meta_title) ? $data->meta_title : null) !!}" id="meta_title">
			                    </div>

			                    <div class="form-group">
			                        <label>Meta Description</label>
			                        <label style="float: right;">Số ký tự đã dùng: <span id="countMeta">{{ @$data->meta_description != null ? mb_strlen( $data->meta_description, 'UTF-8') : 0 }}/360</span></label>
			                        <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{!! old('meta_description', isset($data->meta_description) ? $data->meta_description : null) !!}</textarea>
			                    </div>

			                    <div class="form-group">
			                        <label>Meta Keyword</label>
			                        <input type="text" class="form-control" name="meta_keyword" value="{!! old('meta_keyword', isset($data->meta_keyword) ? $data->meta_keyword : null) !!}">
			                    </div>
			                    @if(isUpdate(@$module['action']))
				                    <h4 class="ui-heading">Xem trước kết quả tìm kiếm</h4>
				                    <div class="google-preview">
				                        <span class="google__title"><span>{!! !empty($data->meta_title) ? $data->meta_title : @$data->name !!}</span></span>
				                        <div class="google__url">
				                            {{ asset( 'products/'.$data->slug ) }}
				                        </div>
				                        <div class="google__description">{!! old('meta_description', isset($data->meta_description) ? @$data->meta_description : '') !!}</div>
				                    </div>
			                    @endif
		                    </div>
		                </div>
		            </div>
				</div>
				<div class="col-sm-3">
					<div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Đăng sản phẩm</h3>
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

		                        <label class="custom-checkbox">
									@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="is_new" value="1" {{ @$data->is_new == 1 ? 'checked' : null }}>Sản phẩm mới cập nhập
		                            @else
		                            	<input type="checkbox" name="is_new" value="1"> Sản phẩm mới cập nhập
		                            @endif
		                        </label>

								<label class="custom-checkbox">
									@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="hot" value="1" {{ @$data->hot == 1 ? 'checked' : null }}>Sản phẩm nổi bật
		                            @else
		                            	<input type="checkbox" name="hot" value="1"> Sản phẩm nổi bật
		                            @endif
		                        </label>

		                        <label class="custom-checkbox">
									@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="is_selling" value="1" {{ @$data->is_selling == 1 ? 'checked' : null }}>Sản phẩm bán chạy
		                            @else
		                            	<input type="checkbox" name="is_selling" value="1"> Sản phẩm bán chạy
		                            @endif
		                        </label>

		                        <label class="custom-checkbox">
									@if(isUpdate(@$module['action']))
		                            	<input type="checkbox" name="is_sale" value="1" {{ @$data->is_sale == 1 ? 'checked' : null }}>Sản phẩm sale
		                            @else
		                            	<input type="checkbox" name="is_sale" value="1"> Sản phẩm sale
		                            @endif
		                        </label>

							</div>
							<div class="form-group">
								<?php if(isUpdate(@$module['action'])){
									$stt = old('stt', @$data->stt);
								}else{
									$stt = old('stt', \App\Models\Products::count() + 1);
								} ?>
								<label for="">Số thứ tự hiển thị</label>
								<input type="number" name="stt" value="{{ $stt }}" class="form-control">
							</div>
		                    <div class="form-group text-right">
		                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại sản phẩm</button>
		                    </div>
		                </div>
					</div>
                    <div class="box box-success">
                        <div class="box-header with-border">
		                    <h3 class="box-title">Danh mục sản phẩm</h3>
		                </div>
		                <div class="box-body checkboxlist">
                            <?php 
								$category_list = [];
		                        if(!empty(@$data->category)){
		                           $category_list = @$data->category->pluck('id')->toArray();
		                        }
		                    ?>
		                    @if (!empty($categories))
		                        @foreach ($categories as $item)
		                            @if ($item->parent_id == 0)
		                                <label class="custom-checkbox">
		                                    <input type="checkbox" class="category" name="category[]" value="{{ $item->id }}" {{ in_array( $item->id, $category_list ) ? 'checked' : null }}> {{ $item->name }}
		                                 </label>
		                                 <?php checkBoxCategory( $categories, $item->id, $item, $category_list ) ?>
		                            @endif
		                        @endforeach
		                    @endif
		                </div>
		            </div>
		            <div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Ảnh sản phẩm</h3>
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
		jQuery(document).ready(function($) {
			$('#btn-ok').click(function(event) {
		        var slug_new = $('#new-post-slug').val();
		        var name = $('#name').val();
		        $.ajax({
		        	url: '{{ route($module['module'].'.get-slug') }}',
		        	type: 'GET',
		        	data: {
		        		id: $('#idPost').val(),
		        		slug : slug_new.length > 0 ? slug_new : name,
		        	},
		        })
		        .done(function(data) {
		        	$('#change_slug').show();
			        $('#btn-ok').hide();
			        $('.cancel.button-link').hide();
			        $('#current-slug').val(data);
		        	cancelInput(data);
		        })
		    });
		});	
	</script>
	
@endsection

@section('css')
	<link rel="stylesheet" href="{{ url('public/backend/plugins/datetimepicker/bootstrap-timepicker.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
@endsection

