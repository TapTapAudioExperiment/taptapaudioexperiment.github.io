<?php
//index.php

$error = '';
$req1 = '';
$req2 = '';
$req3 = '';
$req4 = '';
$req5 = '';
$req6= '';
$req7 = '';
$req8 = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
	if(empty($_POST["req1"]) || !preg_match("Yes",$req1) || !preg_match("yes",$req1)))
	{
		$error .= '<p><label class="text-danger">Please ensure that you are sitting in a quite environment where there is no other sound playing and no background noises</label></p>';
	}
	
	if(empty($_POST["req2"]) || !preg_match("Yes",$req2) || !preg_match("yes",$req2)))
	{
		$error .= '<p><label class="text-danger">Please ensure that you know where your mic is</label></p>';
	}

	if(empty($_POST["req3"]) || !preg_match("Yes",$req3) || !preg_match("yes",$req3)))
	{
		$error .= '<p><label class="text-danger">Please ensure that you have agreed to allow access to your mic when prompted</label></p>';
	}
	if(empty($_POST["req4"]) || !preg_match("Yes",$req4) || !preg_match("yes",$req4)))
	{
		$error .= '<p><label class="text-danger">Please ensure that you have turned off any machines such as fans or air conditioners that may contribute to background noise</label></p>';
	}
	if(empty($_POST["req5"]) || !preg_match("Yes",$req5) || !preg_match("yes",$req5)))
	{
		$error .= '<p><label class="text-danger">Please ensure that you have agreed that once set up will not change any settings on your computer to ensure a consistent recording</label></p>';
	}
	if(empty($_POST["req6"]) || !preg_match("Yes",$req6) || !preg_match("yes",$req6)))
	{
		$error .= '<p><label class="text-danger">Please ensure that you have told everyone around you to be quite</label></p>';
	}
	if(empty($_POST["req7"]) || !preg_match("Yes",$req7) || !preg_match("yes",$req7)))
	{
		$error .= '<p><label class="text-danger">Please ensure that you have made sure that no other audio/sound is playing from the device you are on</label></p>';
	}
	if(empty($_POST["req8"]) || !preg_match("Yes",$req8) || !preg_match("yes",$req8)))
	{
		$error .= '<p><label class="text-danger">Please ensure that you are using an compatible browser for this experiment</label></p>';
	}
	if($error == '')
	{
		$file_open = fopen("contact_data.csv", "a");
		$no_rows = count(file("contact_data.csv"));
		if($no_rows > 1)
		{
			$no_rows = ($no_rows - 1) + 1;
		}
		$form_data = array(
			'sr_no'		=>	$no_rows,
			'sitting_quiet_env'		=>	$req1,
			'know_mic'		=>	$req2,
			'can_access_mic'	=>	$req3,
			'turned_off_background_machines'	=>	$req4
			'consisten_rec'	=>	$req5
			'everyone_quiet'	=>	$req6
			'no_other_audio_playing'	=>	$req7
			'compatible_browser'	=>	$req8

		);
		fputcsv($file_open, $form_data);
		$error = '<label class="text-success">Thank you! You are ready to proceeds</label>';
		$name = '';
		$email = '';
		$subject = '';
		$message = '';
	}
}

?>
