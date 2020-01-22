<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.tab-content {
			max-height: 0px;
			opacity: 0;

		}
		.current  .tab-content {
			max-height: 200px;
			opacity: 1;
			transition: opacity 2s;
		}
	</style>
</head>
<body>
<div>
	<div class="tab-item current" data-id="0">
		<div>
			<span>icon</span>
			<h3>question</h3>
		</div>
		<div class="tab-content">
			<p>text here</p>
		</div>
	</div>
	<div class="tab-item" data-id="1">
		<div>
			<span>icon</span>
			<h3>question</h3>
		</div>
		<div class="tab-content">
			<p>text here</p>
		</div>
	</div>
	<div class="tab-item" data-id="2">
		<div>
			<span>icon</span>
			<h3>question</h3>
		</div>
		<div class="tab-content">
			<p>text here</p>
		</div>
	</div>
	<div class="tab-item" data-id="3">
		<div>
			<span>icon</span>
			<h3>question</h3>
		</div>
		<div class="tab-content">
			<p>text here</p>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	var length = $('.tab-item').length;
	// console.log(length);
	if(length > 0){
		$('.tab-item').click(function(){
			for (var i = 0; i < length; i++) {
				$('.tab-item').eq(i).removeClass('current');
			}
			$(this).addClass('current');
			// console.log($(this));
		});
	}
	
</script>
</body>
</html>
