<HTML>
<HEAD>
<link rel="stylesheet" type="text/css" href="face2.css">
</HEAD>
<BODY>
background-image<br/><br/>
<div> <p>img src</p> <img src="face2.svg"/> </div>
<div> <p>php1</p> <?php echo file_get_contents("face2.svg"); ?> </div>
<div> <p>php2</p> <?php readfile("face2.svg"); ?> </div>
<div> <p>object</p> <object type="image/svg+xml" data="face2.svg"></object> </div>
<div>
<p>iframe</p>
<iframe src="face2.svg" scrolling="no" style="border:1px solid black;overflow:hidden;height:63;width:42;"></iframe>
</div>
</BODY>
</HTML>