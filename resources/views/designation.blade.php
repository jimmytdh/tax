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
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Designation</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Designation Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="sg">Salary Grade</label>
                                <input type="number" min="1" max="33" value="1" class="form-control" id="sg" name="sg" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="basic">Basic Salary</label>
                                <input type="number" value="0" disabled class="form-control" id="basic" name="basic" placeholder="">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-block">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-body">
                        @if(count($data)>0)

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

@endsection
