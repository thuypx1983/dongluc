<div id="menu-left">
  <div id="navigationMenu" >
{foreach from=$menu_hoz item=row key=k}
	{if isset($row.link_to)}{$menu_com=$row.link_to}{else}{$menu_com=$row.link}{/if}
	
	<h3 {if !$row.sub}class="single-menu-item"{/if}>
		<a href="{if $row.link_to!=''}{$row.link_to}{else}{$url}{$row.link}{if $k>0}/{/if}{/if}">
			{$row.title}
		</a>
	</h3>
	{if $row.sub}
    <div>
      <ul>
		{foreach from=$row.sub item=r}
        <li><a href="{if $r.link_to!=''}{$r.link_to}{else}{$url}{$r.pre_link}-{$r.id}/{/if}">{$r.title}</a>
          <div class="clear"></div>
        </li>
		{/foreach}
      </ul>
    </div>
	{else}
	<div class="single-menu-container"> </div>
	{/if}
	
{/foreach}
	</div>
</div>

{*

<div id="menu-left">
  <div id="navigationMenu" >
    <h3 class="single-menu-item"> <a href="">
      <div class="icon-home"></div>
      Trang chủ </a> </h3>
    <div class="single-menu-container"> </div>
    <h3> <a href="{$url}dantri/">Giới thiệu PLC</a></h3>
    <div>
      <ul>
        <li><a href="#1">Giới thiệu giáo viên</a>
          <div class="clear"></div>
        </li>
        <li><a href="#2">Giới thiệu học viên</a>
          <div class="clear"></div>
        </li>
        <li ><a href="#3">Giới thiệu lớp học</a>
          <div class="clear"></div>
        </li>
        <li class="last"><a href="#4">Hoạt động ngoại khóa</a>
          <div class="clear"></div>
        </li>
      </ul>
    </div>
    <h3>
      <div style="height:100%;width:2px;background:#fff"></div>
      <a href="#">Khóa học tiếng Nhật</a></h3>
    <div>
      <ul>
        <li><a href="#1">Lịch khai giảng</a>
          <div class="clear"></div>
        </li>
        <li><a href="#2">Khóa tiếng Nhật trẻ em</a>
          <div class="clear"></div>
        </li>
        <li ><a href="#3">Khóa tiếng Nhật doanh nghiệp</a>
          <div class="clear"></div>
        </li>
        <li ><a href="#3">Khóa kỹ năng giảng dạy</a>
          <div class="clear"></div>
        </li>
        <li><a href="#3">Khóa hội thoại tiếng Nhật</a>
          <div class="clear"></div>
        </li>
        <li ><a href="#3">Khóa tiếng Nhật chuyên sâu</a>
          <div class="clear"></div>
        </li>
        <li><a href="#3">Khóa tiếng Nhật sở thích</a>
          <div class="clear"></div>
        </li>
        <li ><a href="#3">Khóa luyện thi JLPT</a>
          <div class="clear"></div>
        </li>
        <li class="last"><a href="#3">Khóa tiếng Nhật du học NAC</a>
          <div class="clear"></div>
        </li>
      </ul>
    </div>
    <h3>
      <div style="height:100%;width:2px;background:#fff"></div>
      <a href="#">Du học Nhật Bản</a></h3>
    <div>
      <ul>
        <li><a href="#1">Tuyển sinh du học</a>
          <div class="clear"></div>
        </li>
        <li><a href="#2">Thông tin du học</a>
          <div class="clear"></div>
        </li>
        <li><a href="#3">Trường Nhật ngữ </a>
          <div class="clear"></div>
        </li>
        <li><a href="#1">Trường chuyên ngành </a>
          <div class="clear"></div>
        </li>
        <li><a href="#2">Đại học - Cao đẳng</a>
          <div class="clear"></div>
        </li>
        <li class="last"><a href="#3">Cao học </a>
          <div class="clear"></div>
        </li>
      </ul>
    </div>
    <h3>
      <div style="height:100%;width:2px;background:#fff"></div>
      <a href="#">Doanh nghiệp</a></h3>
    <div>
      <ul>
        <li><a href="#1">企業内日本語教育・ビジネスマナー</a>
          <div class="clear"></div>
        </li>
        <li><a href="#2">日本から実習生を受け入れたい方へ</a>
          <div class="clear"></div>
        </li>
        <li class="last"><a href="#3">日本から直接優秀な人材を雇用したい方へ </a>
          <div class="clear"></div>
        </li>
      </ul>
    </div>
    <h3>
      <div style="height:100%;width:2px;background:#fff"></div>
      <a href="#">Khám phá Nhật Bản</a></h3>
    <div>
      <ul>
        <li><a href="#1">Thông tin Nhật Bản </a>
          <div class="clear"></div>
        </li>
        <li><a href="#2">Du lịch Nhật Bản</a>
          <div class="clear"></div>
        </li>
        <li class="last"><a href="#3">Văn hóa Nhật Bản</a>
          <div class="clear"></div>
        </li>
      </ul>
    </div>
    <h3 class="single-menu-item"> <a href="">
      <div class="icon-home"></div>
      Tài liệu tiếng Nhật </a> </h3>
    <div class="single-menu-container"> </div>
    <h3>
      <div style="height:100%;width:2px;background:#fff"></div>
      <a href="#">Gallery</a></h3>
    <div>
      <ul>
        <li><a href="#1">Thư viện ảnh</a>
          <div class="clear"></div>
        </li>
        <li class="last"><a href="#2">Thư viện video</a>
          <div class="clear"></div>
        </li>
      </ul>
    </div>
    <h3 class="single-menu-item"> <a href="">
      <div class="icon-home"></div>
      Liên hệ </a> </h3>
    <div class="single-menu-container"> </div>
  </div>
</div>

*}