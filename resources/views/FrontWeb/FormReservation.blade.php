@extends('FrontWeb.TemaFront')
@section('contenido')
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/mex/interior3.jpg);">
		<h2 class="tit6 t-center">
			Reservacion
		</h2>
</section>
	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Reservacion
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Mesas
						</h3>
					</div>

					<form class="wrap-form-reservation size22 m-l-r-auto">
						<div class="row">
							<div class="col-md-4">
								<!-- Date -->
								<span class="txt9">
									Fecha
								</span>

								<div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="date">
									<i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
								</div>
							</div>

							<div class="col-md-4">
								<!-- Time -->
								<span class="txt9">
									Hora
								</span>

								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="time">
										<option>9:00</option>
										<option>9:30</option>
										<option>10:00</option>
										<option>10:30</option>
										<option>11:00</option>
										<option>11:30</option>
										<option>12:00</option>
										<option>12:30</option>
										<option>13:00</option>
										<option>13:30</option>
										<option>14:00</option>
										<option>14:30</option>
										<option>15:00</option>
										<option>15:30</option>
										<option>16:00</option>
										<option>16:30</option>
										<option>17:00</option>
										<option>17:30</option>
										<option>18:00</option>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<!-- People -->
								<span class="txt9">
									Personas
								</span>

								<div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="people">
										<option>1 persona</option>
										<option>2 personas</option>
										<option>3 personas</option>
										<option>4 personas</option>
										<option>5 personas</option>
										<option>6 personas</option>
										<option>7 personas</option>
										<option>8 personas</option>
										<option>9 personas</option>
										<option>10 personas</option>
										<option>11 personas</option>
										<option>12 personas</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									Nombre
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Nombre" required>
								</div>
							</div>

							<div class="col-md-4">
								<!-- Phone -->
								<span class="txt9">
									Telefono
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Telefono" required>
								</div>
							</div>

							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Correo
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="Correo" required>
								</div>
							</div>

						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
								Reservar
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="info-reservation flex-w p-t-80">
				<div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
					<h4 class="txt5 m-b-18">
						Reservar por llamada
					</h4>

					<p class="size25">
						Llamanos contestaremos en seguida y te atenderemos con mucha amabilidad y gusto.
						<span class="txt24">(001) 345 6889</span>
					</p>
				</div>

			</div>
		</div>
	</section>
@endsection