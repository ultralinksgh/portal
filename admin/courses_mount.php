<?php 
require("../middleware/verifyadmin.php");
require "../script/UltraDBLayer.php";
include "sections/header.php";
include "sections/sidebar.php"; 
$db = new UltraDBLayer;
?>

<h2 class="font-weight-bold">Course Mount</h2>
<hr class="">
<div class="card">
    <div class="card-body">
        <form id="formMount">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Academic Year</label>
                        <input type="text" name="academic_year" id="academic_year" class="form-control"
                            placeholder="Enter academic year" aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Trimester</label>
                        <select name="trimester" id="trimester" class="form-control" required>
                            <option value="" selected disabled>Select Trimester</option>
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="" selected disabled>Select Level</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                        </select>
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

            <button type="submit" class="btn btn-md btn-secondary mt-3 mb-3">Mount Courses</button>
            <div class="table-responsive" id="table">
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
                    while ($rec = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="course_ids[]" value="<?php echo $rec['id']; ?>"></td>
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
            <button type="submit" class="btn btn-md btn-secondary mt-3 mb-3">Mount Courses</button>

        </form>
    </div>
</div>

<?php include "sections/footer.php"; ?>
<script>
$("#formMount").on("submit",function(e){
    e.preventDefault();
    var $this = $(this);
    var countChecked = 0;
    $('#table tr:has(td)').find('input[type="checkbox"]').each(function() {
        if ($(this).prop("checked")){
            countChecked +=1;
        }
    });
    if(countChecked === 0){
        alert("No course selected");
    }else{
        let data = $this.serialize();
        console.log(data);
        // $.ajax({
        //     type: "post",
        //     url: "../script/admin/allocate_course.php",
        //     data: data,
        //     success: function (response) {
        //         if (response == "success") {
        //             alert("Course allocation successful");
        //             $("#formMount")[0].reset();
        //         } else {
        //             alert(response);
        //         }
        //     }
        // });
    }
});
</script>