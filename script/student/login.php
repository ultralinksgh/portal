<?php
    session_start();
    require "../UltraDBLayer.php";
    $db = new UltraDBLayer();

    $username=$db->validate($_POST['studentid']);
    $password=$db->validate($_POST['password']);

    if(empty($username) || empty($password)){
            echo 'All fields are required';
    }else
    {
        if($_SERVER['REQUEST_METHOD']=='POST'):
            if(empty($_POST['_token']) || $_POST['_token']!=$_SESSION['_token']):
                echo ('Invalid CSRF token');
            else:
                $conn = $db->connection();
                $query = mysqli_query($conn, "SELECT * FROM students WHERE studentid='$username'") or die("Something went wrong");

                if($query){
                    if(mysqli_num_rows($query)>0){
                        $row = mysqli_fetch_assoc($query);
                        if($row['status'] == 1){
                            if(password_verify($password,$row['password'])){
                                $_SESSION['user']=$row;
                                echo 'success';
                            }else{
                                echo 'Your credentials are invalid';
                            }
                        }elseif($row['status']== 2){
                            echo "You account is suspended";
                            exit();
                        }
                        else{
                            echo 'Your account is pending.';
                            exit();
                        }
                    }else{
                        echo 'Your credentials are invalid.';
                        exit();
                    }
                }
            endif;
        endif;
    }

       

?>