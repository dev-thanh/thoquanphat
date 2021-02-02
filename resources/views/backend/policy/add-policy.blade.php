@extends('backend.layouts.app') 

@section('controller','Chính sách hướng dẫn')

@section('controller_route', route('policy.list'))

@section('action','Thêm mới')

@section('content')

	<div class="content">

		<div class="clearfix"></div>

        <div class="box box-primary">

            <div class="box-body">

               	@include('flash::message')

				<div class="row">

			        <div class="col-sm-12">

			            <div class="row">
			            	<form action="{{route('policy.post-add')}}" method="POST" >
			            		@csrf
								<div class="col-sm-10">

						            <div class="nav-tabs-custom">

						                <ul class="nav nav-tabs">

						                    <li class="active">

						                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin bài viết</a>

											</li>


											<li class="">

						                    	<a href="#setting" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>

						                    </li>

						                </ul>

						                <div class="tab-content">

						                    <div class="tab-pane active" id="activity">

						                        <div class="row">

						                            <div class="col-sm-12">

						                                <div class="form-group">

						                                    <label>Tiêu đề</label>

						                                    <input type="text" class="form-control" name="name" id="name" value="{!! old('name') !!}" >

						                                </div>

						                                <div class="form-group" style="display: none;">

						                                    <label>Đường dẫn tĩnh</label>

						                                    <input type="text" class="form-control" name="slug" id="slug" value="{!! old('slug') !!}">

						                                </div>


						                                <div class="form-group">

						                                    <label>Nội dung</label>

						                                    <textarea class="content" name="content">{!! old('content') !!}</textarea>

						                                </div>

						                            </div>

						                        </div>

											</div>

											<div class="tab-pane" id="setting">

												<div class="form-group">

							                        <label>Title SEO</label>

							                        <label style="float: right;">Số ký tự đã dùng: <span id="countTitle">{{ @$data->meta_title != null ? mb_strlen( $data->meta_title, 'UTF-8') : 0 }}/70</span></label>

							                        <input type="text" class="form-control" name="meta_title" value="{!! old('meta_title') !!}" id="meta_title">

							                    </div>



							                    <div class="form-group">

							                        <label>Meta Description</label>

							                        <label style="float: right;">Số ký tự đã dùng: <span id="countMeta">{{ @$data->meta_description != null ? mb_strlen( $data->meta_description, 'UTF-8') : 0 }}/360</span></label>

							                        <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{!! old('meta_description') !!}</textarea>

							                    </div>



							                    <div class="form-group">

							                        <label>Meta Keyword</label>

							                        <input type="text" class="form-control" name="meta_keyword" value="{!! old('meta_keyword') !!}">

							                    </div>

							                    @if(isUpdate(@$module['action']))

								                    <h4 class="ui-heading">Xem trước kết quả tìm kiếm</h4>

								                    <div class="google-preview">

								                        <span class="google__title"><span>{!! !empty($data->meta_title) ? $data->meta_title : @$data->name !!}</span></span>

								                        <div class="google__url">

								                            {{ asset( 'tin-tuc/'.$data->slug ) }}

								                        </div>

								                        <div class="google__description">{!! old('meta_description') !!}</div>

								                    </div>

							                    @endif

											</div>

						                </div>

						            </div>

								</div>

								<div class="col-sm-2">

									<div class="box box-success">

						                <div class="box-header with-border">

						                    <h3 class="box-title">Đăng</h3>

						                </div>

						                <div class="box-body">

						                    <div class="form-group">

						                        <label class="custom-checkbox">

						                            <input type="checkbox" name="status" value="1" checked=""> Hiển thị

						                        </label>

						                    </div>

						                    <div class="form-group text-right">

						                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>

						                    </div>

						                </div>

						            </div>

								</div>
			            	</form>


						</div>

			        </div>

			    </div>

            </div>

        </div>

    </div>

@stop

@section('scripts')

    <script>

        jQuery(document).ready(function($) {

            var updateOutput = function(e){

                var list   = e.length ? e : $(e.target),

                    output = list.data('output');

                if (window.JSON) {

                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));

                    var param = window.JSON.stringify(list.nestable('serialize'));

                    $.ajax({

                        url: '{{ route('setting.menu.update') }}',

                        type: 'POST',

                        data: {

                            _token : $('#token').val(),

                            jsonMenu: param

                        },

                    }).done(function() {

                            $.toast({

                            text: "Cập nhật thành công !",

                            heading: 'Thông báo',

                            icon: 'success',

                            showHideTransition: 'fade',

                            allowToastClose: true, // Boolean value true or false

                            hideAfter: 1000, 

                            stack: 5, 

                            position: 'top-right', 

                            textAlign: 'left',

                            loader: true,

                            loaderBg: '#9ec600',

                        });

                    })

                } else {

                    output.val('JSON browser support required for this demo.');

                }

            };

            $('#nestable').nestable({

                group: 3,

                maxDepth : 3

            }).on('change', updateOutput);

            updateOutput($('#nestable').data('output', $('#nestable-output')));

        });

        

    </script>

@endsection



