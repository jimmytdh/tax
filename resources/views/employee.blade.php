@extends('app')

@section('css')
    <link href="{{ url('/') }}/plugins/DataTables/datatables.min.css" rel="stylesheet">
@endsection

@section('body')
    <h2 class="text-success title-header">Employee <small class="text-muted">Information</small></h2>
    <div class="table-responsive">
        <table id="dataTable" class="table-sm table-hover table-striped table-bordered" style="width:100%">
            <thead class="bg-dark text-yellow">
                <tr>
                    <th>PROCESS</th>
                    <th>COMPLETE NAME</th>
                    <th>DIVISION</th>
                    <th>SG</th>
                    <th>BASIC SALARY</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <?php $salary = \App\Http\Controllers\SalaryCtrl::getInfo($row->id); ?>
                    <tr>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                                <button type="button" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-calculator"></i></button>
                                <button type="button" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                        <td>{{ $row->lname.", ".$row->fname." ".$row->suffix." $row->mname" }}</td>
                        <td>{{ $salary->designation }}</td>
                        <td>{{ $salary->sg }}</td>
                        <td>{{ number_format($salary->basic_salary,2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
            </tfoot>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{ url('/') }}/plugins/DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 25
            });
        } );
    </script>
@endsection