
<?php
// Print the array from getdate()
//print_r(getdate());
// echo "<br><br>";

// // Return date/time info of a timestamp; then format the output
// $mydate=getdate(date("U"));

// echo " $mydate[mon], $mydate[mday], $mydate[year]";
?>

<!-- <select id="year" name="years" >
<option value="">-- Select Year --</option>
<?php 
$datey = date("Y"); 
$d = 2015;
while($d <= $datey) {?>
<option value="<?php echo $d;?>"><?php echo $d ;?></option>
<?php $d++; }?>
</select> -->

<!-- 
<script type="text/javascript">
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
}
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
        document.getElementById('redhat1').style.display = 'none';
        document.getElementById('aix1').style.display = 'none';
    } 
    else if(document.getElementById('noCheck').checked) {
        document.getElementById('ifNo').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
        document.getElementById('redhat1').style.display = 'none';
        document.getElementById('aix1').style.display = 'none';
   }
}
function yesnoCheck1() {
   if(document.getElementById('redhat').checked) {
       document.getElementById('redhat1').style.display = 'block';
       document.getElementById('aix1').style.display = 'none';
    }
   if(document.getElementById('aix').checked) {
       document.getElementById('aix1').style.display = 'block';
       document.getElementById('redhat1').style.display = 'none';
    }
}
</script>

Select os :<br>
windows
<input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"/>Unix
<input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck"/>
<br>
<div id="ifYes" style="display:none">
khr moun
</div>
<div id="ifNo" style="display:none">
Red Hat
AIX
</div> -->




<!-- <select id="month" name="months"  >
				<option value="">-- Select Month --</option>
				<option value="01" <?php if($m==1){ echo "selected";}?>>01</option>
				<option value="02" <?php if($m==2){ echo "selected";}?>>02</option>
				<option value="03" <?php if($m==3){ echo "selected";}?>>03</option>
				<option value="04" <?php if($m==4){ echo "selected";}?>>04</option>
				<option value="05" <?php if($m==5){ echo "selected";}?>>05</option>
				<option value="06" <?php if($m==6){ echo "selected";}?>>06</option>
				<option value="07" <?php if($m==7){ echo "selected";}?>>07</option>
				<option value="08" <?php if($m==8){ echo "selected";}?>>08</option>
				<option value="09" <?php if($m==9){ echo "selected";}?>>09</option>
				<option value="10" <?php if($m==10){ echo "selected";}?>>10</option>
				<option value="11" <?php if($m==11){ echo "selected";}?>>11</option>
				<option value="12" <?php if($m==12){ echo "selected";}?>>12</option>
			</select> -->