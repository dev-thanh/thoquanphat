@extends('backend.layouts.app')
@section('controller','Cấu hình chung')
@section('action','Cập nhật')
@section('controller_route', route('backend.options.general'))
@section('content')
	<div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	@include('flash::message')
               	<form action="{{ route('backend.options.general.post') }}" method="POST">
               		@csrf
               		 <div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			               <li class="active">
								   <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin chung</a>
							</li>
			                <li class="">
			                	<a href="#activity1" data-toggle="tab" aria-expanded="true">Thông tin liên hệ</a>
							</li>

			               	<li class="">
			               		<a href="#activity3" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>
			               	</li>
			               	<li class="">
			               		<a href="#activity4" data-toggle="tab" aria-expanded="true">Mạng xã hội</a>
							</li>
							<li class="">
								<a href="#activity5" data-toggle="tab" aria-expanded="true">Header</a>
							 </li>
							 <li class="">
								<a href="#activity6" data-toggle="tab" aria-expanded="true">Video iframe footer</a>
						 	</li>

						 	<li class="">
								<a href="#activity7" data-toggle="tab" aria-expanded="true">Link page facebook</a>
						 	</li>
			            </ul>
				        <div class="tab-content">

	                		<div class="tab-pane active" id="activity">
			               		<div class="row">
			               			<div class="col-lg-2">
				                        <div class="form-group">
				                           <label>Favicon</label>
				                           <div class="image">
				                               <div class="image__thumbnail">
				                                   <img src="{{ !empty($content->favicon) ? url('/').$content->favicon :  __IMAGE_DEFAULT__ }}"  data-init="{{ __IMAGE_DEFAULT__ }}">
				                                   <a href="javascript:void(0)" class="image__delete" 
				                                   onclick="urlFileDelete(this)">
				                                    <i class="fa fa-times"></i></a>
				                                   <input type="hidden" value="{{ @$content->favicon }}" name="content[favicon]"  />
				                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
				                               </div>
				                           </div>
				                       </div>
				                    </div>
				                    <div class="col-lg-2">
				                        <div class="form-group">
				                           <label>Logo</label>
				                           <div class="image">
				                               <div class="image__thumbnail">
				                                   <img src="{{ !empty($content->logo) ? url('/').$content->logo :  __IMAGE_DEFAULT__ }}"  data-init="{{ __IMAGE_DEFAULT__ }}">
				                                   <a href="javascript:void(0)" class="image__delete" 
				                                   onclick="urlFileDelete(this)">
				                                    <i class="fa fa-times"></i></a>
				                                   <input type="hidden" value="{{ @$content->logo }}" name="content[logo]"  />
				                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
				                               </div>
				                           </div>
				                       </div>
									</div>
									
									<div class="col-lg-2">
				                        <div class="form-group">
				                           <label>Logo footer</label>
				                           <div class="image">
				                               <div class="image__thumbnail">
				                                   <img src="{{ !empty($content->logo_footer) ? url('/').$content->logo_footer :  __IMAGE_DEFAULT__ }}"  data-init="{{ __IMAGE_DEFAULT__ }}">
				                                   <a href="javascript:void(0)" class="image__delete" 
				                                   onclick="urlFileDelete(this)">
				                                    <i class="fa fa-times"></i></a>
				                                   <input type="hidden" value="{{ @$content->logo_footer }}" name="content[logo_footer]"  />
				                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
				                               </div>
				                           </div>
				                       </div>
				                    </div>

				                    <div class="col-lg-2">
				                        <div class="form-group">
				                           <label>Hình ảnh đại diện khi chia sẻ</label>
				                           <div class="image">
				                               <div class="image__thumbnail">
				                                   <img src="{{ !empty($content->logo_share) ? url('/').$content->logo_share :  __IMAGE_DEFAULT__ }}"  data-init="{{ __IMAGE_DEFAULT__ }}">
				                                   <a href="javascript:void(0)" class="image__delete" 
				                                   onclick="urlFileDelete(this)">
				                                    <i class="fa fa-times"></i></a>
				                                   <input type="hidden" value="{{ @$content->logo_share }}" name="content[logo_share]"  />
				                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
				                               </div>
				                           </div>
				                       </div>
				                    </div>

				                    <div class="col-lg-2">
				                        <div class="form-group">
				                           <label>Hình ảnh background footer</label>
				                           <div class="image">
				                               <div class="image__thumbnail">
				                                   <img src="{{ !empty($content->background_footer) ? url('/').$content->background_footer :  __IMAGE_DEFAULT__ }}"  data-init="{{ __IMAGE_DEFAULT__ }}">
				                                   <a href="javascript:void(0)" class="image__delete" 
				                                   onclick="urlFileDelete(this)">
				                                    <i class="fa fa-times"></i></a>
				                                   <input type="hidden" value="{{ @$content->background_footer }}" name="content[background_footer]"  />
				                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
				                               </div>
				                           </div>
				                       </div>
				                    </div>

				                    <div class="col-lg-2">
				                        <div class="form-group">
				                           <label>Icon bài viết liên quan</label>
				                           <div class="image">
				                               <div class="image__thumbnail">
				                                   <img src="{{ !empty($content->icon_bvlq) ? url('/').$content->icon_bvlq :  __IMAGE_DEFAULT__ }}"  data-init="{{ __IMAGE_DEFAULT__ }}">
				                                   <a href="javascript:void(0)" class="image__delete" 
				                                   onclick="urlFileDelete(this)">
				                                    <i class="fa fa-times"></i></a>
				                                   <input type="hidden" value="{{ @$content->icon_bvlq }}" name="content[icon_bvlq]"  />
				                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
				                               </div>
				                           </div>
				                       </div>
				                    </div>
				                    
			               		</div>

			               		<div class="row">
			               			<div class="col-sm-3">
			               				<div class="form-group">
			               					<label for="">Code Google Maps</label>
			               					<textarea name="content[google_maps]" class="form-control" rows="10">{!! @$content->google_maps !!}</textarea>
			               				</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Ticktok</label>
										 <input type="text" name="content[ticktok]" class="form-control" value="{!! @$content->ticktok !!}">
										</div>
									</div>
			               			<div class="col-sm-3">
			               				<div class="form-group">
			               					<label for="">Google Analytics</label>
											<input type="text" name="content[google_analytics]" class="form-control" value="{!! @$content->google_analytics !!}">
			               				</div>
			               			</div>
			               			<div class="col-sm-3">
			               				<div class="form-group">
											<label for="">Google Tag Manager</label>
											<input type="text" name="content[google_tag_manager]" class="form-control" value="{!! @$content->google_tag_manager !!}">
			               				</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Facebook pixel</label>
											<input type="text" name="content[facebook_pixel]" class="form-control" value="{!! @$content->facebook_pixel !!}">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Facebook chat</label>
											<input type="text" name="content[facebook_chat]" class="form-control" value="{!! @$content->facebook_chat !!}">
										</div>
									</div>
			               		</div>

			               		<div class="row">
			               			<div class="col-sm-12">
			               				<div class="form-group">
				               				<label for="">Email nhận thông tin liên hệ</label>
				               				<input type="email" class="form-control" name="content[email_admin]" value="{{ @$content->email_admin }}">
										</div>
				               			<div class="form-group">
			                                <label class="custom-checkbox">
			                                    <input type="checkbox" name="content[index_google]" value="1" {{ @$content->index_google == 1 ? 'checked' : null }}> 
			                                    Cho phép google tìm kiếm
			                                </label>
			                            </div>

		                            </div>
			               			
			               		</div>
			               	</div>

			               	<div class="tab-pane" id="activity1">
			               		<div class="row">
			               			<div class="col-sm-12">
										<div class="form-group">
											<label for="">Tên công ty</label>
											<input type="text" name="content[name_company]" class="form-control" value="{{ @$content->name_company }}">
										</div>
										<div class="form-group">
											<label for="">Địa chỉ</label>
												<div class="repeater" id="repeater">
												<table class="table table-bordered table-hover address">
													<thead>
														<tr>
															<th style="width: 30px;">STT</th>
															<th>Địa chỉ</th>
															<th style="width: 20px;"></th>
														</tr>
													</thead>
													<tbody id="sortable">
														@if (!empty($content->address->list))
															@foreach ($content->address->list as $id => $value)
																<?php $index = $loop->index + 1 ?>
																@include('backend.repeater.row-address')
															@endforeach
														@endif
													</tbody>
												</table>
												<div class="text-right">
													<button class="btn btn-primary" 
														onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'address', '.address')">Thêm
													</button>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="">Email</label>
											<input type="text" name="content[email]" class="form-control" value="{{ @$content->email }}">
										</div>
										<div class="form-group">
											<label for="">Hotline</label>
											<input type="text" name="content[hotline]" class="form-control" value="{{ @$content->hotline }}">
										</div>
										<div class="form-group">
											<label for="">Số điện thoại liên hệ</label>
											<input type="text" name="content[phone]" class="form-control" value="{{ @$content->phone }}">
										</div>
										<div class="form-group">
											<label for="">Website</label>
											<input type="text" name="content[website]" class="form-control" value="{{ @$content->website }}">
										</div>
										<div class="form-group">
											<label for="">Thời gian tư vấn đặt hàng</label>
											<input type="text" name="content[order_time]" class="form-control" value="{{ @$content->order_time }}">
										</div>
						            </div>
						            <div class="col-sm-12">
						            	<div class="form-group">
						            		<label for="">Bản quyền chân trang</label>
						            		<input type="text" class="form-control" name="content[copyright]" 
						            		value="{{ @$content->copyright }}">
						            	</div>
						            </div>
			               		</div>
							</div>

			               	<div class="tab-pane" id="activity3">
			               		<div class="row">
			               			<div class="col-sm-12">
			               				<div class="form-group">
											<label for="">Tên website</label>
											<input type="text" class="form-control" name="content[site_title]"
											value="{{ @$content->site_title }}">
										</div>

			               				<div class="form-group">
		               						<label for="">Mô tả ngắn</label>
		               						<textarea class="form-control" rows="5" 
		               						name="content[site_description]">{{ @$content->site_description }}</textarea>
			               				</div>

			               				<div class="form-group">
		               						<label for="">Meta keyword</label>
		               						<input type="text" class="form-control" name="content[site_keyword]"
		               						value="{{ @$content->site_keyword }}">
			               				</div>

			               			</div>
			               		</div>
			               	</div>
							
							<div class="tab-pane" id="activity4">
								<div class="row">
									<div class="col-sm-12">
										<div class="repeater" id="repeater">
							                <table class="table table-bordered table-hover social">
							                    <thead>
								                    <tr>
														<th style="width: 30px">STT</th>
								                    	<th>Tên mạng xã hội</th>
								                    	<th width="200px">Icon</th>
								                    	<th>Liên kết</th>
								                    	<th></th>
								                    </tr>
							                	</thead>
							                    <tbody id="sortable">
							                    	@if (!empty($content->social))
							                    		@foreach ($content->social as $id => $val)
															<tr>
																<td class="index">{{ $index = $loop->index + 1  }}</td>
																<td><input type="text" class="form-control" name="content[social][{{$id}}][name]" value="{{ $val->name }}" ></td>
																<td>
																	<div class="image">
																		<div class="image__thumbnail">
																			<img src="{{ !empty($val->icon) ? url('/').$val->icon : __IMAGE_DEFAULT__ }}"  
																			data-init="{{ __IMAGE_DEFAULT__ }}">
																			<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
																			<i class="fa fa-times"></i></a>
																			<input type="hidden" value="{{ @$val->icon }}" name="content[social][{{ $id }}][icon]"  />
																			<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
																		</div>
																	</div>
																</td>
																<td>
															        <input type="text" class="form-control" required="" name="content[social][{{$id}}][link]" value="{{ $val->link }}">
															    </td>
															    <td style="text-align: center;">
															        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
															            <i class="fa fa-minus"></i>
															        </a>
															    </td>
															</tr>
							                    		@endforeach
							                    	@endif
												</tbody>
							                </table>
							                <div class="text-right">
							                    <button class="btn btn-primary" 
									            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'social', '.social')">Thêm
									            </button>
							                </div>
							            </div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="activity5">
								<div class="row">
									<div class="col-sm-2">
										<div class="form-group">
											<label for="">Hình ảnh</label>
											<div class="image">
												<div class="image__thumbnail">
													<img src="{{ !empty($content->image_header) ? url('/').$content->image_header :  __IMAGE_DEFAULT__ }}"  data-init="{{ __IMAGE_DEFAULT__ }}">
													<a href="javascript:void(0)" class="image__delete" 
													onclick="urlFileDelete(this)">
													<i class="fa fa-times"></i></a>
													<input type="hidden" value="{{ @$content->image_header }}" name="content[image_header]"  />
													<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
												</div>
											</div>
										 </div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="activity6">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="">Iframe video</label>
											<textarea name="content[iframe_video]" class="form-control" rows="5">{!! @$content->iframe_video !!}</textarea>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="repeater" id="repeater">
							                <table class="table table-bordered table-hover video">
							                    <thead>
								                    <tr>
														<th style="width: 30px">STT</th>
								                    	<th>Tiêu đề video</th>
								                    	<th>Liên kết</th>
								                    	<th></th>
								                    </tr>
							                	</thead>
							                    <tbody id="sortable">
							                    	@if (!empty($content->video))
							                    		@foreach ($content->video as $key => $value)
															<?php $index = $loop->index + 1 ?>
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
							</div>

							<div class="tab-pane" id="activity7">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="">Link Facebook page</label>
											<textarea name="content[link_page_facebook]" class="form-control" rows="5">{!! @$content->link_page_facebook !!}</textarea>
										</div>
									</div>
									
								</div>
							</div>
			            </div>
			        </div>
               		<div class="row">
               			<div class="col-lg-12">
               				<button class="btn btn-primary" type="submit">Lưu lại</button>
               			</div>
               		</div>
               	</form>
            </div>
        </div>
    </div>
@stop