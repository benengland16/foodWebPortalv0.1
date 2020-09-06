<?php 


include(base_path()."/resources/views/routeNames/routesCommon.blade.php");
//$routeCreateAPIContents=session()->get('route_name').".Create.Api.Contents.index";

$routeUserIndex=session()->get('route_name').".user.index";
$routeUserCreate=session()->get('route_name').".user.create";
$routeUserStore=session()->get('route_name').".user.store";
$routeUserDelete=session()->get('route_name').".user.delete";

$routeRecipeIndex=session()->get('route_name').".recipe.index";

$routeCompanyIndex=session()->get('route_name').".company.index";

$routeCompanyRecipeIndex=session()->get('route_name').".companyRecipe.index";
$routeCompanyRecipeDelete=session()->get('route_name').".companyRecipe.delete";



?>