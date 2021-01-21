<?php 
require("../middleware/verifyadmin.php");
require "../script/UltraDBLayer.php";
include "sections/header.php";
include "sections/sidebar.php"; 
$db = new UltraDBLayer;
?>

<h2 class="font-weight-bold">Courses</h2>
<hr class="">
<button type="button" class="btn btn-dark btn-md mb-4" data-toggle="modal" data-target="#modelId">Add
    Course</button>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="font-weight-bold">SN</th>
                        <th class="font-weight-bold">CODE</th>
                        <th class="font-weight-bold">COURSE TITLE</th>
                        <th class="font-weight-bold">CREDIT</th>
                        <th class="font-weight-bold">LEVEL</th>
                        <th class="font-weight-bold text-center">TRIM</th>
                        <th class="font-weight-bold"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    (int) $i = 0;
                    $query = $db->select_records("courses");
                    while ($rec = mysqli_fetch_assoc($query)) {
                        $i++;
                        ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rec["course_code"]; ?></td>
                        <td><?php echo $rec["course_title"]; ?></td>
                        <td><?php echo $rec["credit"]; ?></td>
                        <td><?php echo $rec["course_level"]; ?></td>
                        <td class="text-center"><?php echo $rec["trimester"]; ?></td>
                        <td>
                            <a href="#!" class="btn-sm btn-primary text-white font-weight-bold">Edit</a> /
                            <a href="#!" class="btn-sm btn-danger text-white font-weight-bold">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="font-weight-bold">SN</th>
                        <th class="font-weight-bold">CODE</th>
                        <th class="font-weight-bold">COURSE TITLE</th>
                        <th class="font-weight-bold">CREDIT</th>
                        <th class="font-weight-bold">LEVEL</th>
                        <th class="font-weight-bold text-center">TRIM</th>
                        <th class="font-weight-bold"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="frmAdd">
                <div class="modal-header">
                    <h5 class="modal-title">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Course Code</label>
                        <input type="text" name="course_code" id="course_code" class="form-control"
                            placeholder="Enter Course Code Here" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Course Title</label>
                        <input type="text" name="course_title" id="course_title" class="form-control"
                            placeholder="Enter course tile here" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Credit Hours</label>
                        <input type="text" name="credit" id="credit" class="form-control"
                            placeholder="Indicate credit hours" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Course Level</label>
                        <input type="text" name="course_level" id="course_level" class="form-control"
                            placeholder="Example is 100/200/300/400" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Course Trimester</label>
                        <input type="text" name="trimester" id="trimester" class="form-control"
                            placeholder="Example is 1/2/3" aria-describedby="helpId" required>
                    </div>
                    <input type="hidden" id="_token" name="_token" value="<?php echo $_SESSION["_token"]; ?>">
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
$("#frmAdd").on("submit", function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
        type: "post",
        url: "../script/admin/save_course.php",
        data: data,
        success: function(response) {
            if (response == "success") {
                alert("Registration Successful");
            } else {
                alert(response);
            }
        }
    });
});
</script>