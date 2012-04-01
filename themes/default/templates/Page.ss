<!DOCTYPE html>
<html lang="$ContentLocale">
<head>
	<% base_tag %>
	<title>
	<% include PageTitle %>
	</title>
	<% include Head %>
	<% require css(themes/default/css/styles.css) %>
</head>
<body class="typography $ClassName" id="Page-{$URLSegment}">
<div id="Wrapper">
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
