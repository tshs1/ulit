<div class="modal fade" id="modal-main" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 id="modal-title">Add Student</h1>
            </div>
            <div class="modal-body">
                <form id="set-Model" class="form-horizontal">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                        </div>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Student Name" required>
                    </div> 
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Todo</i></span>
                        </div>
                        <select name="teacher_id" id="teacher_id" class="form-control" required>
                            <option value="Underweight-Eat more meat, vegetable and do some exerciese">Underweight-Eat more meat, vegetable and do some exerciese</option>
                            <option value="Normal-Maintain your body and do some exerciese">Normal-Maintain your body and do some exerciese</option>
                            <option value="Overweight-less meat, rice more on vegetable and exerciese to burn fat">Overweight-less meat, rice more on vegetable and exerciese to burn fat</option>
                            <option value="Obese-less meat and rice. more on vegetable and set a goal and create exerciese">Obese-less meat and rice. more on vegetable and set a goal and create exerciese</option>
                        </select>
                    </div>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Weight</span>
                        </div>
                        <input type="text" name="weight" id="weight"  class="form-control" placeholder="Weight" required>
                    </div>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Height</span>
                        </div>
                        <input type="text" name="height" id="height"  class="form-control" placeholder="Height" required>
                    </div>
                    @if(Auth::user()->role_id == 1)
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Role</span>
                        </div>
                        <input type="number" name="role_id" id="role_id"  class="form-control" placeholder="Role" >
                    </div>
                    @endif
                </div>
                </form>
                <div class="modal-footer">
                <button type="button" id="engrave" class="btn btn-success form-control" data-id=0>Save</button>
                </div>
            </div>
        </div>
    </div>
</div>