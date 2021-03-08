
<?php 


	include(base_path()."/resources/views/routeNames/routesCommon.blade.php"); 

	

	$routeRecipeIndex=session()->get('route_name').".recipe.index";
	$routeRecipeSelect=session()->get('route_name').".recipe.select";
	$routeCheckout=session()->get('route_name').".checkout.index";

?>