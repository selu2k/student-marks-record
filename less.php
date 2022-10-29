<?php
$conn = mysqli_connect("localhost", "root", "", "studentdata");
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
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
            background-color: #F9F7F7;
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
            z-index: 999;
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
            /* align-items: center; */
            /* justify-content: center; */
            margin-top: 50px;
            /* background-color: rgb(237, 240, 240); */
            height: 100vh;
            width: 100%;
        }

        table {
            width: 750px;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #DBE2EF;
        }

        th {
            /* background: #3498db; */
            background: #3F72AF;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }

        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            table {
                width: 100%;
            }
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                content: attr(data-column);
                color: #000;
                font-weight: bold;
            }

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
            <div class="restable">
                <?php
                $sql = "SELECT * FROM student WHERE cat1 < 25 OR cat2 <25 ";
                if ($res = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($res) > 0) {
                        echo "<table>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Reg No.</th>";
                        echo "<th>Course</th>";
                        echo "<th>Course Code</th>";
                        echo "<th>CAT1</th>";
                        echo "<th>CAT2</th>";
                        echo "<th>Quiz1</th>";
                        echo "<th>DA1</th>";
                        echo "<th>DA2</th>";
                        echo "<th>Internal</th>";
                        echo "<th>Comment</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($res)) {

                            echo "<tr>";
                            echo "<td data-column='Name'>" . $row['name'] . "</td>";
                            echo "<td data-column='Reg No.'>" . $row['regnum'] . "</td>";
                            echo "<td data-column='Course'>" . $row['course'] . "</td>";
                            echo "<td data-column='COurse Code'>" . $row['coursecode'] . "</td>";
                            if ($row['cat1'] < 25) {
                                echo "<td data-column='CAT1' style='background-color:red'>" . $row['cat1'] . "</td>";
                            } else if ($row['cat1'] > 45) {
                                echo "<td data-column='CAT1' style='background-color:green'>" . $row['cat1'] . "</td>";
                            } else {
                                echo "<td data-column='CAT1'>" . $row['cat1'] . "</td>";
                            }
                            if ($row['cat2'] < 25) {
                                echo "<td data-column='CAT2' style='background-color:red'>" . $row['cat2'] . "</td>";
                            } else if ($row['cat2'] > 45) {
                                echo "<td data-column='CAT2' style='background-color:green'>" . $row['cat2'] . "</td>";
                            } else {
                                echo "<td data-column='CAT2'>" . $row['cat2'] . "</td>";
                            }
                            echo "<td data-column='Quiz1'>" . $row['quiz1'] . "</td>";
                            echo "<td data-column='DA1'>" . $row['da1'] . "</td>";
                            echo "<td data-column='DA2'>" . $row['da2'] . "</td>";
                            echo "<td data-column='Internal'>" . $row['internal'] . "</td>";
                            echo "<td data-column='Comment'>" . $row['comment'] . "</td>";
                            echo "</tr>";
                        }
                        echo "<tbody>";
                        echo "</table>";
                        mysqli_free_result($res);
                    } else {
                        echo "No matching student records are found.";
                    }
                } else {
                    echo "ERROR: Not able to execute $sql. "
                        . mysqli_error($link);
                }
                // mysqli_close($conn);
                ?>
            </div>

        </div>
    </div>
</body>

</html>