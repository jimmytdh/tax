@extends('app')

@section('css')

@endsection

@section('body')

    <h2 class="text-success title-header">Salary Grade <small class="text-muted">Table | <a href="#" id="year" class="text-green">{{ $year }}</a></small></h2>

    <section class="content">
        <table class="table table-sm table-bordered text-center">
            <tr>
                <th>Salary Grade</th>
                @for($i=1;$i<9;$i++)
                <th>Step {{ $i }}</th>
                @endfor
            </tr>
            @for($i=1;$i<34;$i++)
            <tr>
                <th>{{ $i }}</th>
                @for($x=1;$x<9;$x++)
                    <?php
                        $code = '';
                        if($x==1)
                            $code = $i;
                        else
                            $code = "$i-$x";

                        $sg = \App\Http\Controllers\LibraryCtrl::getSg($code);
                    ?>
                    <td><a href="#" id="step{{ "$i$x" }}" data-code="{{ $code }}" data-id="{{ $sg->id }}" class="step">{{ number_format($sg->salary) }}</a></td>
                @endfor
            </tr>
            @endfor
        </table>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.step').each(function(){
                $('#'+this.id).editable({
                    type: 'text',
                    name: 'salary',
                    url: "{{ url('/library/sg/update/') }}",
                    pk: $(this).data('id'),
                    params: {
                        'code' : $(this).data('code')
                    },
                    success: function(data, value){
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection
