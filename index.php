<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>тест REST Zоmart</title>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
		  <div class="panel-heading">
				getRubric  _
				<button type="button" class="btn btn-primary" onclick="btnCat()">запрос корневых категорий </button>
				<button type="button" class="btn btn-info" onclick="btnCatDev()">запрос корневых категорий dev</button><br>
				<!--  -->
				getProducts
				<button type="button" class="btn btn-primary" onclick="btnProds()">запрос товаров категории 53 </button>
				<button type="button" class="btn btn-info" onclick="btnProdsDev()">запрос товаров категории 53 dev</button><br>
			</div>
		  <div class="panel-body">

				  <!-- <div class="col-md-9">
				    Ответ на запрос {"jsonrpc":"2.0","method":"getRubric","params":{"rubricId":-5},"id":1}; <br>
						<br>
				    <div class="head"></div>
				    <div class="body"></div>

				  </div> -->

					<!-- <div class="row">
						<div class="col-md-3 col-md-offset-1">
							Тело ответа:
						</div>
						<div class="col-md-6">
							<div class="answer"></div>
						</div>
					</div> -->

		  </div>
			</div>
		</div>
	</div>
	<script>
		function btnCat(){
			$(".panel-body").html('<div class="col-md-9">Ответ zomart.ru на запрос {"jsonrpc":"2.0","method":"getRubric","params":{"rubricId":-5},"id":1};<br><br><div class="head"></div><div class="body"></div></div>');
			$.ajax({
				url: "get.php",
				method: "POST",
				data: {
					metod: "category",
					server: "zomart"
							},
				success: function (data) {
					console.log(data);
					 var answer = JSON.parse(data);
					 $(".head").html(answer.head);
					 $(".body").html(answer.body);
    			}
			});
		}
	</script>
	<script>
		function btnCatDev(){
			$(".panel-body").html('<div class="col-md-9">Ответ dev04.zomart.ru на запрос {"jsonrpc":"2.0","method":"getRubric","params":{"rubricId":-5},"id":1};<br><br><div class="head"></div><div class="body"></div></div>');
			$.ajax({
				url: "get.php",
				method: "POST",
				data: {
					metod: "category",
					server: "dev"
							},
				success: function (data) {
					console.log(data);
					 var answer = JSON.parse(data);
					 $(".head").html(answer.head);
					 $(".body").html(answer.body);
    			}
			});
		}
	</script>
	<script>
		function btnProds(){
			$(".panel-body").html('<div class="col-md-9">Ответ zomart.ru на запрос {"jsonrpc":"2.0","method":"getProducts","params":{"rubricId":53},"id":1}<br><br><div class="head"></div><div class="body"></div></div>');
			$.ajax({
				url: "get.php",
				method: "POST",
				data: {
					metod: "Products",
					server: "zomart"
							},
				success: function (data) {
					console.log(data);
					 var answer = JSON.parse(data);
					 $(".head").html(answer.head);
					 $(".body").html(answer.body);
    			}
			});
		}
	</script>
	<script>
		function btnProdsDev(){
			$(".panel-body").html('<div class="col-md-9">Ответ dev04.zomart.ru на запрос {"jsonrpc":"2.0","method":"getProducts","params":{"rubricId":53},"id":1},"id":1};<br><br><div class="head"></div><div class="body"></div></div>');
			$.ajax({
				url: "get.php",
				method: "POST",
				data: {
					metod: "Products",
					server: "dev"
							},
				success: function (data) {
					console.log(data);
					 var answer = JSON.parse(data);
					 $(".head").html(answer.head);
					 $(".body").html(answer.body);
    			}
			});
		}
	</script>

</body>
</html>
