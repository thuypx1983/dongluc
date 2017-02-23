<div style="padding: 10px;">
<p><b>View user log</b> [<a href="javascript:history.go(-1)">Go Back</a>]</p>

<table border="1" cellpadding="5">
<tr>
		<th>#</th>
		<th>Time</th>
		<th>Action</th>
</tr>

{section name=foo loop=$log}
<tr>
		<td>{$smarty.section.foo.index+1}</td>
		<td>{$log[foo].create_date}</td>
		<td>{$log[foo].action}</td>
</tr>
{sectionelse}
<tr>
		<td colspan="3">No thing</td>
</tr>		
{/section}
</table>
<p><b>View user log</b> [<a href="javascript:history.go(-1)">Go Back</a>]</p>
</div>

