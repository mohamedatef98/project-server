@extends('mask')

@section('mask')
    <div class="submit">
        <form action="{{ route('post-submit',$task->id) }}"  method="POST">
            {{csrf_field()}}

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Files') }}</label>

                <div class="col-md-6">
                    <input id="files" type="text" class="form-control{{ $errors->has('files') ? ' is-invalid' : '' }}" name="files" value="{{ old('files') }}" autofocus>

                    @if ($errors->has('files'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('files') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0 justify-content-center">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection

@section('title')
    Submit
@endsection