{loadModule mod=header}
{if $smarty.get.mod!=''}
	{loadModule mod=$smarty.get.mod task=$smarty.get.task}
{else}
	{loadModule mod=home}
{/if}
{loadModule mod=footer}