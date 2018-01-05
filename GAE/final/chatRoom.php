<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action">
        Vestibulum at eros
        <span class="badge badge-primary badge-pill">10</span>
    </a>
</div>
<button type="button" class="btn btn-sm btn-info rounded-circle fixed-bottom" data-toggle="modal" data-target="#contactModal">
    <i class="material-icons">add</i>
</button>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a friend by email.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" class="form-control" id="to" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>