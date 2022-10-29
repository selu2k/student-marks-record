<?php

if (isset($_POST['SubmitButton'])) {
    $name = $_POST["name"];
    $regnum = $_POST["regnum"];
    $course = $_POST["course"];
    $coursecode = $_POST["coursecode"];
    $cat1 = $_POST["cat1"];
    $cat2 = $_POST["cat2"];
    $quiz1 = $_POST["quiz1"];
    $da2 = $_POST["da2"];
    $da1 = $_POST["da1"];
    $internal = ((float)$cat1 + (float)$cat2) * (3 / 10) + (int)$quiz1 + (int)$da2 + (int)$da1;

    $sql_insert = "INSERT INTO `student`(`name`, `regnum`, `course`, `coursecode`, `cat1`, `cat2`, `quiz1`, `da1`, `da2`, `internal`,`comment`) VALUES ('$name','$regnum','$course','$coursecode','$cat1','$cat2','$quiz1','$da1','$da2','$internal','')";
    $conn = mysqli_connect("localhost", "root", "", "studentdata");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Home Page</title>
    <style>
        * {
            margin: 0px;
            font-family: 'Open sans', Georgia, 'Times New Roman', Times, serif;
        }

        .container {
            display: flex;
            height: 100%;
        }

        .nav {
            display: flex;
            flex-direction: row;
            height: 50px;
            width: 100%;
            position: fixed;
            background-color: #112D4E;
            /* background-image: linear-gradient(130deg, rgb(36, 85, 163) 23%, rgb(52, 151, 219) 52%, rgb(52, 142, 219) 58%, rgb(52, 131, 219) 65%, rgb(40, 116, 166) 74%); */
            /* rgb(18, 124, 237) */
            align-items: center;
            padding-left: 10px;
        }

        a {
            margin: 2px;
            padding-top: 5px;
            padding-left: 5px;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
            /* background-color: rgb(237, 240, 240); */
            height: 100vh;
            width: 100%;
        }

        legend {
            font-size: 1.1em;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        #formSt {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* text-align: center; */
            /* vertical-align: middle; */
            padding: 20px;
            width: 400px;
            margin: auto;
            margin-top: 50px;
            background-color: #f4f7f8;
            border-radius: 8px;

            /* height: 100%; */
        }

        input[type=text] {
            display: block;
            width: 85%;
            height: 15px;
            margin: 5px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid rgb(0, 0, 0);
            background: rgba(255, 255, 255, 0.1);
            background-color: #e8eeef;
            color: #3C4048;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
        }

        #subbtn {
            width: 100px;
            height: 30px;
            background-color: rgb(52, 131, 219);
            color: white;
            border: none;
            margin: 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        fieldset {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 90%;
            text-align: center;
            border: none;
            border-top: 1px solid #103;
        }

        #submit {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h2 {
            margin-bottom: 20px;
            padding: 0 0 25px;
            text-align: center;
            /* text-decoration: underline; */
            /* transition: all .1s; */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="nav">

            <a href="home.php" target="_self" rel="noopener noreferrer">Home</a>
            <a href="display.php" target="_self" rel="noopener noreferrer">Display</a>
            <a href="slow.php" target="_self" rel="noopener noreferrer">Slow Learners</a>
            <a href="less.php" target="_self" rel="noopener noreferrer">Low Marks</a>
        </div>
        <div class="content">
            <form id="formSt" action="#" method="post">
                <h2>Student Data Insertion</h2>
                <fieldset>
                    <legend>Student Details</legend>
                    <!-- <label for="name">Name:</label> -->
                    <input type="text" name="name" id="name" placeholder="Student's Name">



                    <!-- <label for="regnum">Reg No:</label> -->
                    <input type="text" name="regnum" id="regNum" placeholder="Reg. Number">



                    <!-- <label for="course">Course:</label> -->
                    <input type="text" name="course" id="course" placeholder="Course Name">

                    <!-- <label for="coursecode">Course Code:</label> -->
                    <input type="text" name="coursecode" id="courseCode" placeholder="Course Code">
                </fieldset>



                <fieldset>
                    <legend>Marks</legend>
                    <!-- <label for="cat1">CAT1:</label> -->
                    <input type="text" name="cat1" id="cat1" placeholder="CAT1 Marks">

                    <!-- <label for="cat2">CAT2:</label> -->
                    <input type="text" name="cat2" id="cat2" placeholder="CAT2 Marks">

                    <!-- <label for="quiz1">Quiz1:</label> -->
                    <input type="text" name="quiz1" id="quiz1" placeholder="Quiz Marks">

                    <!-- <label for="quiz2">DA I:</label> -->
                    <input type="text" name="da1" id="quiz2" placeholder="DA-I Marks">

                    <!-- <label for="da">DA II:</label> -->
                    <input type="text" name="da2" id="da" placeholder="DA-II Marks">
                </fieldset>


                <!-- <label for="internal">Internal Marks:</label>
                <input type="text" name="internal" id="internal"> -->
                <div id="submit">
                    <input type="submit" name="SubmitButton" id="subbtn" value="Submit" onclick="return check()">
                    <?php
                    if (isset($_POST['SubmitButton'])) {

                        if (!mysqli_query($conn, $sql_insert)) {
                            die("Error: " . $sql_insert . "<br>" . mysqli_error($conn));
                        } else {
                            echo "<strong style='color:green'>New record inserted successfully!</strong>";
                        }
                    }
                    // mysqli_close($conn);
                    ?>
                </div>


            </form>
        </div>
    </div>
    <script>
        function check(){
            var cat1 = document.getElementById('cat1').value;
            var cat2 = document.getElementById('cat2').value;
            if(cat1 >50 || cat2 >50 || cat1 <0 || cat2 <0){
                alert("CAT marks should be between 0 and 50");
                return false;
            }else{
                return true;
            }
        }
    </script>
</body>

</html>