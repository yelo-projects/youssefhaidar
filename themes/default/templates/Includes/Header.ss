<% control SiteConfig %>
	<% if HeaderImage %>
		<a href="{$BaseHref}" title="$SiteConfig.Title" class="logo">$HeaderImage.setWidth(400)</a>
	<% else %>
		<span id="SiteTitle" align="justify">$Title</span>
		<span id="SiteTagLine" align="justify">$Tagline</span>
	<% end_if %>
<% end_control %>
