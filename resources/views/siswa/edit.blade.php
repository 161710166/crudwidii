@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Post 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('siswa.update',$b->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama siswa</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $b->nama }}" required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nim') ? ' has-error' : '' }}">
			  			<label class="control-label">NIM</label>	
			  			<input type="text" value="{{ $b->nim }}" name="nim" class="form-control"  required>
			  			@if ($errors->has('nim'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nim') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('guru_id') ? ' has-error' : '' }}">
			  			<label class="control-label">guru</label>	
			  			<select name="guru_id" class="form-control">
			  				@foreach($guru as $data)
			  				<option value="{{ $data->id }}" {{ $selectedGuru == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('guru_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('guru_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection