@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Pridėti naują studentą
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                        @endif

                        <form method="post" action="{{ route('student.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __('Vardas') }}:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ old('name') }}" >
                                @error('name') {{ $message }} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Pavardė') }}:</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Telefonas') }}:</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" >
                            </div>

                            <button class="btn btn-success">Pridėti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
