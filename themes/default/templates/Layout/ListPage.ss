<h1>$Title</h1>
$Content
<% if AttachedChildren %>
<div class="itemsList $attachedTitle">
<% control AttachedChildren %>
<div class="item">
	<div class="{$class}-head itemHead">
		<% if Date %><div class="Date"><span class="title">Time</span><span class="value">$Date</span></div><% end_if %>
		<% if DateStarted %><div class="DateStarted">$DateStarted</div><% end_if %>
		<% if Title %><div class="Title">$Title</div><% end_if %>
		<% if Text %><div class="Text">$Text</div><% end_if %>
		<% if Category %><div class="Category">$Category</div><% end_if %>
	</div>

	<div class="{$class}-body itemBody">
	<% if Images %>
		<div class="Images"><div class="ImagesContainer">
		<% control Images %>
		<div class="Image">$SetWidth(500)</div>
		<% end_control %>
		</div></div>
	<% end_if %>

	<% if Date %><div class="Date"><span class="title">Time</span><span class="value">$Date</span></div><% end_if %>
	<% if Status %><div class="Status"><span class="title">Status</span><span class="value">$Status</span></div><% end_if %>
	<% if Category %><div class="Category"><span class="title">Category</span><span class="value">$Category</span></div><% end_if %>
	<% if Location %><div class="Location"><span class="title"></span><span class="value">$Location</span></div><% end_if %>
	<% if Client %><div class="Client"><span class="title">Client</span><span class="value">$Client</span></div><% end_if %>

	<% if Image %>
		<div class="Image">$Image.SetWidth(500)
		<% if Description %><div class="Description">$Description</div><% end_if %>
		<% if Document %><a class="Document" href="$Document.URL">Download this file</a><% end_if %>
		</div>
	<% else %>
		<% if URL %>
		<div class="URL">{$Link}{$LinkURL}</div>
		<% else %>
			<% if Description %><div class="Description">$Description</div><% end_if %>
		<% end_if %>
	<% end_if %>
	</div>
	<a href="#" class="close">X</a>

</div>
<% end_control %>
</div>
$Form
