@extends('frontend.master')

@section('main')

	<div class="art-breadcrumbs">

		<div class="container">

			<div class="row">

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

					<div class="breadcrumbs-content">

						<div class="title-box-2 breadcrumb-title">

							<h1 class="title">

								<i class="fas fa-hand-holding-water icon"></i>

								<span>{{ app()->getLocale() == 'vi' ? $data->name : $data->name_en }}</span>

							</h1>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div> <!--breadcrumbs-->

	<div class="main-container">

		<div class="main-content">


			<article>

				<div class="container">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

						<div class="banners-box">

							<div class="contents-box">

								<div class="contents">

									{!! app()->getLocale() == 'vi' ? $data->content : $data->content_en !!}

								</div>

							</div>

						</div>


					</div>

				</div>

			</article>


		</div>

	</div>

@stop

@section('script')

	<script>

		$(document).ready(function($) {

			$('.body-site').addClass('body-page body-about-us');

		});

	</script>

@endsection