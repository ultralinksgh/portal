<?php 
require("../middleware/verifyadmin.php");
require "../script/UltraDBLayer.php";
include "sections/header.php";
include "sections/sidebar.php"; 
$db = new UltraDBLayer;
?>

<h2 class="font-weight-bold">Facilitators</h2>
<hr class="">
<button type="button" class="btn btn-dark btn-md mb-4" data-toggle="modal" data-target="#modelId">Add
    Facilitator</button>

<div class="card">
    <div class="card-body">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th class="font-weight-bold">SN</th>
                    <th class="font-weight-bold">STAFF ID</th>
                    <th class="font-weight-bold">STAFF NAME</th>
                    <th class="font-weight-bold">PHONE NO</th>
                    <th class="font-weight-bold">EMAIL ADDRESS</th>
                    <th class="font-weight-bold"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    (int) $i = 0;
                    $query = $db->select_records("facilitators");
                    while ($rec = mysqli_fetch_assoc($query)) {
                        $i++;
                        ?>
                <tr>
                    <td><?php echo $i."."; ?></td>
                    <td><?php echo $rec["staffid"]; ?></td>
                    <td><?php echo $rec["name"]; ?></td>
                    <td><?php echo $rec["phone"]; ?></td>
                    <td><?php echo $rec["email"]; ?></td>
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
                    <th class="font-weight-bold">STAFF ID</th>
                    <th class="font-weight-bold">STAFF NAME</th>
                    <th class="font-weight-bold">PHONE NO</th>
                    <th class="font-weight-bold">EMAIL ADDRESS</th>
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
                    <h5 class="modal-title">Add Facilitator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Staff ID</label>
                        <input type="text" name="staff_id" id="staff_id" class="form-control"
                            placeholder="Enter Staff ID Here" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Staff Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter Staff Name Here" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            placeholder="Example is 0546847775" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control"
                            placeholder="Default is noemail@ccod.edu.gh" aria-describedby="helpId" required>
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
        url: "../script/admin/save_facilitator.php",
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