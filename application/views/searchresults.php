<body>
 <div id="container">
  <div id="body">
	<?php
	foreach($results as $data) {
	    echo $data->location . "	-	 " . $data->contract_type . "<br>";
	}
	?>
   <p><?php echo $links; ?></p>
  </div>
 </div>
</body>