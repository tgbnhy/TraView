<?php
include "includes/functions.php";
echo $_POST["algorithm"]."#".$_POST["result"]."#".$_POST["keywords"]."#".$_POST["locations"];
$loc_file = 'location.txt';
$key_file = './test/keyword.txt';
// The new person to add to the file
$keywords = explode(';',$_POST["keywords"]);
$locations = explode(';',$_POST["locations"]);
$output="";
for ($i = 0; $i<count($keywords); $i++){
    $output .= ($i+1).";".str_replace(",", " ", $keywords[$i])."\n";
}
file_put_contents($key_file, $output);
$output = "";
for ($i = 0; ($i+1)<count($locations); $i++){
    $output .= ($i+1)." ".str_replace(",", " ", $locations[$i])."\n";
}
file_put_contents($loc_file, $output);
$command_la = '/home/wangsheng/Desktop/geowand_share/build/wand_search -c test -p test/invfile_postings_NEWT.sdsl -f test/F_t_NEWT.sdsl -d test/f_t_NEWT.sdsl -l test/doc_lens.txt -g test/global.txt -q test -t test -k '.$_POST["result"].' -x location.txt -y location.txt';
//$command    = '/home/wangsheng/Desktop/geowand_share/build/wand_search -c NYC -p NYC/invfile_postings_NEWT.sdsl -f NYC/F_t_NEWT.sdsl -d NYC/f_t_NEWT.sdsl -l NYC/doc_lens.txt -g NYC/global.txt  -q NYC -t NYC -k 10 -x location.txt -y location.txt';
$output = shell_exec($command_la);
//	$output = shell_exec('/home/wangsheng/Desktop/geowand_share/build/wand_search -c test -p test/invfile_postings_NEWT.sdsl -f test/F_t_NEWT.sdsl -d test/f_t_NEWT.sdsl -l test/doc_lens.txt -g test/global.txt -q test -t test -k 20 -x test/coordinatenew.txt -y test/coordinatenew.txt');
echo "<pre>$output</pre>";
$result=explode("\n",$output);

foreach($result as $arr1 ){
	echo $arr1."</br>";
}
foreach($result as $id ){
//	$id=4879267;
	echo load_first_photos($mysqli, $id);
}
echo "#";
echo load_points($mysqli);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
