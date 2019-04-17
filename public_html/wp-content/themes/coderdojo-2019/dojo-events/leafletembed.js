var map;
var ajaxRequest;
var plotlist;
var plotlayers=[];

function initmap() {
	// set up the map
	map = new L.Map('dojoevent_map');

	// create the tile layer with correct attribution
	var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	var osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
	var osm = new L.TileLayer(osmUrl, {minZoom: 8, attribution: osmAttrib});		
	var marker = L.marker([dojoevent_map.lat, dojoevent_map.lon]).addTo(map);

	// start the map in South-East England
	map.setView(new L.LatLng(dojoevent_map.lat, dojoevent_map.lon),14);
	map.addLayer(osm);
}
