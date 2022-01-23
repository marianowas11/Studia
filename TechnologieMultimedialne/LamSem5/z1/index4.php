<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="pl">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Jackowski</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
	<style type="text/css" class="init"></style>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>  
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
		
<script type="text/javascript">
function ToggleLayer1() 
{ var x = document.getElementById('layer1');if (x.style.visibility === 'hidden') { x.style.visibility = 'visible'; } else { x.style.visibility = 'hidden'; }}
function ToggleLayer2() 
{ var x = document.getElementById('layer2');if (x.style.visibility === 'hidden') { x.style.visibility = 'visible'; } else { x.style.visibility = 'hidden'; }}
function ToggleLayer3() 
{ var x = document.getElementById('layer3');if (x.style.visibility === 'hidden') { x.style.visibility = 'visible'; } else { x.style.visibility = 'hidden'; }}
function ToggleLayer4() 
{ var x = document.getElementById('layer4');if (x.style.visibility === 'hidden') { x.style.visibility = 'visible'; } else { x.style.visibility = 'hidden'; }}
function ToggleLayer5() 
{ var x = document.getElementById('layer5');if (x.style.visibility === 'hidden') { x.style.visibility = 'visible'; } else { x.style.visibility = 'hidden'; }}
</script>
</head>

<body>
    <div id="layer1" style="position:absolute;width:100px;height:100px;background-color:yellow;left:50px;top:250px;visibility:visible;">
    </div>
    <div id="layer2" style="position:absolute;width:100px;height:100px;background-color:red;left:150px;top:250px;visibility:visible;">
    </div>
    <div id="layer3" style="position:absolute;width:100px;height:100px;background-color:blue;left:250px;top:250px;visibility:visible;">
    </div>
    <div id="layer4" style="position:absolute;width:100px;height:100px;background-color:brown;left:350px;top:250px;visibility:visible;">
    </div>
	<div id="layer5" style="position:absolute;width:100px;height:100px;background-color:green;left:450px;top:250px;visibility:visible;">
    </div>

    <div>
	<input type="checkbox" class="btn-check" id="btn-check-outlined1" autocomplete="off" onclick="ToggleLayer1()";>
	<label class="btn btn-outline-primary" for="btn-check-outlined1">Layer 1</label>
	<input type="checkbox" class="btn-check" id="btn-check-outlined2" autocomplete="off" onclick="ToggleLayer2()";>
	<label class="btn btn-outline-primary" for="btn-check-outlined2">Layer 2</label>
	<input type="checkbox" class="btn-check" id="btn-check-outlined3" autocomplete="off" onclick="ToggleLayer3()";>
	<label class="btn btn-outline-primary" for="btn-check-outlined3">Layer 3</label>
	<input type="checkbox" class="btn-check" id="btn-check-outlined4" autocomplete="off" onclick="ToggleLayer4()";>
	<label class="btn btn-outline-primary" for="btn-check-outlined4">Layer 4</label>
	<input type="checkbox" class="btn-check" id="btn-check-outlined5" autocomplete="off" onclick="ToggleLayer5()";>
	<label class="btn btn-outline-primary" for="btn-check-outlined5">Layer 5</label>
    </div>
</body>
</html>
