<?php 
require "sections/header.php";
require "sections/sidebar.php"; ?>

<h2>Facilitators</h2>
<hr class="">
<button type="button" class="btn btn-dark btn-md mb-4" data-toggle="modal" data-target="#modelId">Add
    Facilitator</button>

<div class="card">
    <div class="card-body">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th class="font-weight-bold">Staff ID</th>
                    <th class="font-weight-bold">Staff Name</th>
                    <th class="font-weight-bold">Phone No</th>
                    <th class="font-weight-bold">Email Address</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <th class="font-weight-bold">Staff ID</th>
                    <th class="font-weight-bold">Staff Name</th>
                    <th class="font-weight-bold">Phone No</th>
                    <th class="font-weight-bold">Email Address</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title">Add Facilitator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Staff ID</label>
                        <input type="text" name="staffid" id="staffid" class="form-control"
                            placeholder="Enter Staff ID Here" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Staff Name</label>
                        <input type="text" name="staff_name" id="staff_name" class="form-control"
                            placeholder="Enter Staff Name Here" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                            placeholder="Example is 0546847775" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Email Address</label>
                        <input type="text" name="email_address" id="email_address" class="form-control"
                            placeholder="Default is noemail@ccod.edu.gh" aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-md btn-success">Save Record</button>
                    <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php require "sections/footer.php"; ?>