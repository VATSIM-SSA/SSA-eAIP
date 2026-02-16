# Getting Started 

We have created a helpful user guide below in order to streamline our contributor onboarding process.

Please follow each step carefully to ensure your first Pull Request is succesful.

## What is a Ground Layout
A ground layout refers to a **ground radar layout** used for airports with ground radar installed for the purpose of visualising aircraft positions. VATSSA models our ground layouts to reflect real-life radar screens across the entirety of the VATSIM Sub-Saharan Africa Division. 

## Our Ground Layouts
Ground Layouts across VATSSA are made using the GroundRadar and TopSky plugins for EuroScope. The best way to learn it is by using examples provided on the Aerodrome Formats page for both TopSky and Euroscope found [here](https://eaip2.vatssa.com/Contributing/Sector%20Files/Aerodrome%20Formats/Overview/).

In addition you can view the [TopSky Documentation](https://forum.vatsim-scandinavia.org/d/258-topsky-plugin-26-beta-2) and [GroundRadar Documentation](https://forum.vatsim-scandinavia.org/d/256-ground-radar-plugin-16-beta-5) at their respective links. To access these, you will need to create a VATSCA forums account (you can do this by linking your VATSIM account) and download the plugins, in which a `Documentation` folder exists in the zipped archive which has all relevant documentation.

## Github Setup

- Our Sector Files are divided across 26 sectors, which cover all the airports in VATSSA airspace.

- The links to the repository of each Sector File can be found in the Overview repository [here](https://github.com/VATSIM-SSA/sectorfile-overview)

- It is a good idea to have a look through the different folders and familiarize yourself with the layout of each Sector File, primarily looking at the `Plugins/TopSky` and `Plugins/GroundRadar` folders. 

- Now we are going to "fork" the Sector File. Forking allows us to edit our own copy of the Sector File without changing anything on the main Sector File.

![Forking](Github-Fork.png)

- Now that you have created your own repository, we can start to make edits.

- Head back to the Github home page, and you should see your fork of the eAIP. We call this a "repository."

![Repository menu](Repository.png)

- Now we can head over to our repository and start making changes.

## QGIS Setup
- Download QGIS from [here](https://qgis.org)

- Get the [Aerodrome utilities](https://plugins.qgis.org/plugins/widen-line-qgis-plugin/) and [QuickOSM](https://plugins.qgis.org/plugins/QuickOSM/) via the link or via the plugin manager at `Plugins > Manage and Install Plugins > Not Installed` and searching for `Aerodrome Utilities` and `QuickOSM`

![Plugin Manager Not Installed Menu](Plugin-Manager-Not-Installed.png)

- [AerodromeUtilities](https://github.com/BrakingChanges/widen-line-qgis-plugin/) is the main plugin that will be used to manipulate and export aerodrome data to TopSky and EuroScope so that we can compile a ground layout in EuroScope.

- [QuickOSM](https://github.com/QuickOSM/QuickOSM) is a plugin that helps to simplify queries for OpenStreetMap data on the backend and get data faster.


## QGIS Initial Setup
- In the browser, drag in the OpenStreetMaps background layer via `XYZ Tiles > OpenStreetMaps`.

![OpenStreetMap Canvas](OpenStreetMap-Canvas.png)

- Before creating the layouts I would recommend you create a folder where we will store all the saved files for our aerodrome.

## Importing Airport Data
- OpenStreetMap will be our primary source of airport data, together with satellite scenery further on.

- This process uses OpenStreetMap together with the aforementioned QuickOSM plugin to get airport data bundled together by OSM contributors into our workspace so that we can manipulate this data and get what we need for GroundRadar and TopSky.

- Change the CRS to `ESPG:4326` by clicking the projection symbol (globe and plane) on the bottom right.

![Projection Panel](Projection-Menu.png)

- This will open up a panel where you can apply `ESPG:4326`. **Without this, you will get weird timeout errors**.

![ESPG 4326](ESPG-4326.png)

- To import airport data bring up the processing toolbox by clicking on the gear icon on the top toolbar or by pressing `Alt+T`. 
  
![Processing Toolbox](Processing-Toolbox.png)

- Scroll to Aerodrome Utilities and select `Fetch OSM Data`.

![Fetch OSM Data](Fetch-OSM-Data.png)

- Double click to open; a prompt will show up, this is what we call an algorithm.

- A few parameters are to be entered, mainly:

- ICAO code: The **ICAO** of the airport to fetch

- Automatically widen taxiways: Leave **unchecked** unless all the taxiways in your specified aerodrome are of a fixed taxiway width
- Automatically dissolved widened taxiways: Leave as-is.

- Keep Original Line as Centerline: Leave as-is.


- Color Profile (optional) - These are not necessary however are useful for accelerating airport development. A color scheme for FASA has been uploaded [here](colors-FASA.json). More color profiles can be uploaded later on. You can add that file.

- Split Taxiways Output Directory: Leave as-is.
- Output Directory: set the output directory to the folder you created for that specific airport.

- Clicking run will execute the algorithm and will start the automatic data fetch to get all the airport data for OpenStreetMap.

**NOTE: OSM servers are in high demand so you may be timed out from time-to-time, to fix this, click on the QuickOSM icon (looks like a search icon on the toolbar) and go to `Parameters` and change the Overpass API URL to change the server.**

![Fetch OSM Data](Fetch-OSM-Data-Window.png)
![Initial Airport Layout](Fetch-OSM-Completed.png)

## Filtering Layers
- You can identify the layers toolbar on the bottom-left side of the screen.

![Layers Panel](Layers-Panel.png)

- To delete layers: you can either `Right-click > Remove Layer` or by clicking the remove layer icon in the layers toolbar.

- You can also use shift to select multiple layers.

![Delete Layers](Delete-Layers.png)

- Delete the following layers, if they are present:
- `017_tower_POINT`
- `016_windsock_POINT`
- `015_navigationaid_POINT`
- `008_gate_POINT`
- `004_taxiway_POINT`
- `002_apron_POINT`
- `001_aeroway_aerodrome_points`

- To hide a layer, click the eye icon next to the layer:

![Hiding Layers](Hide-Layer.png)

- Hide the following layers, if they are present:
- `012_holding_position_POINT` (maybe helpful later when adding stop bars)
- `006_parking_position_POINT` (maybe useful for stands)

## Widening Taxiways and Runways

- When data is imported using OpenStreetMap, the runways and taxiways are often depicted by their centerlines.

- However, we need to the full taxiway and runway polygon.

- The first thing we need to do here, is to add a satellite map layer, either Bing or Google Maps.

- Scroll in the browser, right above the layers panel till you see XYZ Tiles

![XYZ Tiles](XYZ-Tiles.png)

- Create a new connection by `Right-click > New Connection` which we will show a prompt to add a new connection source for XYZ Tiles

- XYZ Tiles are essentially what will be used to render the satellite map at different zoom levels, providing the greatest level of accuracy.

![New XYZ Connection](New-XYZ-Connection.png)

- Name the connection any suitable name

- Change the URL to
  * Google: https://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}
  * Bing: http://ecn.t\3.tiles.virtualearth.net/tiles/a{q}.jpeg?g=1

- No other settings need to be changed.

- Click Ok to establish the new XYZ connection.

- Drag an satellite XYZ layer ie Google Maps down, above the OpenStreetMap layer.

- The canvas will change to a satellite map.

![Satellite Canvas Map](Satellite-Map-Canvas.png)

## Exportation
- Shift-click everything except the hidden map layer else and create a group named after your ICAO.
- Move back to the processing toolbox and select `Convert GeoJSON to TS/GR`
- You will see a panel with ICAO code input, multi map and output directory.
- For simplicity's sake, we will export to GroundRadar
- Leave Multi Map unchecked, and enter the ICAO code and the output directory we used
- Execute the algorithm
- You will find  a `GroundRadar.txt` file in that directory.