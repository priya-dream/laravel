<html>
<head>
<style>
.mmm{
	display:none;
    }
    </style>
</head>
<body>
<button class="button" data-id="111">Clicked button ONE</button><br /><br />
<button class="button" data-id="222" >Clicked button TWO</button><br /><br />
<button class="button" data-id="333">Clicked button THREE</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(".button").click(function() {
  alert($(this).data("id"));
});
</script>
</body>
</html>