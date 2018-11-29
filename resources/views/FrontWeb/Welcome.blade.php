@extends('FrontWeb.TemaFront')
@section('contenido')
	<!-- Slide1 -->
	@include('FrontWeb.SlideHome')

	<section class="section-welcome bg1-pattern p-t-120 p-b-105">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-welcome t-center">
						<span class="tit2 t-center">
							Restaurante de comida mexicana
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							Bienvenido
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
							Porque la comida mexicana es la comida mas chingona del mundo ,ven y conocenos,
							no te arrepentiras.
						</p>

						<a href="about.html" class="txt4">
							Nuestra historia
							<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
						</a>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="images/mex/Historia.jpg" alt="IMG-OUR">
					</div>
				</div>
			</div>
		</div>
	</section>
    @include('FrontWeb.Presentation')
	@include('FrontWeb.FormReservationHome')
	
@endsection