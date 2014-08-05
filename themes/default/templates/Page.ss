<!DOCTYPE html>
<html lang="$ContentLocale">
<head>
	<% base_tag %>
	<title>
	<% include PageTitle %>
	</title>
	<% include Head %>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
	<!--<link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<% require css(themes/default/css/styles.css) %>
</head>
<body class="typography $ClassName" id="Page-{$URLSegment}">
<div id="Wrapper" class='js-hide'>
<div id="Main">

<% if SiteState = normal %>
<div id="Navigation">
<% include Menu %>
<div class="clear"></div>
</div>
<% end_if %>
		
<div id="Header">
	<% include Header %>
	<div class="clear"></div>
</div>


<div id="Content" class="$NiceClassName">
<% if SiteState = maintenance %>
$SiteConfig.MaintenanceMode
<% else %>
$Layout
<% end_if %>
<div class="clear"></div>
</div>

<div id="Footer">
<% include Footer %>
<div class="clear"></div>
</div>

<div class="clear"></div>
</div>
</div>
</body>
</html>
