<?php $text = '';
	$type = request()->type;
	switch ($type) {
		case 'category_services':
			$text = 'dịch vụ';
			break;
		
		default:
			// code...
			break;
	}
 ?>
@extends('backend.layouts.app')
@section('controller', 'Danh mục '.$text )
@section('controller_route', route('category.index',['type'=>request()->type]))
@section('action', renderAction(@$module['action']))
@section('content')
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	@include('flash::message')
               	<form action="{!! updateOrStoreRouteRender( @$module['action'], $module['module'], @$data) !!}" method="POST">
					@csrf
					@if(isUpdate(@$module['action']))
				        {{ method_field('put') }}
				    @endif
				    <div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Danh mục sản phẩm</a>
		                    </li>
		                    <li class="">
		                    	<a href="#setting" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>
		                    </li>
		                </ul>
		                <div class="tab-content">
		                    <div class="tab-pane active" id="activity">
								<div class="form-group">
									<label for="">Tên danh mục</label>
									<input type="text" class="form-control" name="name" id="name" value="{{ old('name', @$data->name) }}">
								</div>
								<div class="form-group">
									<label for="">Đường dẫn tĩnh</label>
									<input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', @$data->slug) }}">
								</div>
								<div class="form-group">
									<label for="">Danh mục cha</label>
									<select name="parent_id" class="form-control">
										<option value="0">Danh mục cha</option>
										   <?php menuMulti( $categories , 0 , '' ,   old( 'parent_id', @$data->parent_id )); ?>
									</select>
								</div>
                                <div class="form-group">
                                    <label for="">Mô tả ngắn danh mục</label>
                                    <textarea class="form-control" name="content">{!! old('content', @$data->content) !!}</textarea>
                                </div>
								<div class="form-group">
									<?php if(isUpdate(@$module['action'])){
										$order = old('order', @$data->order);
									} ?>
									<label for="">Số thứ tự hiển thị</label>
									<input type="number" name="order" value="{{ @$order }}" class="form-control">
								</div>
								@if($type == 'category_services')
								<div class="form-group">
									<label for="">Hình ảnh đại diện danh mục</label>
									<div class="image">
			                            <div class="image__thumbnail">
			                                <img src="{{ !empty(@$data->image) ? @$data->image : __IMAGE_DEFAULT__ }}"
			                                     data-init="{{ __IMAGE_DEFAULT__ }}">
			                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                <input type="hidden" value="{{ old('image_category', @$data->image) }}" name="image_category"/>
			                                <div class="image__button" onclick="fileSelect(this)">
			                                	<i class="fa fa-upload"></i>
			                                    Upload
			                                </div>
			                            </div>
			                        </div>
		                        </div>
		                        @endif
								<input type="hidden" name="type" value="{{ request()->type }}">
		                    </div>
		                    <div class="tab-pane" id="setting">
		                    	<div class="row">
		                    		<div class="col-sm-2">
		                    			<div class="form-group">
		                    				<label for="">Hình ảnh</label>
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
		                    		<div class="col-sm-2">
		                    			<div class="form-group">
		                    				<label for="">Banner</label>
		                    				 <div class="image">
					                            <div class="image__thumbnail">
					                                <img src="{{ !empty(@$data->banner) ? @$data->banner : __IMAGE_DEFAULT__ }}"
					                                     data-init="{{ __IMAGE_DEFAULT__ }}">
					                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
					                                    <i class="fa fa-times"></i></a>
					                                <input type="hidden" value="{{ old('banner', @$data->banner) }}" name="banner"/>
					                                <div class="image__button" onclick="fileSelect(this)">
					                                	<i class="fa fa-upload"></i>
					                                    Upload
					                                </div>
					                            </div>
					                        </div>
		                    			</div>
		                    		</div>
		                    		<div class="col-sm-8">
		                    			 <div class="form-group">
				                            <label>Title SEO</label>
				                            <input type="text" class="form-control" name="meta_title" value="{!! old('meta_title', @$data->meta_title) !!}">
				                        </div>

				                        <div class="form-group">
				                            <label>Meta Description</label>
				                            <textarea name="meta_description" id="" class="form-control" rows="5">{!! old('meta_description', @$data->meta_description) !!}</textarea>
				                        </div>

				                        <div class="form-group">
				                            <label>Meta Keyword</label>
				                            <input type="text" class="form-control" name="meta_keyword" value="{!! old('meta_keyword', @$data->meta_keyword) !!}">
				                        </div>
		                    		</div>
		                    	</div>
		                    </div>
		                    <button type="submit" class="btn btn-primary">Lưu lại</button>
		                </div>
		            </div>
				</form>
			</div>
		</div>
	</div>
@stop