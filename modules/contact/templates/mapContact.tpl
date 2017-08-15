
<div class="breakcump">
	<a href="{$url}">{#text_menu_home#} / </a>
    <a href="{$url}{$link_contact}/">{#text_menu_contact#} / </a>
    <a href="{$url}mang-luoi-phan-phoi/" class="active">Mạng lưới phân phối</a>
    <div class="clear"></div>
</div>

<div class="content_sub">
    <div class="grid220 fl">
    	{include file='menu.tpl'}
    </div>
    <div class="grid620 fr">
        <!--<div class="title_cate">{#text_menu_contact#}</div>-->
        <div class="note"><strong style="color:#C10207">Chú ý :</strong> Click chuột lên biểu tượng của Map trên bản đồ để xem thông tin chi tiết cửa hàng</div>
        
        <select class="slt_city" id="branch_change">
            {foreach from=$branch item=row}
                <option value="{$row.id}" lat="{$row.lat}" lon="{$row.lon}" zoom="12">{$row.title}</option>
            {/foreach}
        </select>
        
        <select class="slt_city" id="marker_change">
            <option value="">Tất cả</option>
            {foreach from=$marker item=mark}
                <option {if $branch[0].id != $mark.mangluoi_id} style="display:none;"{/if} value="{$mark.id}" branch="{$mark.mangluoi_id}" lat="{$mark.lat}" lon="{$mark.lon}" zoom="16">{$mark.title}</option>
            {/foreach}
        </select>
        <div class="block15"></div>
        <!--<img src="{$url}photo/map.jpg"/>-->
        <div style="border:1px solid #ccc; padding:2px; height:600px;">
            
            <!--# Map generator #-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
            <style type="text/css">
            #map-canvas { height: 100%; line-height:18px; }
			#map-canvas name { margin-bottom:6px; display:block; font-weight:bold; }
            </style>
            <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQiqmXVY4Rob-132JPV7ogova1fMq3FEo">
            </script>
            <script type="text/javascript">
            function initialize(obj, _lat, _lon, _zoom) {
                _lat = _lat != undefined ? _lat : "{$branch[0].lat}";
                _lon = _lon != undefined ? _lon : "{$branch[0].lon}";
                _zoom = _zoom != undefined ? _zoom : 12;
                var mapOptions = {
                    center: new google.maps.LatLng(parseFloat(_lat), parseFloat(_lon)),
                    zoom: parseInt(_zoom),
                };
                var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
                
                {foreach from=$marker item=row}
                
                var name = "{$row.title}";
                var facilities = '{$row.content}';
                var point = new google.maps.LatLng({$row.lat}, {$row.lon});
                var image = '{$row.photo}';
                createMarker(map, point, name, facilities, image);
                
                {/foreach}
            }
            function createMarker(map, point, name, facilities, image) {
                if (image!='')
                    icon = '{$url}upload/network/'+image;
                else
                    icon = '{$url}images/icon_logo.png';
                
                var marker = new google.maps.Marker({
                    position: point,
                    icon: icon,
                    map: map
                });
                var html = '<div style="text-align:left; width:260px; height:auto;"><p><name>'+name+"</name></p><p>"+facilities+'</p></div>';
                var infoWindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', function () {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });
                return marker;
            }
            google.maps.event.addDomListener(window, 'load', initialize);
            
            $("#branch_change").change(function(){
                obj = $(this).find(":selected");
                
                // reload option
                $("#marker_change option").each(function(){
                    if ($(this).val()!="") {
                        if ( $(this).attr("branch")==obj.val() )
                            $(this).show();
                        else
                            $(this).hide();		
                    }
                });
                $("#marker_change").val("");
                
                // reload map
                lat = obj.attr("lat");
                lon = obj.attr("lon");
                zoom = obj.attr("zoom");
                initialize(null, lat, lon, zoom);
            });
            
            $("#marker_change").change(function(){
                // reload map
                obj = $(this).find(":selected");
                
                if ( obj.val()=="" ) {
                    obj_pa = $("#branch_change").find(":selected");
                    lat = obj_pa.attr("lat");
                    lon = obj_pa.attr("lon");
                    zoom = obj_pa.attr("zoom");
                } else {
                    lat = obj.attr("lat");
                    lon = obj.attr("lon");
                    zoom = obj.attr("zoom");
                }
                initialize(null, lat, lon, zoom);
            });
            </script>
            <div id="map-canvas"></div>
            
            <!--# Map generator #-->
        </div>
	</div>
	<div class="clear"></div>
</div>