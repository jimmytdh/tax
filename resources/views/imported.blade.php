@extends('app')

@section('css')

@endsection

@section('body')
    <h2 class="text-success title-header">Identify Column <small class="text-muted">Import Success</small></h2>
    <div class="row">
    <form action="{{ url('/imported') }}" method="post" class="form-inline">
    @foreach($included as $i => $k)
        <div class="col-md-4 mb-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ $k }}</span>
                </div>
                <select name="{{ $i }}"  class="form-control">
                    <option value=""></option>
                    @foreach($headers as $h)
                        <option>{{ $h }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endforeach
    <div class="dropdown-divider"></div>
    </form>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection