//never use shorthand for closing tag
<?php echo "you r a girl" ?>


//not evaluating variable 
<?php
$name = 'Nikita';
echo 'Hello, $name'; 
?>

//evaluating variable
<?php
$name = 'Nikita';
echo "Hello, $name"; 

?>

//use require for imp file  //similar for require_once
<?php
require_once 'config.php'; 
?>

//use include if not necesaary file similar for include_once
<?php 
include 'header.php'; 
?>

//function name   it shouls be in small  letter and separated by _
<?php
function new_one(){
    echo "you are new one";
}

//variable name should be in LOWERCASE snake case
$user_name;
//constant name is in UPPERCASE_SNAKE_CASE
const USER_NUM=5;

?>
// space after each comma

<?php
$array = array(1, 2, 3, 4); 
new_one($a1, $a2); 
?>

//space should be on both side of operator 
<?php
$res1 = 2 + 3; 
$res2 = 8 * 7; 
$res3= $a === $b;
?>

//space before neagtion
<?php
if (! $true) {
}
?>
//space on both side of opening and closing parantheis
<?php
foreach ( $number as $num ) {
     }


//use tab 
     $n1    =   1;
     $n2    =   2;

//add brace for single line line statement
if ( $num>2 ) {
   echo "2 is larger";
}
?>
