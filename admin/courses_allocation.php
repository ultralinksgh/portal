<?php 
require("../middleware/verifyadmin.php");
include("../script/UltraDBlayer.php");
include "sections/header.php";
include "sections/sidebar.php"; 
$db=new UltraDBlayer;
?>

<h2 class="font-weight-bold">Course Allocation</h2>
<hr class="">
<div class="card">
    <div class="card-body">
        <form id="frmallocate">
            <div class="form-group">
                <label for="" class="font-weight-bold">Academic Year</label>
                <input type="text" name="academic_year" id="academic_year" class="form-control"
                    placeholder="Enter academic year" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
                <label for="" class="font-weight-bold">Staff Name</label>
                <select name="staff_id" id="staff_id" class="form-control" required>
                    <option value="" selected disabled>Select Staff</option>
                    <?php
                    $query = $db->select_records("facilitators");
                    while ($rec = mysqli_fetch_assoc($query)) {
                         ?>
                    <option value="<?php echo $rec["id"];?>"><?php echo $rec["name"];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" id="_token" name="_token" value="<?php echo $_SESSION["_token"]; ?>">
            <button type="submit" class="btnsave btn btn-md btn-secondary mt-3 mb-3">Mount Courses</button>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="font-weight-bold">SELECT</th>
                            <th class="font-weight-bold">CODE</th>
                            <th class="font-weight-bold">COURSE TITLE</th>
                            <th class="font-weight-bold">CREDIT</th>
                            <th class="font-weight-bold">LEVEL</th>
                            <th class="font-weight-bold text-center">TRIM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    $query = $db->select_records("courses");
                    while ($rec = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><input type="checkbox" name="course_ids[]"></td>
                            <td><?php echo $rec["course_code"]; ?></td>
                            <td><?php echo $rec["course_title"]; ?></td>
                            <td><?php echo $rec["credit"]; ?></td>
                            <td><?php echo $rec["course_level"]; ?></td>
                            <td class="text-center"><?php echo $rec["trimester"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="font-weight-bold">SELECT</th>
                            <th class="font-weight-bold">CODE</th>
                            <th class="font-weight-bold">COURSE TITLE</th>
                            <th class="font-weight-bold">CREDIT</th>
                            <th class="font-weight-bold">LEVEL</th>
                            <th class="font-weight-bold text-center">TRIM</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <button type="submit" class="btnsave btn btn-md btn-secondary mt-3 mb-3">Mount Courses</button>
        </form>

    </div>
</div>

<?php include "sections/footer.php"; ?>
<script>
$("#frmallocate").on("submit",function(e){
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
        type: "post",
        url: "../script/admin/allocate_course.php",
        data: data,
        success: function (response) {
            if (response == "success") {
                alert("Course allocation successful");
                $("#frmallocate")[0].reset();
            } else {
                alert(response);
            }
        }
    });
});
</script>