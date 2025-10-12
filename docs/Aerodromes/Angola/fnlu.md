# FNLU Luanda

**Quatro de Fevereiro International Airport** is the main international airport of [Angola](index.md). It is located in the southern part of the capital Luanda, situated in the Luanda Province. Quatro de Fevereiro means 4th of February, which is an important national holiday in Angola, marking the start of the armed struggle against the Portuguese colonial regime on 4 February 1961. In 2009, about 1.8 million passengers were counted.

More information available at [Wikipedia](https://en.wikipedia.org/wiki/Quatro_de_Fevereiro_Airport).

!!! warning ""

    The information contained in this platform is for flight simulation purposes only and shall not be used, under any circumstances, for real world aviation.

## Aerodrome Information

### Aerodrome Data

| Key                 | Value                                                                                                                                                       |
| ------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------- |
| ICAO                | FNLU                                                                                                                                                        |
| IATA                | LAD                                                                                                                                                         |
| Elevation           | 238 ft                                                                                                                                                      |
| Transition Altitude | 3000 ft                                                                                                                                                     |
| Transition Level    | FL45                                                                                                                                                        |
| Mag Variation       | 07º NW                                                                                                                                                      |
| Coordinate          | [08°51′30″S 13°13′52″E](https://geohack.toolforge.org/geohack.php?pagename=Quatro_de_Fevereiro_Airport&params=08_51_30_S_13_13_52_E_region:AO_type:airport) |
| Site                | [https://www.luandaairport.com/](https://www.luandaairport.com/)                                                                                            |

### Runways

| Runway | Heading | TORA (m) | TODA (m) | ASDA (m) | LDA (m) | Remarks |
| ------ | ------- | -------- | -------- | -------- | ------- | ------- |
| 05     | 053º    | 3700     | 4000     | 3760     | 3700    | -       |
| 07     | 074º    | 2489     | 3054     | 2489     | 2500    | -       |
| 23     | 233º    | 3700     | 3940     | 3700     | 3700    | -       |
| 25     | 254º    | 2489     | 2639     | 2549     | 2500    | -       |

### Aprons

| Apron    | Code | Stands   | Entry / Exit | Remarks |
| -------- | ---- | -------- | ------------ | ------- |
| Sector A | -    | A1 - A6  | Twy B        | -       |
| Sector B | -    | B1 - B8  | Twy B        | -       |
| Sector C | -    | C1 - C6  | Twy C        | -       |
| Cargo    | -    | C7 - C11 | Twy C        | -       |
| Military | -    | -        | Twy C        | -       |

### Positions & Frequencies

| Position | Callsign        | Frequency | Remarks |
| -------- | --------------- | --------- | ------- |
| FNLU_GND | Luanda Ground   | 121.900   | -       |
| FNLU_TWR | Luanda Tower    | 118.100   | -       |
| FNLU_APP | Luanda Approach | 119.100   | -       |
| FNAN_CTR | Luanda Control  | 118.500   | -       |

### Airspace

| Airspace       | Class | Owner    | Limits        | Remarks |
| -------------- | ----- | -------- | ------------- | ------- |
| Luanda CTR     | C     | FNLU_TWR | GND - A030    | -       |
| Luanda CTR     | E     | FNLU_APP | A030 - FL145  | -       |
| Luanda CTR     | A     | FNLU_APP | FL145 - FL165 | -       |
| Luanda TMA     | A     | FNAN_CTR | FL165 - UNL   | -       |
| Luanda FIR/UIR | A     | FNAN_CTR | FL245 - UNL   | -       |

## Delivery

### IFR Clearance Rules

- We have not implemented any specific IFR Clearance or Flight Plan Validation rules at this point.

- Angola Airspace operates with the following RVSM standard table of Cruising Levels.

- VFR flights are not allowed over and above the FL 150.

<!--
{%
   include-markdown "general/common/cruise-levels.md"
   heading-offset=2
%}
-->

### Departure Procedures & Initial Climbs

- FNLU does not have coded SID procedures, so, the runway heading rule will apply.

| Rwy | Heading | Initial Climb | Remarks |
| --- | ------- | ------------- | ------- |
| 05  | 053º    | FL040         | -       |
| 07  | 074º    | FL040         | -       |
| 23  | 233º    | FL120         | -       |
| 25  | 254º    | FL040         | -       |

{%
    include-markdown "phraseology/icao.md"
    start="#### Delivery Clearance"
    end="### Pushback Procedures"
%}

## Ground

### Push-back Procedures

{%
    include-markdown "../phraseology/icao.md"
    start="#### Pushback Approved"
    end="### Taxi Procedures"
%}

#### Directions

| Apron    | Type | Facing            | Remarks |
| -------- | ---- | ----------------- | ------- |
| Sector A | All  | East (Rwy 25)     | -       |
| Sector A | All  | West (Other Rwys) | -       |
| Sector B | All  | West              | -       |
| Sector C | All  | East (Rwy (23/25) | -       |
| Sector C | All  | West (Other Rwys) | -       |
| Cargo    | All  | East (Rwy (23/25) | -       |
| Cargo    | All  | West (Other Rwys) | -       |
| Military | -    | -                 | -       |

### Taxi Out Procedures

- When runway 05 is active, departing traffic shall be instructed to taxi to the runway via C, E and hold short runway 05 at E.

- When runway 23 is active, departing traffic shall be instructed to taxi to the runway via B and hold short runway 23 at B.

- When runway 07 is active, departing traffic shall be instructed to taxi to the runway via D and hold short runway 07 at D.

- When runway 25 is active, departing traffic shall be instructed to taxi to the runway via A and hold short runway 25 at A.

- Be aware that some sceneries might not have all taxiways available. Please confirm with pilots. If not available, allow pilots to backtrack the runway from any available taxiway.

#### Phraseology

{%
    include-markdown "../phraseology/icao.md"
    start="#### Taxi to HP"
    end="#### Taxi to Stand"
%}

### Taxi In Procedures

- In low traffic situations, Tower Controllers are expected to hand over arrival traffic to Ground Controllers once the traffic has vacated the runway.

- In high traffic situations, in order to maintain the high speed exits clear of traffic, Tower Controllers may issue an initial taxi instruction to arrival traffic before handover to Ground Controllers.

#### Phraseology

{%
    include-markdown "../phraseology/icao.md"
    start="#### Taxi to Stand"
    end="## Tower Operations"
%}

## Tower

### Runway Selection

- Runway 23 is the preferred active runway, up to 10 kts of tailwind.

### Runway Change Operations

- Runway changes must be coordinate with existing DEL, GND, TWR, DEP and APP controllers.
- If possible, hold aircraft on stand before a runway change operation.
- If an aircraft is already taxying on Twys B or E, offer the pilot the option to use the existing active Rwy or to enter the runway for taxiway direction change.
- If an aicraft as already passed an approach IAF fix, an APP or TWR controller should advise the pilot of the possibility of a runway change prior to the aircraft being on the final approach segment.

### Wake Separation

=== "Arrivals"

    | Lead (nm) | J   | H   | M   | L   |
    | ---- | --- | --- | --- | --- |
    | J | | | | |
    | H | 6 | 4 | | |
    | M | 7 | 5 | 5 | |
    | L | 8 | 6 | 5 | 5 |

=== "Departures"

    | Lead (min) | J   | H   | M   | L   |
    | ---- | --- | --- | --- | --- |
    | J    |     |     |     |     |
    | H    | 2   |     |     |     |
    | M    | 3   | 2   |     |     |
    | L    | 3   | 2   | 2   |     |

#### Phraseology

{{page>phraseology:icao#Takeoff Clearance}}

### Missed Approach Procedures

### HIRO

- HIRO operations are NOT possible at FNLU

### VFR Operations

- Pilots must have the latest Visual Approach Chart.

#### VFR Circuits

| Rwy | Turn  | Altitude       | Remarks |
| --- | ----- | -------------- | ------- |
| 07  | Right | Up to 1500 AGL | -       |
| 25  | Left  | Up to 1500 AGL | -       |

#### VFR Departures

#### VFR Arrivals

#### VFR Transitions

#### Visual Reference Points

### Helicopter Operations

## Departure

- FNLU doesn't have a dedicated Departure Position, with Luanda Approach (FNLU APP) assuming the role of Departure.

### Departure Procedures

- After departure, maintain aircraft on runway heading. You may issue further climb instructions (usually FL150).

### Noise Abatement Procedures

## Approach

### Arrivals Procedures

- FNLU does not have any published arrivals. Pilots should be advised to level at 3000 ft for the ILS to runway 23 (preferred landing runway).

#### Approach Procedures

| Rwy | Approach    | Frequency  | Course | GP Angle | IAF       | Platform | Remarks |
| --- | ----------- | ---------- | ------ | -------- | --------- | -------- | ------- |
| 05  | VOR DME     | 112.70 VNA | 053º   | 2.52º    | 8 DME VNA | 1700 ft  | -       |
| 23  | ILS DME     | 110.30 ILD | 233º   | 3.00º    | MANGO     | 3000 ft  | -       |
| ::: | RNAV (GNSS) | -          | 232º   | 2.86º    | G048L     | 1800 ft  | -       |
| ::: | VOR DME     | 112.70 VNA | 233º   | 2.29º    | MANGO     | 3000 ft  | -       |
| ::: | NDB         | 258 LU     | 233º   | 2.52º    | LU        | 1700 ft  | -       |

### Holds

| Name | STAR | Altitude | Speed (IAS) | Inbound CRS | Turn  | Leg Time | Remarks |
| ---- | ---- | -------- | ----------- | ----------- | ----- | -------- | ------- |
| VNA  | -    | FL040    | 230 KT      | 233º        | Left  | 1 min    | -       |
| LU   | -    | A030     | 230 KT      | 233º        | Right | 1 min    | -       |

### Missed Approach Procedures

| Rwy | Approach | Missed Approach Procedure | Hold | Remarks |
| 05 | VOR DME | Climb on Rwy Heading to 2500 ft, then climbing turn LEFT to VOR VNA to 3000 ft and hold | VNA | - |
| 23 | ILS DME | Climb on R233 VNA to D10 VNA, then turn RIGHT to intercept 12 DME Arc VNA, climbing to 3000 ft. Continue to MANGO and hold | MANGO | - |
| ::: | RNAV (GNSS) | Climb direct G221G, then proceed direct to G241V at 3000 ft and hold | G241V | - |
| ::: | VOR DME | Climb on R233 VNA to D10 VNA, then turn RIGHT to intercept 12 DME Arc VNA, climbing to 3000 ft. Continue to MANGO and hold | MANGO | - |
| ::: | NDB | Climb on Rwy Heading ot 2500 ft, then climbing turn RIGHT to NDB LU to 3000 ft and hold | LU | - |

### MSA and MRVA

| Radio Aid | Min Distance | Max Distance | Radial From | Radial To | MSA     | Remarks |
| --------- | ------------ | ------------ | ----------- | --------- | ------- | ------- |
| VNA       | 0 nm         | 25 nm        | 001º        | 179º      | 2500 ft | -       |
| :::       | :::          | :::          | 180º        | 360º      | 2500 ft | -       |

### Diversions

| ICAO | Name | Distance | Longest Rwy | Remarks |

## Coordination

// \* None published at this time.//

## Charts

Unfortunately, Angola does not provide publicly accessible navigational charts for its airspace or airports.

So, the most we can do at this point is to offer you a link to Google's [Search Results](https://www.google.com/search?q=FNLU+Charts).

## Scenery

| Platform | Type     | Developer            | Link                                                                                                                              | Remarks |
| -------- | -------- | -------------------- | --------------------------------------------------------------------------------------------------------------------------------- | ------- |
| XP11     | Freeware | MakeAfricaGreatAgain | [Scenery](https://forums.x-plane.org/index.php?/files/file/63400-fvrg-robert-gabriel-mugabe-international-airporthararezimbabwe/) | -       |
| P3D      | Payware  | FSCGAA               | [Scenery](https://secure.simmarket.com/fscgaa-zimbabwe-harare-intl-airport-fvrg-p3d4-5.phtml)                                     | -       |
| P3D      | Payware  | FSXCENERY            | [Scenery](https://secure.simmarket.com/fsxcenery-fvha-aeropuerto-internacional-de-harare-fsx-p3d.phtml)                           | -       |
| FSX      | Payware  | FSXCENERY            | [Scenery](https://secure.simmarket.com/fsxcenery-fvha-aeropuerto-internacional-de-harare-fsx-p3d.phtml)                           | -       |
| FSX      | Freeware | David Uzzell         | [Scenery](https://library.avsim.net/esearch.php?DLID=178752)                                                                      | -       |
| FSX      | Freeware | Lee Marrow           | [Scenery](https://flyawaysimulation.com/downloads/files/7767/fsx-scenery-fix-for-fvha-harare-airport/)                            | -       |
| MSFS     | Freeware | EDDB2020             | [Scenery](https://flightsim.to/file/7335/harare-fvha-airport-lights-enhancement)                                                  | -       |
| MSFS     | Freeware | DangerousBanana      | [Scenery](https://flightsim.to/file/40617/harare-international-scenery-improvements-fvha)                                         | -       |

## Pilot Briefing

!!! note ""
Pilots taking part in events that depart from or arrive to FNLU should make themselves familiar with this briefing page as well as with all existing charts.

=== "Overview"

    Quatro de Fevereiro International Airport (4th February) is the main international airport of Angola. It is located in the southern part of the capital Luanda, situated in the Luanda Province, serving as the main gateway in and out of Luanda.

=== "Departure"

    #### Clearance Delivery

    - Clearances will be issued by Luanda Ground (FNLU_GND) or Luanda Tower (FNLU_TWR).
    - All aircraft will expect to depart on a Runway Heading, with an initial climb to 3000ft.
    - Runway 23 will be the preferred departure runway at Luanda up to 10 knots of tailwind.
    - Aircraft participating in any event should call 15 minutes before their planned CTOT to ensure a smooth departure. Failure to comply may result in resequencing.
    - Pilots should ONLY call once the pushback tug is connected.

    #### Ground Procedures

    - Runway 25 will be under the control of Ground if online, and aircraft will be cleared to cross.

    #### Departure Procedures

    - Comply with your assigned departure procedure and do not climb above your Initial Climb altitude unless instructed so.
    - You may be given intermediate climb instructions due to traffic. Do not climb above any assigned flight level.
    - Comply with any speed restrictions if provided. They are important to maintain adequate separation between traffic.

=== "Arrival"

    #### Arrivals and Approaches

    - All flights into FNLU will have "VNA" as their final waypoint. This is normal. You will then be radar vectored off for the ILS Approach into Runway 23.
    - Please note Runway 23 is the only runway to have any instrument approaches. Should any other runway be used, only a visual approach can be executed.
    - During landing, pilots should aim to vacate via E, aircraft permitting. If not, pilots should utilise one of two backtrack pads on the runway. This should be a speedy operation to ensure that no extra delay occurs for departures or other inbounds.

    #### Oceanic Operations

    - For Luanda Oceanic flights, you will not be required to request an Oceanic Clearance.
    - You will be requested however to maintain your Flight Level and an assigned Mach Number.
    - During Oceanic En-route, you'll be able to request higher flight levels, depending on availability.
    - Position Reports will not be required. You may be requested from Oceanic Controllers to provide your ETO (Expected Time Overhead) for a specific waypoint. What the Controller is expecting is your time (as in, 1615z) at the specific waypoint.
    - Remain on your last ATC assigned squawk code until instructed otherwise.
    - SELCAL is also available at Luanda Oceanic.
    - SLOP (Strategic Lateral Offset Procedure) is also available at Luanda Oceanic.
