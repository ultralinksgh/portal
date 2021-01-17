<?php 
require "sections/header.php";
require "sections/sidebar.php"; ?>

<h2>Courses</h2>
<hr class="">
<button type="button" class="btn btn-dark btn-md mb-4" data-toggle="modal" data-target="#modelId">Add
    Course</button>

<div class="card">
    <div class="card-body">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th class="font-weight-bold">CODE</th>
                    <th class="font-weight-bold">COURSE TITLE</th>
                    <th class="font-weight-bold">CREDIT</th>
                    <th class="font-weight-bold">LEVEL</th>
                    <th class="font-weight-bold">TRIMESTER</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <th class="font-weight-bold">CODE</th>
                    <th class="font-weight-bold">COURSE TITLE</th>
                    <th class="font-weight-bold">CREDIT</th>
                    <th class="font-weight-bold">LEVEL</th>
                    <th class="font-weight-bold">TRIMESTER</th>
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
                        <input type="text" name="course_tile" id="course_tile" class="form-control"
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