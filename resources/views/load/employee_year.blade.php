<?php
    $emp = \App\Employee::orderBy('lname','asc')->get();
?>
<div class="form-group">
    <label for="emp">Employee</label>
    <select id="emp" name="emp" class="form-control" required>
        @foreach($emp as $e)
        <option value="{{ $e->id }}">{{ "$e->lname, $e->fname" }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="year">Year</label>
    <select id="year" name="year" class="form-control" required>
        <?php $year = date('Y'); ?>
        @for($i=0; $i<5; $i++)
            <option>{{ $year-- }}</option>
        @endfor
    </select>
</div>
