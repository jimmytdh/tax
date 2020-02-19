<div class="modal" tabindex="-1" role="dialog" id="taxEmployee">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="{{ url('/tax/employee') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Select Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="taxContent">Loading...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">View</button>
                </div>
            </form>
        </div>
    </div>
</div>
