@extends('app')

@section('css')

@endsection

@section('body')
    <h2 class="text-success title-header">Employee <small class="text-muted">Panel</small></h2>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-primary">
                    @if(!$edit)
                        <div class="box-header with-border">
                            <h3 class="box-title">New Employee</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ url('/employee/save') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name" required name="fname" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Middle Name" required name="mname">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" required name="lname">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Suffix" name="suffix">
                                </div>
                                <div class="form-group">
                                    <select name="division" id="" class="form-control">
                                        <option>MCC</option>
                                        <option>HOPSS</option>
                                        <option>NSD</option>
                                        <option>Medical Division</option>
                                        <option>FMD</option>
                                        <option>QMD</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="designation" id="" class="form-control">
                                        @foreach($designation as $d)
                                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Date of Birth</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for="">Hired Date</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="hired_date">
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
                        <form role="form" method="post" action="{{ url('/employee/'.$info->id) }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $info->fname }}" placeholder="First Name" required name="fname" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $info->mname }}" placeholder="Middle Name" required name="mname">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $info->lname }}" placeholder="Last Name" required name="lname">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $info->suffix }}" placeholder="Suffix" name="suffix">
                                </div>
                                <div class="form-group">
                                    <select name="division" id="" class="form-control">
                                        <option @if($info->division=='MCC') selected @endif>MCC</option>
                                        <option @if($info->division=='HOPSS') selected @endif>HOPSS</option>
                                        <option @if($info->division=='NSD') selected @endif>NSD</option>
                                        <option @if($info->division=='Medical Division') selected @endif>Medical Division</option>
                                        <option @if($info->division=='FMD') selected @endif>FMD</option>
                                        <option @if($info->division=='QMD') selected @endif>QMD</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="designation" id="" class="form-control">
                                        @foreach($designation as $d)
                                            <option @if($info->designation==$d->id) selected @endif value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Date of Birth</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d',strtotime($info->birth_date)) }}" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for="">Hired Date</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d',strtotime($info->hired_date)) }}" name="hired_date">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer pull-right">
                                <a href="{{ url('/employee/delete/'.$info->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    @endif
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-9">
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

                @if(session('status')=='deleted')
                    <div class="alert alert-warning">
                        <i class="fa fa-check-circle"></i> Successfully Deleted!
                    </div>
                @endif
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <form action="{{ url('/employee/search') }}" method="post">
                                {{ csrf_field() }}
                                <div class="input-group input-group-sm mb-0">
                                    <input type="text" class="form-control" name="keyword" value="{{ Session::get('empKeyword') }}" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <h3 class="box-title">Employee List</h3>
                    </div>

                    <div class="box-body">
                        @if(count($data)>0)
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Division</th>
                                    <th scope="col">Date Hired</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <?php
                                        $d = \App\Http\Controllers\LibraryCtrl::getDesignationInfo($row->designation);
                                    ?>
                                    <tr>
                                        <th>
                                            <a href="{{ url('/employee/'.$row->id) }}">
                                                {{ str_pad($row->id,3,0,STR_PAD_LEFT) }}
                                            </a>
                                        </th>
                                        <td>
                                            {{ $row->lname }}, {{ $row->fname }} {{ $row->mname }}
                                        </td>
                                        <td>{{ \App\Http\Controllers\LibraryCtrl::getDesignationInfo($row->designation)->code }}</td>
                                        <td>{{ $row->division }}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->hired_date)->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4"></div>
                            {{ $data->links() }}
                        @else
                            <img src="{{ url("/images/no_result_found.gif") }}" class="img-thumbnail" width="100%" alt="">
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
        $('#delete').on('click',function(e){
            e.preventDefault();
            var c = confirm("Are you sure you want to delete this employee?");
            if(c==true)
                window.location = $(this).attr('href');
        });
    </script>
@endsection
