<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');
    exit(); 
}

include 'connection1.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {    
    
    $name = $_POST['name'];
    $gender= isset($_POST['gender']) ? $_POST['gender'] : ''; 
    $dob= $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address= $_POST['address'];
     
    $sql = "INSERT INTO clients(name, gender, dob, email, mobile, address) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $gender, $dob, $email, $mobile, $address);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['notification'] = "Klien '".htmlspecialchars($name)."' berhasil ditambahkan!";
        } else {
            $_SESSION['notification'] = "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['notification'] = "Error sistem: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    
    header("Location: client_data.php"); 
    exit();
}


include("../auth/header.php");
include("../auth/sidebar.php");
?>
<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Registration Form</h6>
                    <form action="add_client.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputText1" value="" placeholder="Enter Name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="gender" value="Male" class="form-check-input" id="mgender">
                                    <label class="form-check-label" for="mgender">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="gender" value="Female" class="form-check-input" id="fgender">
                                    <label class="form-check-label" for="fgender">Female</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Date Of Birth:</label>
                            <input type="text" class="form-control" name="dob" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"/>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail3" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail3" value="" placeholder="Enter Email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputMobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" id="exampleInputMobile" placeholder="Mobile number" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> Address </label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        
                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>

<?php 
include("../auth/footer.php");
?>