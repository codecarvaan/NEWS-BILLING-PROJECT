<html>
<head>
<meta rel="author" href="http://Crunchify.com" content="">


 
<style type="text/css">
div.panel,p.flip {
	margin: 0px;
	padding: 5px;
	text-align: center;
	background: #ddd;
	border: solid 1px #fff;
}
 
div.panel {
	widht: 50%;
	height: 100px;
	display: none;
}
</style>
</head>
 
<body>
 <p class="flip">Click here to Show/Hide Panel</p>
	<div class="panel">
		<p>This is simple jQuery Show/Hide Example by Crunchify...</p>
		<p>Click below Show/Hide again to Toggle visibility...</p>
	</div>
 
	 
<script type="text/javascript"
	src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".flip").click(function() {
			$(".panel").slideToggle("slow");
		});
	});
</script>
		

	
	
 
</body>
</html>