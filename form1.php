<script type="text/javascript">
var popup = Number(0);
function checkForGrad(element)
{
	var sel = element.selectedIndex;
	if(popup==0)
	{
		if(element[sel].value == "SG" || element[sel].value == "Graduate School"  || element[sel].value == "Graziadio School" || element[sel].value == "School of" || element[sel].value == "School of")
		{
		//popup++;
		$("#ushouldkno").slideDown();
				
		}else{
			$("#ushouldkno").slideUp();
		}
	}
}
// ]]></script>
<p>Items marked with <span class="required">*</span> are required.</p>
<form id="frmRemission" class="pwebform" action="confirm.htm" method="post" name="frmTuitionRemission">
<table class="tableborders">
<tbody>
<tr><th colspan="2">Student Information</th></tr>
<tr>
<td>Last Name<span class="required">*</span></td>
<td><input tabindex="1" type="text" maxlength="30" placeholder="Last Name" required="" size="30" name="lastname" /></td>
</tr>
<tr>
<td>First Name<span class="required">*</span></td>
<td><input tabindex="2" type="text" maxlength="30" placeholder="First Name" required="" size="30" name="firstname" /></td>
</tr>
<tr>
<td>M.I.</td>
<td><input tabindex="3" type="text" maxlength="30" placeholder="MI" size="2" name="mi" /></td>
</tr>
<tr>
<td>E-mail Address<span class="required">*</span></td>
<td><input tabindex="4" type="email" maxlength="100" placeholder="Email" required="" size="30" name="email" /></td>
</tr>
<tr>
<td>Campus-wide ID (CWID)<span class="required">*</span><br /> <span class="small"><em>(no dashes)</em></span></td>
<td><input tabindex="5" type="number" maxlength="9" placeholder="CWID" required="" size="9" name="cwid" /></td>
</tr>
<tr>
<td>Age<span class="required">*</span></td>
<td><input tabindex="6" type="number" maxlength="2" placeholder="Age" required="" size="2" name="age" /></td>
</tr>
<tr>
<td>Relationship<span class="required">*</span></td>
<td><select tabindex="7" name="relationship" size="1">
<option selected="selected" value="Not selected">Select Relationship</option>
<option value="Child">Child</option>
<option value="Self">Self</option>
<option value="Spouse">Spouse</option>
</select></td>
</tr>
<tr>
<td>School Status<span class="required">*</span></td>
<td><select tabindex="8" name="status" size="1">
<option selected="selected" value="Not selected">Select School Status</option>
<option value="Undergraduate">Undergraduate</option>
<option value="Graduate">Graduate</option>
<option value="Non-Degree Undergraduate">Non-Degree Undergraduate</option>
<option value="Non-Degree Graduate">Non-Degree Graduate</option>
</select></td>
</tr>
<tr>
<td>Marital Status</td>
<td><select tabindex="9" name="marital" size="1">
<option selected="selected" value="Not selected">Select Marital Status</option>
<option value="Single">Single</option>
<option value="Married">Married</option>
<option value="Separated">Separated</option>
<option value="Divorced">Divorced</option>
</select></td>
</tr>
</tbody>
</table>
<br />
<div id="ushouldkno" style="display: none; border: 2px solid #DDDDDD; padding: 7px; margin-bottom: 5px;">
<table class="tableborders" border="0">
<tbody>
<tr><th colspan="2">Enrollment Information</th></tr>
<tr>
<td>School<span class="required">*</span></td>
<td><select id="grad_popup" tabindex="10" onchange="checkForGrad(this);" name="school" size="1">
<option selected="selected" value="Not selected">Select School</option>
<option value="Seaver Undergraduate">Seaver Undergraduate</option>
<option value="Seaver Graduate">Seaver Graduate</option>
<option value="Graduate School of Education and Psychology">Graduate School</option>
<option value="Graziadio School of Business and Management">School of Business</option>
<option value="School of Law">School of Law</option>
<option value="School of Public Policy">School of Public Policy</option>
</select></td>
</tr>
<tr>
<td>Term/Semester<span class="required">*</span></td>
<td><select tabindex="10" name="term" size="1">
<option selected="selected" value="Not selected">Select Term</option><?php
$cur_time = time();
$julian_day = date('z', $cur_time);
$cur_dy = date('j', $cur_time);
$cur_mon = date('n', $cur_time);
$cur_yr = date('Y', $cur_time);
$cur_season = "";
$cur_pointer = 0;
$temp_yr = $cur_yr;
$temp_season = "";
if (($julian_day >= 59) AND ($julian_day < 201)) {
	$cur_season = "Summer";
	$cur_pointer = 2;
} elseif (($julian_day >= 201) AND ($julian_day < 263)) {
	$cur_season = "Fall";
	$cur_pointer = 0;
} else {
	$cur_season = "Spring";
	$cur_pointer = 1;
}
$seasons = array("Fall","Spring","Summer","Fall","Spring","Summer","Fall","Spring");
for ($i=0; $i <= 5; $i++) {
	if (($seasons[$i+$cur_pointer] == "Spring") AND ($i != 0)) {
		$temp_yr++;
	}
	$temp_season = $seasons[$i+$cur_pointer] . " " . $temp_yr;
	echo "<option value=\"" . $temp_season . "\">" . $temp_season . "</option>";
}
?>
</select></td>
</tr>
<tr>
<td>Units Enrolled</td>
<td><input tabindex="11" type="text" maxlength="4" placeholder="0" size="3" name="units" /></td>
</tr>
<tr>
<td>Anticipated Graduation Date<span class="required">*</span></td>
<td><select tabindex="12" name="graddate" size="1">
<option selected="selected" value="Not selected">Select Anticipated Graduation Date</option><?php 
for ($i=$cur_yr; $i <= $cur_yr + 7; $i++) {
	echo "<option value=\"" . $i . "\">" . $i . "</option>";
}
?>
</select></td>
</tr>
</tbody>
</table>
<br />
<table class="tableborders" border="0">
<tbody>
<tr><th colspan="2">Employee Information</th></tr>
<tr>
<td>Last Name<span class="required">*</span></td>
<td><input tabindex="14" type="text" maxlength="30" placeholder="Last Name" required="" size="30" name="emplastname" /></td>
</tr>
<tr>
<td>First Name<span class="required">*</span></td>
<td><input tabindex="15" type="text" maxlength="30" placeholder="First Name" required="" size="30" name="empfirstname" /></td>
</tr>
<tr>
<td>E-mail Address<span class="required">*</span></td>
<td><input tabindex="16" type="email" maxlength="100" placeholder="Email" required="" size="30" name="empemail" /></td>
</tr>
<tr>
<td>Campus-wide ID (CWID)<span class="required">*</span><br /> <span class="small"><em>(no dashes)</em></span></td>
<td><input tabindex="17" type="number" maxlength="9" placeholder="CWID" required="" size="9" name="empcwid" /></td>
</tr>
<tr>
<td>Department<span class="required">*</span></td>
<td><input tabindex="18" type="text" maxlength="200" placeholder="Department" required="" size="30" name="department" /></td>
</tr>
<tr>
<td>Supervisor Name<span class="required">*</span></td>
<td><input tabindex="18" type="text" maxlength="200" placeholder="Supervisor Name" required="" size="30" name="super_name" /></td>
</tr>
<tr>
<td>Supervisor Email Address<span class="required">*</span></td>
<td><input tabindex="18" type="email" maxlength="200" placeholder="Supervisor Email" required="" size="30" name="super_email" /></td>
</tr>
<tr>
<td>Hire Date</td>
<td><select tabindex="19" name="hiredatem" size="1">
<option selected="selected" value="Not selected">MM</option><?php 
for ($i=1; $i <= 12; $i++) {
	if ($i < 10) {
		$mon = "0" . $i;
	} else {
		$mon = $i;
	}
	echo "<option value=\"" . $mon . "\">" . $mon . "</option>";
}
?>
</select><select tabindex="20" name="hiredatey" size="1">
<option selected="selected" value="Not selected">YYYY</option><?php 
for ($i=1960; $i <= $cur_yr; $i++) {
	echo "<option value=\"" . $i . "\">" . $i . "</option>";
}
?>
</select></td>
</tr>
<tr>
<td>Comments or Special Circumstances</td>
<td><textarea tabindex="21" name="comments" rows="5" cols="26"></textarea></td>
</tr>
</tbody>
</table>
<fieldset><legend>For your protection</legend>
	<div class="g-recaptcha" data-sitekey="hjkfhguyfglijg868jmhjg;og"></div>
<table class="small" style="margin-left: 0px;">
<tbody>
<tr>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
</fieldset>
<p>By submitting this form .....</p>
<p><span class="small">Please click on the 'Submit' button only once and wait for the confirmation page. This will ensure that this form was successfully sent and will prevent duplicate copies.</span></p>
<p><input tabindex="37" type="submit" value="Submit" name="submit" /> <input tabindex="38" type="reset" value="Reset" name="reset" /></p>
<input type="hidden" value="true" name="beensubmitted" />
</form>