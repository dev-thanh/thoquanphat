@extends('backend.layouts.app')
@section('controller','Trang')
@section('controller_route',route('pages.list'))
@section('action','Danh sách')
@section('content')
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	@include('flash::message')
               	<form action="{{ route('pages.build.post') }}" method="POST">
					{{ csrf_field() }}
					<input name="type" value="{{ $data->type }}" type="hidden">

	               	<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Trang</label>
								<input type="text" class="form-control" value="{{ $data->name_page }}" disabled="">
				 				
								@if (\Route::has($data->route))
									<h5>
										<a href="{{ route($data->route) }}" target="_blank">
					                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
					                        Link: {{ route($data->route) }}
					                    </a>
									</h5>
				                @endif
							</div>
							
						</div>
					</div>

					<div class="nav-tabs-custom">
				        <ul class="nav nav-tabs">
				            <li class="active">
				            	<a href="#seo" data-toggle="tab" aria-expanded="true">Cấu hình trang</a>
				            </li>
				            <li class="">
				            	<a href="#content-1" data-toggle="tab" aria-expanded="true">Khối về chúng tôi</a>
				            </li>
				            <li class="">
				            	<a href="#content-2" data-toggle="tab" aria-expanded="true">Khối giá trị của chúng tôi</a>
				            </li>
				            <li class="">
				            	<a href="#content-3" data-toggle="tab" aria-expanded="true">Khối tầm nhìn sứ mệnh</a>
				            </li>
				        </ul>
				    </div>
				    <?php if(!empty($data->content)){
						$content = json_decode($data->content);
						//dd(@$content->our_value->value);
					} ?>
				    <div class="tab-content">
			            <div class="tab-pane active" id="seo">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
			                           <label>Banner</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ @$data->banner ?  url('/').@$data->banner : __IMAGE_DEFAULT__ }}"  
			                                   data-init="{{ __IMAGE_DEFAULT__ }}">
			                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                   <input type="hidden" value="{{ @$data->banner }}" name="banner"  />
			                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
			                               </div>
			                           </div>
			                       </div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<label for="">Tiêu đề trang</label>
										<input type="text" name="meta_title" class="form-control" value="{{ @$data->meta_title }}">
									</div>
									<div class="form-group">
										<label for="">Mô tả trang</label>
										<textarea name="meta_description" 
										class="form-control" rows="5">{!! @$data->meta_description !!}</textarea>
									</div>
									<div class="form-group">
										<label for="">Từ khóa</label>
										<input type="text" name="meta_keyword" class="form-control" value="{!! @$data->meta_keyword !!}">
									</div>
								</div>
							</div>
			            </div>

			            <div class="tab-pane" id="content-1">
			            	<div class="row">
				             	<div class="col-sm-2">
									<div class="form-group">
			                           <label>Banner</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ @$content->about->image ?  url('/').@$content->about->image : __IMAGE_DEFAULT__ }}"  
			                                   data-init="{{ __IMAGE_DEFAULT__ }}">
			                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                   <input type="hidden" value="{{ @$content->about->image }}" name="content[about][image]"  />
			                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
			                               </div>
			                           </div>
			                       </div>
								</div>
								<div class="col-sm-10">
									
									<div class="row">
										<div class="form-group">
											<label for="">Tiêu đề khối</label>
											<input type="text" name="content[about][title]" class="form-control" value="{{ @$content->about->title}}">
										</div>
										<div class="form-group">
											<label for="">Mô tả</label>
											<textarea class="form-control" name="content[about][content]">{{ @$content->about->content}}</textarea>
											
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="content-2">
							<div class="row">
								<div class="form-group">
									<label for="">Tiêu đề khối</label>
									<input type="text" name="content[our_value][title]" class="form-control" value="{{ @$content->our_value->title}}">
								</div>
								<div class="repeater" id="repeater">
									<div class="form-group">
										<h4 class="text-center">Nội dung khối</h4>
									</div>
									<table class="table table-bordered table-hover slider">
										<thead>
											<tr>
												<th style="width: 30px;">STT</th>
												<th>Nội dung</th>
												<th></th>
											</tr>
										</thead>
										<tbody id="sortable">
											@if (!empty($content->our_value->value))
												@foreach (@$content->our_value->value as $key => $value)
													<?php $index = $loop->index + 1; ?>
													@include('backend.repeater.row-story')
												@endforeach
											@endif
										</tbody>
									</table>
									<div class="text-right">
										<button class="btn btn-primary" 
											onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'story', '.story')">Thêm
										</button>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="content-3">
							<div class="row">
								<div class="repeater" id="repeater">
									<div class="form-group">
										<h4 class="text-center">Nội dung khối</h4>
									</div>
									<table class="table table-bordered table-hover slider">
										<thead>
											<tr>
												<th style="width: 30px;">STT</th>
												<th>Nội dung</th>
												<th></th>
											</tr>
										</thead>
										<tbody id="sortable">
											@if (!empty($content->vision_mission->value))
												@foreach (@$content->vision_mission->value as $key => $value)
													<?php $index = $loop->index + 1; ?>
													@include('backend.repeater.row-vision_mission')
												@endforeach
											@endif
										</tbody>
									</table>
									<div class="text-right">
										<button class="btn btn-primary" 
											onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'vision_mission', '.vision_mission')">Thêm
										</button>
									</div>
								</div>
							</div>
						</div>

			           <button type="submit" class="btn btn-primary">Lưu lại</button>
			        </div>
				</form>
			</div>
		</div>
	</div>
@stop