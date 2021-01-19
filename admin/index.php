<?php 
session_start();
$_SESSION["_token"] = bin2hex(openssl_random_pseudo_bytes(16));
require "../script/UltraDBLayer.php";
require "sections/header.php";
$db = new UltraDBLayer;
// echo password_hash("1234",PASSWORD_DEFAULT);
?>

<div class="row mt-5">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <h3 class="font-weight-bold text-center mt-5">CCOD Blended Learning</h3>
        <h5 class="font-weight-bold text-center mb-3">UNDERGRADUATE PORTAL</h5>
        <div class="card">
            <div class="card-body">
                <form id="frmlogin" action="../script/admin/login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter password" required>
                    </div>
                    <input type="hidden" id="_token" name="_token" value="<?php echo $_SESSION["_token"]; ?>">
                    <button type="submit" class="btn btn-md btn-primary">Log In</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>

<?php require "sections/footer.php"; ?>