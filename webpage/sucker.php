<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['name']) && isset($_POST['section']) && isset($_POST['credit']) && $_POST['crnum']){
        $name = $_POST['name'];
        $section = $_POST['section'];
        $credit = $_POST['credit'];
        $crnum = $_POST['crnum'];
        if(!empty($name) && !empty($section) && !empty($credit) && !empty($crnum)){
            $file = 'suckers.txt';
            $current = file_get_contents($file);
            $textToWrite = $name.";".$section.";".$crnum.";".$credit;
            $current .= $textToWrite."\n";
            file_put_contents($file,$current);
            $current = file_get_contents($file);
        }else{
            $notfull = true;
        }
    }else{
        $notfull = true;
    }
}else{
    die('Method not allowed');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
        <?php if(!$notfull){ ?>
            <h1>Thanks, sucker!</h1>
            <p>
                Your information has been recorded.
            </p>	
            <hr />	
        <?php }else{ ?>
                <center><h1>Sorry</h1></center>
        <?php } ?>

        <?php if(!$notfull){ ?>
			<dl>
				<dt>Name</dt>
				<dd>
                    <?php echo $_POST['name']; ?>
				</dd>
				
				<dt>Section</dt>
				<dd>
                    <?php echo $_POST['section']; ?>
				</dd>
				
				<dt>Credit Card</dt>
				<dd>
                    <?php 
                        echo $_POST['crnum']."(".$_POST['credit'].")"; 
                    ?>
				</dd>
			</dl>
		
            <p>Here are all the suckers who submitted here:</p>
            <pre>
                <?php echo $current; ?>
            </pre>
        <?php }else{ ?>
            <p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
        <?php } ?>
	</body>
</html>