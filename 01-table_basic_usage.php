<style>
table, th, td {
  border: 2px solid black;
}
th{
  border-color: #96D4D4;
  padding:10;
}
td {
  border-color: #000000;
  padding:10;
}
</style>

<?php /** @noinspection ForgottenDebugOutputInspection */

use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

include 'src/SimpleXLSX.php';
//include '/../src/SimpleXLSX.php';

echo '<h1>Parse books.xslx</h1><pre>';
if ($xlsx = SimpleXLSX::parse('books.xlsx')) {
   // print_r($xlsx->rows());

    $countRow=count($xlsx->rows());
  //  print_r($countRow);

    $arrayListRow= $xlsx->rows();
   echo " <table border='1' cellpadding='3' style='border-collapse: collapse'>";
     for($i=0;$i<$countRow;$i++){
       // print_r($arrayListRow);
       // print_r($arrayListRow[$i]);
      // echo $i==0?"<th>": "<tr>";
       echo "<tr>";
      $innerArray=  $arrayListRow[$i];
      for($j=0;$j<count($innerArray);$j++){
       // print_r($innerArray[$j]);
       $startTag= $i==0?"<th>": "<td>";
       $endTag= $i==0?"</th>": "</td>";
        echo "$startTag $innerArray[$j] $endTag";
      }   
     // echo $i==0?"</th>": "</tr>";
     echo "</tr>";
    }
    echo " </table>";
} else {
    echo SimpleXLSX::parseError();
}
echo '<pre>';
