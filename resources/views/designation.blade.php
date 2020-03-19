@extends('app')

@section('css')

@endsection

@section('body')
    <h2 class="text-success title-header">Designation <small class="text-muted">Panel</small></h2>
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="box box-primary">
                    @if(!$edit)
                    <div class="box-header with-border">
                        <h3 class="box-title">New Designation</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ url('/library/designation/save') }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="code">Designation Abbr.</label>
                                <input type="text" class="form-control" id="code" required name="code" placeholder="e.g. CMT II" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="name">Designation Name</label>
                                <input type="text" class="form-control" id="name" required name="name" placeholder="e.g. Computer Maintenance Technologist II">
                            </div>
                            <div class="form-group">
                                <label for="sg">Salary Grade</label>
                                <input type="number" min="1" max="33" value="1" class="form-control" id="sg" name="sg" placeholder="">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-block">Save</button>
                        </div>
                    </form>

                    @else

                    <div class="box-header with-border">
                        <h3 class="box-title">Update Designation</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ url('/library/designation/'.$info->id) }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="code">Designation Abbr.</label>
                                <input type="text" class="form-control" id="code" value="{{ $info->code }}" required name="code" placeholder="e.g. CMT II" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="name">Designation Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $info->name }}" required name="name" placeholder="e.g. Computer Maintenance Technologist II">
                            </div>
                            <div class="form-group">
                                <label for="sg">Salary Grade</label>
                                <input type="number" min="1" max="33" value="{{ $info->salary_grade }}" class="form-control" id="sg" name="sg" placeholder="">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info btn-block">Update</button>
                        </div>
                    </form>
                    @endif
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-8">
                <!-- general form elements -->
                @if(session('status')=='saved')
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i> Successfully Saved!
                </div>
                @endif

                @if(session('status')=='updated')
                    <div class="alert alert-info">
                        <i class="fa fa-check-circle"></i> Successfully Updated!
                    </div>
                @endif
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <form action="{{ url('/library/designation/search') }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group input-group-sm mb-0">
                                <input type="text" class="form-control" name="keyword" value="{{ Session::get('designationKeyword') }}" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <h3 class="box-title">Designation List | <a href="#" id="year" class="text-green">{{ Session::get('year') }}</a></h3>
                    </div>

                    <div class="box-body">
                        @if(count($data)>0)
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Salary Grade</th>
                                        <th scope="col">Basic Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                    <?php
                                        $sg = \App\Http\Controllers\LibraryCtrl::getSg($row->salary_grade);
                                    ?>
                                    <tr>
                                        <th>
                                            <a href="{{ url('/library/designation/'.$row->id) }}">
                                            {{ str_pad($row->id,3,0,STR_PAD_LEFT) }}
                                            </a>
                                        </th>
                                        <td>{{ $row->code }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->salary_grade }}</td>
                                        <td class="text-green">{{ number_format($sg->salary) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4"></div>
                            {{ $data->links() }}
                        @else
                            <img src="{{ url("/images/no_result_found.gif") }}" class="img-thumbnail" alt="">
                        @endif
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>


</script>
@endsection
