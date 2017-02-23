
<script type="text/javascript">

function submit_search(obj) {
	var txtSearch = obj.find('.txt_search_primary');
	//console.log(txtSearch.val());
	//.replace(/\s+/g,"+");
	
	location.href = url +'san-pham/&keyword='+txtSearch.val().replace(/\s+/g,"+");
	return false;
}
		
</script>
<div class="search_main">
	<form id="formSeach" method="" onsubmit="return submit_search($(this))">
		<input type="text" placeholder="tìm kiếm..." value="{$smarty.get.keyword}" class="txt_search txt_search_primary" />
	</form>
</div>