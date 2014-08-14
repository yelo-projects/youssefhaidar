<h1>$Title</h1>
$Content
<% if AttachedChildren %>
<% if class=ProjectsListPage_Controller %>
<div id="ListHeader">
	<a href="#" data-filter="date" data-filter-group="date" class="filter date desc">Date</a><a data-filter="title" data-filter-group="" class="filter title desc active" href="#">Name</a><a data-filter="category" data-filter-group="category" href="#" class="filter category">Category</a>
</div>
<% else_if class=ArticlesListPage_Controller %>
<div id="ListHeader">
	<a href="#" data-filter="date" data-filter-group="year" class="filter date desc">Date</a><a data-filter="title" data-filter-group="" class="filter title desc active" href="#">Name</a>
</div>
<% end_if %>
<div class="itemsList $attachedTitleAtt" id="ItemsList">
<% control AttachedChildren %>
<div class="item $firstLast $NiceClassName $AdditionalClasses" id="item-$pos" data-filter-title="$Title" data-filter-date="$Date" data-filter-category="$CategoryStr" data-filter-year="$Year">
	<a class="{$NiceClassName}-head itemHead" href="<% if URL %>$URL<% else %>#item-$pos<% end_if %>">
		<% if DateStarted %><span class="Date">$DateStarted.Year</span>
		<% else %>
			<% if DateStr %><span class="Date">$DateStr</span><% end_if %>
		<% end_if %>
		<% if URL %>
			<% if Text %><span class="Text Title">$Text</span><% end_if %>
		<% else %>
				<% if Title %><span class="Title">$Title</span><% end_if %>
		<% end_if %>
		<% if CategoryStr %><span class="Category">$CategoryStr</span><% end_if %>
	</a>
	<% if URL %>
			<a href="$URL" class="$HTMLClasses text-url URL" target="_blank"><span>$Description</span></a>
	<% else %>
	<div class="{$NiceClassName}-body itemBody">
	<% if Images %>
		<div class="Images">
			<div class="ImagesContainer"><div class="ImagesRow">
		<% control Images %>
		<div class="Image $firstLast" id="image-$ID">
			<a name="image-anchor-$ID"></a>
				<% control SetHeight(350) %>
				<div class="image-placeholder" data-rel="$URL" data-rel-width="$Width" data-rel-height="$Height" style="width:{$Width}px;height:{$Height}px;"></div>
					<noscript><img src="$URL" height="$Height" width="$Width" alt="$Title"></noscript>
				<% end_control %>
		</div>
		<% end_control %>
</div></div>
			<div class="ImagesThumbnails">
			<% control Images %>
			<a href="#image-anchor-$ID" class="link $firstLast inactive" data-rel="#image-$ID" id="thumbnail-image-$ID">
				<% control SetWidth(50) %>
				<img src="$URL" width="50" height="$Height" alt="$Title" style="margin-top:{$MarginY}px;background:red;">
				<% end_control %>
			</a>
			<% end_control %>
		</div>
		</div>
	<% end_if %>

	<% if StatusStr || CategoryStr %>
	<div class="info">
	<% if Date %><div class="Date"><span class="title">Time</span><span class="value">$Date</span></div><% end_if %>
	<% if StatusStr %><div class="Status"><span class="title">Status</span><span class="value">$StatusStr</span></div><% end_if %>
	<% if CategoryStr %><div class="Category"><span class="title">Category</span><span class="value">$CategoryStr</span></div><% end_if %>
	<% if Location %><div class="Location"><span class="title">Location</span><span class="value">$Location</span></div><% end_if %>
	<% if Client %><div class="Client"><span class="title">Client</span><span class="value">$Client</span></div><% end_if %>
	</div>
	<% end_if %>
	<% if Image %>
		<div class="articleImage">
		<div class="Image">$Image.SetHeight(350)
		<% if Description %><div class="Description">$Description</div><% end_if %>
		</div>
		</div>
	<% else %>
	<% if Description %><div class="Description">$Description</div><% end_if %>
	<% end_if %>
	<% if Document %><a class="Document" href="$Document.URL">Download this Article</a><% end_if %>
	</div>
	<a href="#ItemList" class="close">X</a>
	<% end_if %>
</div>
<% end_control %>
</div>
<% end_if %>
$Form
