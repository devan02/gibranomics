<?php
	$session = $this->session->userdata('transisi');
    $id = $session['id'];

    // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // $charactersLength = strlen($characters);
    // $randomString = '';
    // for ($i = 0; $i < 15; $i++) {
    //     $randomString .= $characters[random_int(0, $charactersLength - 1)];
    // }

    $db = new mysqli("localhost", "root", "", "transisi_bersih");

    // Check for errors
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
	}

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $qry = $db->query($sql);

    $fullname = "";
    $level = "";

    if($qry){
    	while ($row = $qry->fetch_object()) {
    		$fullname = $row->fullname;
    		$level = $row->level;
    	}
    }
?>