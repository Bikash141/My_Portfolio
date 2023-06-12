<?php
include "database.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
<div class="container my-3">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>Employee Details</h2>
            <form action="#" method="POST">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label>Emp-ID</label>
                        <input name="emp-id" type="number" class="form-control" th:field="*{id}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" th:field="*{name}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Department</label>
                        <select name="department" class="form-control" th:field="*{dept}">
                            <option value="">Choose...</option>
                            <option value="IT">IT</option>
                            <option value="HR">HR</option>
                            <option value="Sale">Sale</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Age</label>
                        <input name="age" type="number" step="any" class="form-control" th:field="*{age}">
                    </div>

                    <div class="col-md-6 form-group">
                        <strong>Gender</strong>
                        <div class="form-check form-check-inline" >
                            <input class="form-check-input" type="radio" th:field="*{gender}" id="option1" value="Male" name="gender">
                            <label class="form-check-label" for="option1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" th:field="*{gender}" id="option2" value="Female" name="gender">
                            <label class="form-check-label" for="option2">Female</label>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                    </div>
                     <div class="col-md-6 form-group">
                        <label>Joining Date</label>
                        <input name="J_date" type="text" class="form-control" placeholder="yyyy-MM-dd" id="join_datepicker" th:field="*{joiningDate}">
                    </div>
                     <div class="col-md-6 form-group">
                        <label>Retiring Date</label>
                        <input name="R_date"type="text" class="form-control" placeholder="yyyy-MM-dd" id="retire_datepicker" th:field="*{retiringDate}">
                    </div>
                    <input name="file" type="file" id="myFile" name="filename">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
    $(function() {
        $("#join_datepicker").datepicker({dateFormat:"yy-mm-dd"});
        $("#retire_datepicker").datepicker({dateFormat:"yy-mm-dd"});
    });
</script>
</body>
</html> 

<?php
session_start(); 


if(isset($_POST['submit']))
{   
    $empid = $_POST['emp-id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $J_date = $_POST['J_date'];
    $R_date = $_POST['R_date'];
    $file = $_POST['file'];
    print_r($name);
    $sql = "INSERT INTO details (empid, name, department, age, gender, J_date, R_date, file) 
            VALUES ('$empid', '$name', '$department', '$age', '$gender', '$J_date', '$R_date', '$file')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully!";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>