<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation</title>
    <link rel="stylesheet" type="text/css" href="assets/jQueryUi.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css" />
    <script src="assets/jQuery.js" type="text/javascript" ></script>
    <script src="assets/jQueryUiJs.js" type="text/javascript" ></script>
    <style>
        .main_form{
            margin-left: 5px;
        }
        input[type="text"]{
            height: 25px;
        }
    </style>
</head>
<body>
<div class="main_form">
<h4>Hotel Reservation </h4>
<form method="post" action="Hotel.php">
    <table>
        <tr>
            <td>From:</td>
            <td><input name="from" type="text" id="datepicker" value="<?php if (isset($_REQUEST['from'])) echo $_REQUEST['from'] ?>"></td>
        </tr><tr></tr>
        <tr>
            <td>To  :</td>

            <td><input name="to" type="text" id="datepicker2" value="<?php if (isset($_REQUEST['to']))echo $_REQUEST['to'] ?>"></td> </tr>

        <tr>

            <td>Customer Type</td>
            <td><select name="cust_type">
                <option value="REGULAR">Regular Customer</option>
                <option value="REWARDS">Rewards Customer</option>
            </select></td>
        </tr>
    </table>
    <input type="submit" value="Search">
</form>
<hr>
<?php  if (isset($_REQUEST['hotel'])) echo $_REQUEST['hotel'] ?>
    <div>


        <?php
        include_once ("GenerateResults.php");

        if (!isset( $_REQUEST["from"]))
        {
            echo "<h5>Sample Data</h5>";
            $file = "assets/inputs.txt";

            $fopen = fopen($file, 'r');

            $fread = fread($fopen, filesize($file));

            fclose($fopen);

            $remove = "\n";

            $split = explode($remove, $fread);

            $array[] = null;
            $tab = "\t";

            foreach ($split as $string) {
                $row = explode($tab, $string);
                array_push($array, $row);
            }
            echo "<pre>";

            for ($i=1;$i<count($array); $i++) {
                echo "<u>INPUT".$i."</u><br>";
                echo $array[$i][0]."<br>" ;
                $display = explode(',', $array[$i][0]);
                $cust_type_date_from = explode(':', $display[0]);
                $the_date_from = $cust_type_date_from[1];
                $the_cust_type = $cust_type_date_from[0];
                $the_date_to = $display[2];

                $getCheapHotel=new GenerateResults();
                $hotel = $getCheapHotel->generatesResults(trim($the_cust_type), trim($the_date_from),trim($the_date_to));

                echo "<u>OUTPUT".$i."</u><br>";
                echo $hotel."<br>";
            }
                echo "</pre>";
        }
        ?>
    </div>
</div>
<script>
    $(document).ready(

        function () {
            var today = new Date();
            $("#datepicker").datepicker({
                dateFormat: 'dMMyy(D)',
                changeMonth: true,
                changeYear: true,

                onSelect: function(date){
                    var date1 = $('#datepicker').datepicker('getDate');
                    var date = new Date( Date.parse( date1 ) );
                    date.setDate( date.getDate() + 1 );
                    var newDate = date.toDateString();
                    newDate = new Date( Date.parse( newDate ) );
                    $('#datepicker2').datepicker("option","minDate",newDate);
                }
            });
            $("#datepicker2").datepicker({
                dateFormat: 'dMMyy(D)',
                changeMonth: true,
                changeYear: true

            });
        }
    );
</script>
</body>
</body>
</html>