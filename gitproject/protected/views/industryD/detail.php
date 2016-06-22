 <div class="container">
 
	<h2 class="alert alert-info" align="center">ความร่วมมือด้านการส่งกำลังบำรุง</h2>
	<div class="row well">
  
	<div class="alert alert-info">
	<img class="img-thumbnail"  alt="<?php echo $model->picture; ?>" src="<?php echo $picture;?>">
	<?php echo $model->countryname_th;?>
	</div>

	<?php 
	//echo "<pre>";
	//	var_dump($cotypes);
		foreach ( $cotypes as $key => $value ) {
			$cotypename=($value->cotypename);
			$cotypeid= $value->idcotype;
			?>
			<div class="alert alert-info">
			<h4><?=$cotypename;?></h4>
			<ul>
	<?php