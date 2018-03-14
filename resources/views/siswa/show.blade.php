@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Siswa 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $b->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">nim</label>
						<input type="text" name="nim" class="form-control" value="{{ $b->nim }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Guru</label>
						<input type="text" name="guru_id" class="form-control" value="{{ $b->guru->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection