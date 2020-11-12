<?php
use approot\classes\Sanitize;

//$h1 = Sanitize::html("Task Book");

$this->lang = "en";
$this->title = "List tasks";

$approot = \approot\App::getAppRoot();

// Adding <script> as link in layout
//$link_js = "/media/js/link.js";
//$this->addScriptBody('<script src="'.$link_js.'"></script>');
?>


<div class="view_index__con">
	<div class="view_index__con-2">

	    <?php
	    // Left side
	    require __DIR__ . './index/left.php';
	    ?>

	    <?php
	    // Right side
	    require __DIR__ . './index/right.php';
	    ?>

	</div>
</div>


