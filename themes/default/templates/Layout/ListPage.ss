<h1>$Title</h1>
$Content
<% if AttachedChildren %>
<div class="itemsList $attachedTitleAtt" id="ItemList">
<% control AttachedChildren %>
<div class="item $firstLast $NiceClassName" id="item-$pos">
	<a class="{$NiceClassName}-head itemHead" href="<% if URL %>$URL<% else %>#item-$pos<% end_if %>">
		<% if DateStarted %><span class="Date">$DateStarted.Year</span>
		<% else %>
		<% if Date %><span class="Date">$Date</span><% end_if %>
		<% end_if %>
		<% if URL %>
			<% if Text %><span class="Text Title">$Text</span><% end_if %>
		<% else %>
				<% if Title %><span class="Title">$Title</span><% end_if %>
		<% end_if %>
		<% if CategoryStr %><span class="Category">$CategoryStr</span><% end_if %>
	</a>
	<% if URL %>
		<span class="URL">
			$LinkURL<a href="$URL" class="$HTMLClasses text-url" target="_blank">$Description</a>
		</span>
	<% else %>
	<div class="{$NiceClassName}-body itemBody">
	<% if Images %>
		<div class="Images">
			<div class="ImagesContainer"><div class="ImagesRow">
		<% control Images %>
		<div class="Image $firstLast" id="image-$ID">
			<a name="image-anchor-$ID"></a>
			<div class="image-placeholder" data-rel="$SetHeight(250).URL"></div>
		</div>
		<% end_control %>
</div></div>
			<div class="ImagesThumbnails">
			<% control Images %>
				<a href="#image-anchor-$ID" class="link $firstLast" data-rel="#image-$ID" id="image-$ID">$SetWidth(50)</a>
			<% end_control %>
		</div>
		</div>
	<% end_if %>

	<div class="info">
	<% if Date %><div class="Date"><span class="title">Time</span><span class="value">$Date</span></div><% end_if %>
	<% if StatusStr %><div class="Status"><span class="title">Status</span><span class="value">$StatusStr</span></div><% end_if %>
	<% if CategoryStr %><div class="Category"><span class="title">Category</span><span class="value">$CategoryStr</span></div><% end_if %>
	<% if Location %><div class="Location"><span class="title">Location</span><span class="value">$Location</span></div><% end_if %>
	<% if Client %><div class="Client"><span class="title">Client</span><span class="value">$Client</span></div><% end_if %>
	</div>
	<% if Image %>
		<div class="Image">$Image.SetWidth(500)
		<% if Description %><div class="Description">$Description</div><% end_if %>
		<% if Document %><a class="Document" href="$Document.URL">Download this file</a><% end_if %>
		</div>
	<% else %>

	<% end_if %>
	<% if Description %><div class="Description">$Description</div><% end_if %>
	</div>
	<a href="#ItemList" class="close">X</a>
	<% end_if %>
</div>
<% end_control %>
</div>
<% end_if %>
$Form
