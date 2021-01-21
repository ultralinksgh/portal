<?php 
require("../middleware/verifyadmin.php");
require "../script/UltraDBLayer.php";
require "sections/header.php";
require "sections/sidebar.php"; 
$db = new UltraDBLayer;
?>

<h2 class="font-weight-bold">Students</h2>
<hr class="">

<button type="button" class="btn btn-dark btn-md mb-4" data-toggle="modal" data-target="#modelId">Add
    Student</button>

<div class="card">
    <div class="card-body">
        <table id="tblstudents" class="table table-hover table-sm">
            <thead>
                <tr>
                    <th class="font-weight-bold">SN</th>
                    <th class="font-weight-bold">STUDENT ID</th>
                    <th class="font-weight-bold">STUDENT NAME</th>
                    <th class="font-weight-bold">ENTRY</th>
                    <th class="font-weight-bold">PROGRAMME</th>
                    <th class="font-weight-bold">CENTRE</th>
                    <th class="font-weight-bold"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                (int) $i = 0;
                $query = $db->select_records("students");
                while ($rec = mysqli_fetch_assoc($query)) {
                    $i++;
                    ?>
                <tr>
                    <td><?php echo $i.'.'; ?></td>
                    <td><?php echo $rec["studentid"]; ?></td>
                    <td><?php echo $rec["name"]; ?></td>
                    <td><?php echo $rec["level"]; ?></td>
                    <td><?php echo $rec["program"]; ?></td>
                    <td><?php echo $rec["center"]; ?></td>
                    <td>
                        <a href="#!" class="btn-sm btn-primary text-white font-weight-bold">Edit</a> /
                        <a href="#!" class="btn-sm btn-danger text-white font-weight-bold">Delete</a> /
                        <a href="#!" class="btn-sm btn-secondary text-white font-weight-bold">Profile</a> 
                    </td>
                </tr>
                <?php
                }
                ; ?>
            </tbody>
            <tfoot>
                <tr>
                <th class="font-weight-bold">SN</th>
                    <th class="font-weight-bold">STUDENT ID</th>
                    <th class="font-weight-bold">STUDENT NAME</th>
                    <th class="font-weight-bold">ENTRY</th>
                    <th class="font-weight-bold">PROGRAMME</th>
                    <th class="font-weight-bold">CENTRE</th>
                    <th class="font-weight-bold"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="frmAdd">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Student ID</label>
                                <input type="text" name="student_id" id="student_id" class="form-control"
                                    placeholder="Enter Student ID Here" aria-describedby="helpId" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Student Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter Student Name Here" aria-describedby="helpId" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Academic Year Admitted</label>
                                <input type="text" name="admission_year" id="admission_year" class="form-control"
                                    placeholder="Example is 1992/1993" aria-describedby="helpId" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Entry Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="" selected disabled>Select Entry Level</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="Example is 0546847775" aria-describedby="helpId" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Email Address</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Default is noemail@ccod.edu.gh" aria-describedby="helpId" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Programme of Study</label>
                        <select name="program" id="program" class="form-control" required>
                            <option value="" selected disabled>Select Programme</option>
                            <option value="Diploma OD">Diploma in Organisational Development</option>
                            <option value="BSc OD">Bachelor of Science in Organisational Development</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Mobilization Centre</label>
                        <select name="centre" id="centre" class="form-control" required>
                            <option value="" selected disabled>Select Mobilization Centre</option>
                            <option value="Sunyani">Sunyani (Main Campus)</option>
                            <option value="Tamale">Tamale</option>
                            <option value="Kintampo">Kintampo</option>
                        </select>
                    </div>
                    <input type="hidden" name="_token" id="_token" value="<?php echo $_SESSION["_token"];?>"
                        class="form-control" required>
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

<script>
// $("#tblstudents").DataTable();

$("#frmAdd").on("submit", function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "../script/admin/save_student.php",
        data: data,
        success: function(response) {
            if (response == "success") {
                alert("Registration Successful");
                $("#frmAdd")[0].reset();
            } else {
                alert(response);
            }
        }
    });
});
</script>