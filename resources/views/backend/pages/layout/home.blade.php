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
				            	<a href="#content-2" data-toggle="tab" aria-expanded="true">Khối giới thiệu</a>
				            </li>

				            <li class="">
				            	<a href="#content-4" data-toggle="tab" aria-expanded="true">Khối ý kiến khách hàng</a>
				            </li>
				            <li class="">
				            	<a href="#content-5" data-toggle="tab" aria-expanded="true">Khối tại sao chọn Thọ Quang Phát</a>
				            </li>
				            <li class="">
				            	<a href="#content-3" data-toggle="tab" aria-expanded="true">Khối video</a>
				            </li>
				        </ul>
				    </div>
				    <?php if(!empty($data->content)){
						$content = json_decode($data->content);
						//dd($content->difference);
					} ?>
				    <div class="tab-content">
				    	<div class="tab-pane active" id="seo">
			            	<div class="row">
			            		<div class="col-sm-2">
									<div class="form-group">
			                           <label>Banner</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ $data->banner ?  url('/').$data->banner : __IMAGE_DEFAULT__ }}"  
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
			            

						<div class="tab-pane" id="content-2">
							<div class="row">
								<div class="col-sm-12">
									
									<div class="col-sm-9">
										<div class="repeater">
											<div class="form-group">
												<label for="">Tiêu đề khối</label>
												<input type="text" name="content[aboutus][title]" class="form-control" value="{{ @$content->aboutus->title }}">
											</div>
										</div>
										<div class="repeater">
											<div class="form-group">
												<label for="">Mô tả ngắn khối</label>
												<textarea name="content[aboutus][desc]" class="form-control" style="min-height: 150px">{{ @$content->aboutus->desc }}</textarea>
											</div>
										</div>
										<div class="repeater">
											<div class="form-group">
												<label for="">Link video khối</label>
												<input type="text" class="form-control" name="content[aboutus][link]" value="{{ @$content->aboutus->link }}">
												
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>

						

						<div class="tab-pane" id="content-4">
							<div class="row">
								<div class="col-sm-12">
									
									
									<div class="col-sm-9">
										<div class="repeater">
											<div class="form-group">
												<label for="">Tiêu đề khối</label>
												<input type="text" name="content[customer_reviews][title]" class="form-control" value="{{ @$content->customer_reviews->title }}">
											</div>
										</div>
										<div class="repeater" id="repeater">
											<div class="form-group">
												<label for="">Nội dung khối</label>	
											</div>
											<table class="table table-bordered table-hover slider">
												<thead>
													<tr>
														<th style="width: 30px;">STT</th>
														<th style="width: 200px">Hình ảnh</th>
														<th>Tiêu đề</th>
														<th></th>
													</tr>
												</thead>
												<tbody id="sortable">
													@if (!empty($content->customer_reviews->content))
														@foreach ($content->customer_reviews->content as $key => $value)
															<?php $index = $loop->index + 1; ?>
															@include('backend.repeater.row-customer_reviews')
														@endforeach
													@endif
												</tbody>
											</table>
											<div class="text-right">
												<button class="btn btn-primary" 
													onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'customer_reviews', '.customer_reviews')">Thêm
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="content-5">
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-9">
										<div class="col-sm-2">
											<div class="form-group">
					                           <label>Hình ảnh đại diện khối</label>
					                           <div class="image">
					                               <div class="image__thumbnail">
					                                   <img src="{{ @$content->reason->image ?  url('/').@$content->reason->image : __IMAGE_DEFAULT__ }}"  
					                                   data-init="{{ __IMAGE_DEFAULT__ }}">
					                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
					                                    <i class="fa fa-times"></i></a>
					                                   <input type="hidden" value="{{ @$content->reason->image }}" name="content[reason][image]"  />
					                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
					                               </div>
					                           </div>
					                       </div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
					                           <label>Logo khối</label>
					                           <div class="image">
					                               <div class="image__thumbnail">
					                                   <img src="{{ @$content->reason->logo ?  url('/').@$content->reason->logo : __IMAGE_DEFAULT__ }}"  
					                                   data-init="{{ __IMAGE_DEFAULT__ }}">
					                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
					                                    <i class="fa fa-times"></i></a>
					                                   <input type="hidden" value="{{ @$content->reason->logo }}" name="content[reason][logo]"  />
					                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
					                               </div>
					                           </div>
					                       </div>
										</div>
										<div class="repeater col-sm-12">
											<div class="form-group">
												<label for="">Tiêu đề khối</label>
												<input type="text" name="content[reason][title]" class="form-control" value="{{ @$content->reason->title }}">
											</div>
										</div>
										<div class="repeater" id="repeater">
											<div class="form-group">
												<label for="">Nội dung khối</label>	
											</div>
											<table class="table table-bordered table-hover slider">
												<thead>
													<tr>
														<th style="width: 30px;">STT</th>
														<th style="width: 200px">Hình ảnh</th>
														<th>Tiêu đề</th>
														<th></th>
													</tr>
												</thead>
												<tbody id="sortable">
													@if (!empty($content->reason->content))
														@foreach ($content->reason->content as $key => $value)
															<?php $index = $loop->index + 1; ?>
															@include('backend.repeater.row-reason')
														@endforeach
													@endif
												</tbody>
											</table>
											<div class="text-right">
												<button class="btn btn-primary" 
													onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'reason', '.reason')">Thêm
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="content-3">
							<div class="col-sm-9">
								<div class="repeater" id="repeater">
									<div class="form-group">
										<label for="">Nội dung khối</label>	
									</div>
									<table class="table table-bordered table-hover slider">
										<thead>
											<tr>
												<th style="max-width: 50px">STT</th>
												<th>Nội dung</th>
												<th></th>
											</tr>
										</thead>
										<tbody id="sortable">
											@if (!empty($content->video))
												@foreach ($content->video as $key => $value)
													<?php $index = $loop->index + 1; ?>
													@include('backend.repeater.row-video')
												@endforeach
											@endif
										</tbody>
									</table>
									<div class="text-right">
										<button class="btn btn-primary" 
											onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'video', '.video')">Thêm
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							
			           	<button type="submit" class="btn btn-primary">Lưu lại</button>
						</div>
			        </div>
				</form>
			</div>
		</div>
	</div>
	
@stop