<div class="modal fade" id="modal-main" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 id="modal-title">Add Sections</h1>
            </div>
            <div class="modal-body">
                <form id="set-Model" class="form-horizontal">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Section Name" required>
                    </div> 
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <select name="teacher_id" id="teacher_id" class="form-control"></select>
                    </div> 
                </div>
                </form>
                <div class="modal-footer">
                <button type="button" id="engrave" class="btn btn-success form-control" data-id=0>Save</button>
                </div>
            </div>
        </div>
    </div>
</div>