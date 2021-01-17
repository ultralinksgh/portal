<?php 
require "sections/header.php";
require "sections/sidebar.php"; ?>

<h2>Students</h2>
<hr class="">

<button type="button" class="btn btn-dark btn-md mb-4" data-toggle="modal" data-target="#modelId">Add
    Student</button>

<div class="card">
    <div class="card-body">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th class="font-weight-bold">Student ID</th>
                    <th class="font-weight-bold">Student Name</th>
                    <th class="font-weight-bold">Adm Year</th>
                    <th class="font-weight-bold">Entry</th>
                    <th class="font-weight-bold">Phone No</th>
                    <th class="font-weight-bold">Email Address</th>
                    <th class="font-weight-bold">Programme</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <th class="font-weight-bold">Student ID</th>
                    <th class="font-weight-bold">Student Name</th>
                    <th class="font-weight-bold">Adm Year</th>
                    <th class="font-weight-bold">Entry</th>
                    <th class="font-weight-bold">Phone No</th>
                    <th class="font-weight-bold">Email Address</th>
                    <th class="font-weight-bold">Programme</th>
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
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Student ID</label>
                        <input type="text" name="studentid" id="studentid" class="form-control"
                            placeholder="Enter Student ID Here" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="">Student Name</label>
                        <input type="text" name="studentname" id="studentname" class="form-control"
                            placeholder="Enter Student Name Here" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="">Academic Year Admitted</label>
                        <input type="text" name="admission_year" id="admission_year" class="form-control"
                            placeholder="Example is 1992/1993" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="">Entry Level</label>
                        <select name="entry_level" id="entry_level" class="form-control" required>
                            <option value="" selected disabled>Select Entry Level</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                            placeholder="Example is 0546847775" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="text" name="email_address" id="email_address" class="form-control"
                            placeholder="Default is noemail@ccod.edu.gh" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="">Programme of Study</label>
                        <select name="programme" id="programme" class="form-control" required>
                            <option value="" selected disabled>Select Programme</option>
                            <option value="Diploma OD">Diploma in Organisational Development</option>
                            <option value="BSc OD">Bachelor of Science in Organisational Development</option>
                        </select>
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