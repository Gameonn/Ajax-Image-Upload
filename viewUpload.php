<html>
<head>
<title>PHP AJAX Image Upload</title>
<!-- <link href="styles.css" rel="stylesheet" type="text/css" /> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style type="text/css">
	.form-group {
    margin: 15px;
}
</style>
<script type="text/javascript">
$(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			$("#targetLayer").html(data);
		    },
		  	error: function(){} 	        
	   });
	}));

	// $('.delete').on('click',function(evt){
	// 	// evt.preventDefault();
	// 	alert('hi');
	// 	$.ajax({
	// 	  	url: "upload.php",
	// 		type: "POST",
	// 		case: "delete" 		
	// 	});
	// });
});
</script>
</head>
<body>
<div class="bgColor">
<form id="uploadForm" action="upload.php" method="post">
<div class="form-group">
<input name="first_name" placeholder="first name" value="" type="text" class="form-control" /><br>
<input name="last_name" value="" placeholder="last name" type="text" class="form-control" /><br>
<input name="email" value="" placeholder="email" type="email" class="form-control" /><br>
<input name="gender" value="" placeholder="gender" type="text" class="form-control" /><br>
<input name="phone" value="" placeholder="phone" type="number" class="form-control" /><br>
<div id="targetLayer">No Image</div>
<div id="uploadFormLayer">
<label>Upload Image File:</label><br/>
<input name="userImage" type="file" class="inputfile" />
<input type="submit" value="Submit" class="btn btn-sm btn-default" />
<input type="reset" value="Delete" class="delete btn btn-sm btn-primary">
</div>
</form>
</div>
</div>
</body>
</html>