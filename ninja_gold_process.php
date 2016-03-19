<?php session_start();

//this function will pass a min and max as parameters to return a random number between them
function get_gold($min, $max){
  return rand($min, $max);
}
//if restart form was submitted then unset the $_SESSION variable
if(isset($_POST['action']) && $_POST['action']=='restart_form'){
  $_SESSION= array();
  header("Location: ninja_gold.php");
}
//check if gold count stored in session, set to 0 if not stored
if(!isset($_SESSION['gold_count'])){
  $_SESSION['gold_count'] =0;
}

//let's see which location form has been submitted and set appropriate session variables
if(isset($_POST['location'])){
  $location=$_POST['location'];
  $gold_count=0;
  $activity=array();
  $class="green";

  switch($location){
    case'farm':
      $gold_count = get_gold(10,20);
    break;

    case 'cave':
      $gold_count = get_gold(5,10);
    break;

    case 'house':
      $gold_count = get_gold(2,5);
    break;

    case 'casino':
      $percent = get_gold(0,100);

      if($percent <= 70){
        $gold_count = get_gold(-50,-1);
        $class="red";
        $message="Ouch";
      }
      else{
        $gold_count= get_gold(1,50);
        $class="green";
        $message= "Nice";
      }

      break;

        }
      //$_SESSION['activity'] is an array that holds the logged info to activities
      //check if there is data already in array and if so store it in local $activity variable, later appended to 
        if(isset($_SESSION['activity']))
          //store local copy of current log array
          $activity=$_SESSION['activity'];
        else
          $activity=array();
        //set current gold count and build activity log to return to ninja_gold.php

        $_SESSION['gold_count'] += $gold_count;
        $_SESSION['activity'][]='<span class="' . $class . '"> You entered a ' . $location . ' and earned ' . $gold_count . ' golds. ' .

            (($location == 'casino')? '...'. $message. '.. ': '') . ' (' . date('M d, Y h:ia') . ')</span><br>';

            header("Location: ninja_gold.php");
            exit();
}

?>

