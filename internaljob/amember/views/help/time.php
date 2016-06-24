<?php $timestamp = "2016.2.25T13:34";

$today = new DateTime(); // This object represents current date/time
$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

$match_date = DateTime::createFromFormat( "Y.m.d\\TH:i", $timestamp );
$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

$diff = $today->diff( $match_date );
$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

switch( $diffDays ) {
    case 0:
        echo "//Today";
        echo DateTime();
        break;
    case -1:
        echo "//Yesterday";
        echo DateTime();
        break;
    case +1:
        echo "//Tomorrow";
        echo DateTime();
        break;
    default:
        echo "//Sometime";
        echo DateTime();
}

?>