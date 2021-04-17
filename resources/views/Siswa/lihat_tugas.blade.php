@extends('layout.app')
@section('title', 'CRUD Siswa')

<script src="{{ asset('temp/js/jam.js') }}"></script>
    <body class="hold-transition sidebar-mini" onload="realtimeClock()">
@section('content')
<br>
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>Pengumpulan Tugas</strong>
        </div>
        <div class="card-body">
            <a href="/Siswa/tugas" class="btn btn-primary">Kembali</a>
            <br>
			<br>
			
            <form name ="formlink" method="post" action="{{ route('tugasLink') }}" enctype="multipart/form-data">
				{{-- <form method="post" action="{{ route('kumpulTugasl') }}" enctype="multipart/form-data"> --}}
				@csrf
				<table class="table table-striped">
					<tr>
						<td>
							<h3>Nama Tugas</h3>
							<b>{{ $tugas->nama_tugas }}</b>
						</td>
					</tr>
					<tr>
						<td>
							<h3>Pengumpulan</h3>
							<br>
							<div id= "form-input">
								<input type="radio" name="rad" id="rad1" value="1" class="rad"/> Dengan File 
								<div id="form1" style="display:none">
									File : <input id="file" name="file" type="file" class="form-control @error('file') is-invalid @enderror "
									value="{{ old('file') }}">
			
									@if($errors->has('file'))
									<div class="text-danger">
										{{ $errors->first('file')}}
									</div>
									@endif
								</div>
								<br>
								<input type="radio" name="rad" id="rad2" value="2" class="rad"/> Dengan Link
								<!-- form yang mau ditampilkan-->
								<br>
								<div id="form2" style="display:none">
									Link: <input id="url" name="url" type="url" class="form-control @error('url') is-invalid @enderror "
									value="{{ old('url') }}">
			
								@if($errors->has('url'))
								<div class="text-danger">
									{{ $errors->first('url')}}
								</div>
								@endif
								</div>
							</div>
						</td>
						<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
							<script type="text/javascript">
								$(function(){
									$(":radio.rad").click(function(){
										$("#form1, #form2").hide()
										if($(this).val() == "1"){
											$("#form1").show();
										}else{
										$("#form2").show();
										}
									});
								});
							</script>
					</tr>
					<tr>
						<td>
							Nilai : 
							<input type="text" name= "nilai">
						</td>
					</tr>
					<tr>
						<td>
							Tanggal Mengumpulkan : 
							<label id="clock"></label>
							{{-- <input type="date" name= "pengumpulan"> --}}
						</td>
					</tr>
					
					<tr>
						<td>
							<script>
								CountDownTimer('{{$tugas->created_at}}', 'countdown');
								function CountDownTimer(dt, id)
								{
									var end = new Date('{{$tugas->end_date}}');
									var _second = 1000;
									var _minute = _second * 60;
									var _hour = _minute * 60;
									var _day = _hour * 24;
									var timer;
									function showRemaining() {
										var now = new Date();
										var distance = end - now;
										if (distance < 0) {
			
											clearInterval(timer);
											document.getElementById(id).innerHTML = '<b>TUGAS SUDAH BERAKHIR</b> ';
											return;
										}
										var days = Math.floor(distance / _day);
										var hours = Math.floor((distance % _day) / _hour);
										var minutes = Math.floor((distance % _hour) / _minute);
										var seconds = Math.floor((distance % _minute) / _second);
			
										document.getElementById(id).innerHTML = days + 'days ';
										document.getElementById(id).innerHTML += hours + 'hrs ';
										document.getElementById(id).innerHTML += minutes + 'mins ';
										document.getElementById(id).innerHTML += seconds + 'secs';
										document.getElementById(id).innerHTML +='<h4>TUGAS BELUM BERAKHIR</h4>';
									}
									timer = setInterval(showRemaining, 1000);
								}
							</script>
							<div id="countdown"> 
						</td>
					</tr>
				</table>
				<button type="submit" class="btn btn-primary">Unggah</button>
			</form>
		</div>
	</div>
</div>
@endsection
	</body>