<?php
/**
 * Created by PhpStorm.
 * User: Reginald
 * Date: 07/05/2017
 * Time: 12:15 AM
 */
include_once ("GenerateResults.php");

$getCheapHotel=new GenerateResults();
$hotel = $getCheapHotel->generatesResults($_POST["cust_type"], $_POST["from"],$_POST["to"]);
header("Location: index.php?hotel=".$hotel."&from=".$_POST["from"]."&to=". $_POST["to"]);






