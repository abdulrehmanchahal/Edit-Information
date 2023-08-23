<?php



$servername = "localhost";
$username = "root";
$password = "";
$database = "editinfo";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Unable to connect" . mysqli_connect_error());
}

$query = "SELECT DISTINCT class FROM classes";
$result = mysqli_query($conn, $query);

$disciplinequery = "SELECT DISTINCT discipline FROM disciplines";
// "SELECT * FROM studentinfo ORDER By discipline ASC";
$disciplineresult = mysqli_query($conn, $disciplinequery);

$cityquery = "SELECT DISTINCT city FROM cities";
$cityresult = mysqli_query($conn, $cityquery);





if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $cnic = $_POST['cnic'];
    $gender = $_POST['gender'];
    $selectclass = $_POST['selectclass'];
    $discipline = $_POST['discipline'];
    $bloodgroup = $_POST['bloodgroup'];
    $dob = $_POST['dob'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $city = $_POST['city'];
    $streetaddress = $_POST['streetaddress'];
    $blockaddress = $_POST['blockaddress'];
    $zipcode = $_POST['zipcode'];
    $houseaddress = $_POST['houseaddress'];
    $phone = $_POST['phoneno'];
    $landline = $_POST['landline'];
    $email = $_POST['email'];
    $fatherphone = $_POST['fatherphone'];
    $motherphone = $_POST['motherphone'];
    $fathercnic = $_POST['fathercnic'];
    $mothercnic = $_POST['mothercnic'];


    $updatesql = "UPDATE `studentinfo` SET `firstname` = '$firstname' , `lastname` = '$lastname' ,
    cnic = '$cnic',
    gender = '$gender',
     class = '$selectclass',
     discipline = '$discipline',
    bloodgroup = '$bloodgroup',
     dob = '$dob',
     fathername = '$fathername',
     mothername = '$mothername',
     streetaddress = '$streetaddress',
     blockaddress = '$blockaddress',
     zipcode = '$zipcode',
     houseaddress = '$houseaddress',
     phoneno = '$phone',
     landline = '$landline',
     email = '$email',
     fatherphone = '$fatherphone',
     motherphone = '$motherphone',
     fathercnic = '$fathercnic',
     mothercnic = '$mothercnic'
     '' WHERE `studentinfo`.`srno` = 1";
    $updateresult = mysqli_query($conn, $updatesql);

    if($updateresult){
        echo "Update Successfully";
    }

}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>


    <div class="container mt-5">

        <h1 class="text-center mb-5">Edit Information</h1>

        <form action="editinfo.php" method="post">


            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="firstname">Frist Name:</label>
                        <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="col">
                        <label for="lastname">Last Name:</label>
                        <input type="text" pattern="[A-Za-z\s]+" class="form-control" id="lastname" name="lastname">
                    </div>
                    <div class="col">
                        <label for="cnic">CNIC:</label>
                        <!-- pattern="\d{5}-\d{7}-\d" -->
                        <input type="text"  class="form-control" id="cnic" name="cnic">
                    </div>
                </div>

            </div>

            <div class="mb-3">


                <div class="row">
                    <div class="col">
                        <label for="gender">Gender:</label>
                        <input type="text" id="gender" name="gender" class="form-control">
                        <!-- <select class="form-select" id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select> -->
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="class">Class:</label>
                        <select class="form-select" id="selectclass" name="selectclass">
                            <?php
                            while($row = mysqli_fetch_array($result)){

                                echo '<option value="'.$row["class"].'">'.$row["class"].' </option>';

                            }
                            ?>
                        </select>

                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="discipline">Discipline:</label>
                        <select class="form-select" id="discipline" name="discipline">
                            <?php
                             while($row = mysqli_fetch_array($disciplineresult)){

                                echo '<option value="'.$row["discipline"].'">'.$row["discipline"].' </option>';

                            }
                            ?>
                            
                        </select>

                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="bloodgroup">Blood Group:</label>
                        <input type="text" id="bloodgroup" name="bloodgroup" class="form-control">
                        <!-- <select class="form-select" id="bloodGroup" name="bloodgroup">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            Add more options as needed
                        </select> -->

                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                </div>

            </div>

            <div class="mb-3">

                <div class="row">
                    <div class="col">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" id="dob" class="form-control">
                    </div>
                    <div class="col">
                        <label for="fathername">Father Name:</label>
                        <input type="text" pattern="[A-Za-z\s]+" name="fathername" id="fathername" class="form-control">
                    </div>
                    <div class="col">
                        <label for="mothername">Mother Name:</label>
                        <input type="text" pattern="[A-Za-z\s]+" name="mothername" id="mothername" class="form-control">
                    </div>
                    <div class="col">
                        <label for="city">City:</label>
                        <select class="form-select" id="city" name="city">
                            <?php
                             while($row = mysqli_fetch_array($cityresult)){

                                echo '<option value="'.$row["city"].'">'.$row["city"].' </option>';

                            }
                            ?>
                        </select>
                    </div>

                </div>

            </div>

            <div class="mb-3">

                <div class="row">
                    <div class="col">
                        <label for="streetaddress">Street Address:</label>
                        <textarea name="streetaddress" id="streetaddress" cols="3" rows="3" class="form-control"></textarea>
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="blockaddress">Block Address:</label>
                        <textarea name="blockaddress" id="blockaddress" cols="3" rows="3" class="form-control"></textarea>
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="zipcode">Zipcode:</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control">
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>

                </div>

            </div>



            <div class="mb-3">

                <div class="row">
                    <div class="col">
                        <label for="houseaddress">House Address:</label>
                        <textarea name="houseaddress" id="houseaddress" cols="3" rows="3" class="form-control"></textarea>
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="phoneno">Phone:</label>
                        <input type="tel" name="phoneno" id="phoneno" class="form-control">
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="landline">Land Line:</label>
                        <input type="tel" name="landline" id="landline" class="form-control">
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>


                </div>

            </div>

            <div class="mb-3">

                <div class="row">
                    <div class="col">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="fatherphone">Father Phone:</label>
                        <input type="tel" name="fatherphone" id="fatherphone" class="form-control">
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>
                    <div class="col">
                        <label for="motherphone">Mother Phone:</label>
                        <input type="tel" name="motherphone" id="motherphone" class="form-control">
                        <!-- <button class="btn btn-outline-secondary btn-sm" type="button">Edit</button> -->
                    </div>


                </div>


                <div class="mb-3 mt-3">
                    <div class="row">
                        <div class="col">
                            <label for="fathercnic">Father CNIC:</label>
                            <!-- pattern="\d{5}\d{7}\d" -->
                            <input type="text"  name="fathercnic" id="fathercnic" class="form-control">
                        </div>
                        <div class="col">
                            <label for="mothercnic">Mother CNIC:</label>
                            <!-- pattern="\d{5}\d{7}\d" -->
                            <input type="text"  name="mothercnic" id="mothercnic" class="form-control">
                        </div>
                        <div class="col mt-4">
                            <button type="submit" class="btn btn-primary" id="save">Save</button>
                        </div>
                    </div>
                </div>


        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Load data using AJAX when the page loads
            $.ajax({
                url: 'fetchdata.php', 
                method: 'POST', 
                dataType: 'json', 
                success: function(data) {
                    // Populate form fields with retrieved data
                    $('#firstname').val(data.firstname);
                    $('#lastname').val(data.lastname);
                    $('#cnic').val(data.cnic);
                    $('#gender').val(data.gender);
                    $('#selectclass').val(data.class);
                    $('#discipline').val(data.discipline);
                    $('#bloodgroup').val(data.bloodgroup);
                    $('#dob').val(data.dob);
                    $('#fathername').val(data.fathername);
                    $('#mothername').val(data.mothername);
                    $('#city').val(data.city);
                    $('#streetaddress').val(data.streetaddress);
                    $('#blockaddress').val(data.blockaddress);
                    $('#zipcode').val(data.zipcode);
                    $('#houseaddress').val(data.houseaddress);
                    $('#phoneno').val(data.phoneno);
                    $('#landline').val(data.landline);
                    $('#email').val(data.email);
                    $('#fatherphone').val(data.fatherphone);
                    $('#motherphone').val(data.motherphone);
                    $('#fathercnic').val(data.fathercnic);
                    $('#mothercnic').val(data.mothercnic);
                    // Populate other form fields similarly
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
    <!-- ... Your HTML and form elements ... -->

    

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>