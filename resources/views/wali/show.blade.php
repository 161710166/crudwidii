@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Wali 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Wali</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $wali->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama siswa</label>	
			  			<input type="text" name="siswa_id" class="form-control" value="{{ $wali->siswa->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection