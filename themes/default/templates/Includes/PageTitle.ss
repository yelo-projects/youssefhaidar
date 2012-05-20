<% if URLSegment = home %>
$SiteConfig.Title
<% else %>
<% if MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> | $SiteConfig.Title
<% end_if %>
