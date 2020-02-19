@extends('app')

@section('css')

@endsection

@section('body')
    <h2 class="text-success title-header">{{ "$employee->lname, $employee->fname" }} <small class="text-muted">{{ $employee->designation }}</small></h2>
    <div class="table-responsive">
        <table id="dataTable" class="table-sm table-hover table-striped table-bordered" style="width:100%">
            <thead class="bg-dark text-yellow">
            <tr>
                <th>SG {{ $employee->sg }}</th>
                <th>JAN</th>
                <th>FEB</th>
                <th>MAR</th>
                <th>APR</th>
                <th>MAY</th>
                <th>JUN</th>
                <th>JUL</th>
                <th>AUG</th>
                <th>SEP</th>
                <th>OCT</th>
                <th>NOV</th>
                <th>DEC</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Hazard</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
@endsection

@section('js')

@endsection
