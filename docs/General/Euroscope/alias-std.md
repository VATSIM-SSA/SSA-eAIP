# Euroscope Alias (Standard)

## Custom

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .cm | .msg $aircraft Please contact $radioname ($atccallsign) on $freq. Please do not respond via private message. Use the frequency for all communications. | - |
| .pdc1 | .msg $aircraft PDC for $aircraft ($type) / Cleared to $arr via $SID RWY $deprwy / Initial Climb $alt / Squawk $asquawk / Expect $cruise after departure. | - |
| .pdc2 | .msg $aircraft This message is your departure clearance. No need to reply. 15 minutes before slot time, contact DEL for release. | - |

## Before initial contact

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .cw | .msg $aircraft Hello. You will enter my airspace shortly. Please contact me on $freq when | - |
| .cp | .msg $aircraft Hello. You will enter my airspace shortly. Please contact me on $freq when passing $uc($1). | - |
| .cpl | .msg $aircraft Hello. You will enter my airspace shortly. Please contact me on $freq when passing $uc($1) at FL $2. | - |
| .ct | .msg $aircraft Hello. You will enter my airspace shortly. Please contact me on $freq at time $1 UTC. | - |
| .cwr | .msg $aircraft Hello. $radioname is providing top-down service for $dep. Please contact me on $freq when you are ready. | - |
| .ci | .msg $aircraft NO MOVEMENT without permission, please! $radioname is providing top-down service for $dep. HOLD POSITION and contact me IMMEDIATELY on $freq! | - |

## Initial contact

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .h | $radioname, hello. | - |
| .gd | $radioname, good day. | - |
| .gm | $radioname, good morning. | - |
| .ga | $radioname, good afternoon. | - |
| .ge | $radioname, good evening. | - |
| .id | Identified. | - |
| .ids | Standby for identification. | - |
| .v? | Are you able to receive voice? | - |
| .pym | Pass your message. | - |

## Handoff

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .co | Contact $radioname($1) $freq($1), good bye. | - |
| .autocontact | Contact $1 $2, good bye. | - |
| .rst | Radar service terminated. | - |
| .noatc | You are leaving my airspace, no further ATC service available, radar service terminated. Frequency change is approved, enjoy your flight, good bye. | - |
| .noatcb | $radioname is closing, no further ATC service available, radar service terminated. Make blind transmissions on UNICOM 122.800 and have a good flight, good bye. | - |
| .noatcc | $radioname is closing, for further ATC service contact $radioname($1) $freq($1), good bye. | - |
| .noatco | You are outside of my airspace, continue own discretion and make blind transmissions on UNICOM 122.800, good bye. | - |
| .blt | Please use UNICOM 122.800 for blind transmissions. Thank you. | - |

## Transponder

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .sq | Set squawk $squawk. | - |
| .sqs | Set squawk STANDBY. | - |
| .sqc | Set squawk CHARLIE. | - |
| .sqi | Squawk IDENT | - |

## Clearance

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .rrc | Clearance available, report ready to copy. | - |
| .ico | Information $atiscode correct. | - |
| .icu | Information $atiscode current. | - |
| .cl | Runway $deprwy, cleared to $arr via $sid departure, squawk $squawk. | - |
| .cla | Runway $deprwy, cleared to $arr via $sid departure, climb to $1 ft, squawk $squawk. | - |
| .cll | Runway $deprwy, cleared to $arr via $sid departure, climb to FL $1, squawk $squawk. | - |
| .clv | Runway $deprwy, cleared to $arr via vectored departure. After departure climb to $1 ft and maintain runway heading, squawk $squawk. | - |
| .sid? | Are you able to fly the $sid departure? | - |

## Startup / Pushback

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .rb | Readback correct. | - |
| .rrs | Report ready for startup / pushback. | - |
| .rrp | Report ready for pushback. | - |
| .sa | Startup approved. | - |
| .spa | Startup and pushback approved. | - |
| .pa | Pushback approved. | - |
| .pf | Pushback approved, facing $1. | - |
| .pn | Pushback approved, facing north. | - |
| .pne | Pushback approved, facing north-east. | - |
| .pe | Pushback approved, facing east. | - |
| .pse | Pushback approved, facing south-east. | - |
| .ps | Pushback approved, facing south. | - |
| .psw | Pushback approved, facing south-west. | - |
| .pw | Pushback approved, facing west. | - |
| .pnw | Pushback approved, facing north-west. | - |

## Taxi

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .rrt | Report ready for taxi. | - |
| .rft | Are you ready for taxi? | - |
| .tv | Taxi via $1. | - |
| .thp | Taxi to holding point runway $deprwy via $1. | - |
| .tts | Taxi to stand $1 via $2. | - |
| .ttg | Taxi to gate $1 via $2. | - |
| .ttc | Taxi to a parking position of your choice. | - |
| .hst | Hold short of taxiway $1. | - |
| .ths | Taxi via $1, hold short of runway $2. | - |
| .hs | Hold short of runway $1. | - |
| .xr | Cross runway $2. | - |
| .xrt | Taxiway $uc($1), cross runway $2. | - |
| .hp | HOLD POSITION. | - |
| .gw | Give way to $1. | - |
| .wcc | When clear of $1 continue taxi. | - |

## Line up and departure

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .lu | Line up runway $deprwy and wait. | - |
| .lubl | Behind landing $1, line up runway $deprwy and wait behind. | - |
| .lubd | Behind departing $1, line up runway $deprwy and wait behind. | - |
| .bt | Line up and backtrack runway $deprwy. | - |
| .rrd | Report ready for departure. | - |
| .rfd | Are you ready for departure? | - |
| .rfid | Are you ready for immediate departure? | - |
| .afid | Are you able for departure from intersection $1? | - |
| .cto | Wind $winds($dep), runway $deprwy, cleared for take-off. | - |
| .ctoi | Wind $winds($dep), runway $deprwy, intersection $1, cleared for take-off. | - |
| .cito | Wind $winds($dep), runway $deprwy, cleared for immediate take-off. | - |
| .toc | Hold position, CANCEL take-off, I say again, CANCEL take-off. | - |
| .stop | STOP immediately, $aircraft, STOP immediately. | - |

## Lateral Navigation

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .tl | Turn left heading $1. | - |
| .tr | Turn right heading $1. | - |
| .tld | Turn left direct $1. | - |
| .trd | Turn right direct $1. | - |
| .fh | Fly heading $1. | - |
| .lh | Leave $1 heading $2 | - |
| .rh | Report heading. | - |
| .tlb | Turn left by $1 degrees. | - |
| .trb | Turn right by $1 degrees. | - |
| .rnh | Report new heading. | - |
| .pd | Proceed direct $1. | - |
| .autoproceed | Proceed direct $1. | - |
| .cot | Clear of traffic. | - |
| .rcw | Report clear of weather. | - |
| .ron | Resume own navigation direct $uc($1), magnetic track $bear($1) distance $dist($1) miles. | - |
| .cph | Continue present heading. | - |
| .cphr | Continue present heading and report. | - |
| .os | Proceed offset $1 nm $2 of $3. | - |
| .oc | Cancel offset. | - |

## Vertical Navigation

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .c | Climb to FL $1. | - |
| .autoclimblevel | Climb to FL $1. | - |
| .ca | Climb to $1 ft. | - |
| .caq | Climb to $1 ft, QNH $altim($dep). | - |
| .caqq | Climb to $1 ft, QNH $2. | - |
| .autoclimbaltitude | Climb to $1 ft, QNH $altim($dep). | - |
| .d | Descend to FL $1. | - |
| .autodescendlevel | Descend to FL $1. | - |
| .da | Descend to $1 ft. | - |
| .daq | Descend to $1 ft, QNH $altim($arr). | - |
| .daqq | Descend to $1 ft, QNH $2. | - |
| .autodescendaltitude | Descend to $1 ft, QNH $altim($arr). | - |
| .mf | Maintain $1 feet. | - |
| .ml | Maintain FL $1. | - |
| .rpa | Report passing altitude. | - |
| .rrl | Report requested level. | - |
| .rd | Report ready for descend. | - |
| .tod | Report top of descent. | - |
| .rl | Report level. | - |
| .wrd | When ready, descend to FL $1. | - |
| .wrdr | When ready, descend to FL $1 to reach level at $2. | - |
| .cas | Check altimeter setting and confirm level. You are indicating $calt. | - |
| .sas | Set altimeter to standard pressure (1013 hPa or 2992 inHg). | - |
| .rla | Reach level at $1. | - |
| .xl | Cross $1 at $2 | - |
| .xa | Cross $1 at $2 or above. | - |
| .xb | Cross $1 at $2 or below. | - |
| .ob | or before. | - |
| .ola | or later. | - |
| .le | Currently only EVEN levels available. Do you prefer FL $1 or FL $2? | - |
| .lo | Currently only ODD levels available. Do you prefer FL $1 or FL $2? | - |
| .roc | Climb at $1 feet per minute | - |
| .rod | Descend at $1 feet per minute | - |
| .og | or greater. | - |
| .om | or greater. | - |
| .ol | or less. | - |
| .rroc | Report rate of Climb. | - |
| .rrod | Report rate of descent. | - |

## Approach 

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .arr? | Confirm able $star arrival? | - |
| .tra? | Confirm able $star transition? | - |
| .arr | Cleared $star arrival. | - |
| .tra | Cleared $star transition. | - |
| .ev | Expect vectoring for $1 approach runway $arrrwy. | - |
| .et | Expect RNAV transition for $1 approach runway $arrrwy. | - |
| .v | Vectoring for $1 approach runway $arrrwy. | - |
| .jt | Join $star transition. | - |
| .ils | Cleared ILS approach runway $arrrwy. Report established. | - |
| .autoclearedils | Cleared ILS approach runway $1. Report established. | - |
| .rnav | Cleared RNAV approach runway $arrrwy. Report established. | - |
| .vor | Cleared VOR/DME approach runway $arrrwy. Report established. | - |
| .ndb | Cleared NDB approach runway $arrrwy. Report established. | - |
| .vi | Cleared Visual approach runway $arrrwy. Report runway in sight. | - |
| .autoclearedvisual | Cleared Visual approach runway $1. Report runway in sight. | - |
| .coa | Continue approach, wind $winds($arr). | - |
| .llc | Continue approach, expect late landing clearance, wind $winds($arr). | - |
| .tm | $1 track miles to touchdown. | - |
| .ris | Report runway in sight. | - |
| .wc | wind $winds($arr) | - |

## Speed Control

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .rs | Report speed. | - |
| .s | Maintain speed $1 knots | - |
| .autospeed | Maintain speed $1 knots | - |
| .sr | Reduce speed to $1 knots. | - |
| .si | Increase speed to $1 knots. | - |
| .rm | Report mach number. | - |
| .m | Maintain mach number $1 | - |
| .automach | Maintain mach number $1 | - |
| .mc | Reduce to minimum clean speed. | - |
| .mcr | Reduce to minimum clean speed and report. | - |
| .ma | Reduce to minimum approach speed. | - |
| .nsr | No speed restrictions. | - |
| .autonospeed | No speed restrictions. | - |
| .rns | Resume normal speed. | - |

## Holdings

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .pho | Proceed to $1. Hold as published. | - |
| .ho | Hold at $1. | - |
| .hor | Hold at $1, inbound track $2°, right hand pattern. | - |
| .hol | Hold at $1, inbound track $2°, left hand pattern. | - |

## Landing

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .ctl | Wind $winds($arr), runway $arrrwy, cleared to land. | - |
| .ctg | Wind $winds($arr), runway $arrrwy, cleared touch and go. | - |
| .csg | Wind $winds($arr), runway $arrrwy, cleared for stop and go. | - |
| .clp | Wind $winds($arr), cleared low pass runway $arrrwy. | - |
| .avr | After landing vacate to the RIGHT. | - |
| .avl | After landing vacate to the LEFT. | - |
| .rt | Runway $1 is available for taxi. | - |
| .so | Swing over runway $1. | - |

## After Landing

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .vr | Vacate runway to the RIGHT. | - |
| .vl | Vacate runway to the LEFT. | - |
| .vv | Vacate via $1. | - |
| .wel | Welcome to $arr. | - |
| .bye | Thanks for coming to $arr, good bye and see you next time. | - |

## VFR

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .in | Enter control zone via Route $1. | - |
| .lr | Landing runway $arrrwy. | - |
| .out | Leave control zone via Route $1. | - |
| .mlt | Make left turns. | - |
| .mrt | Make right turns. | - |
| .lta | Right turn approved. | - |
| .jld | Join left downwind runway $arrrwy. | - |
| .jld | Join left downind runway $arrrwy. | - |
| .jrd | Join RIGHT downwind runway $arrrwy. | - |
| .jlb | Join left base runway $arrrwy. | - |
| .jrb | Join RIGHT base runway $arrrwy. | - |
| .ed | Extend downwind until advised. | - |
| .tb | Turn now for base. | - |
| .mda | Make direct approach runway $arrrwy. | - |
| .msa | Make straight-in approach runway $arrrwy. | - |
| .mfs | Make full stop landing. | - |
| .orl | Orbit left. | - |
| .orr | Orbit right. | - |
| .ra | Routing approved. | - |
| .hov | Hold over $1. | - |

## Pilot Info

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .busy | Hello. I am currently too busy to help you or to answer your question. Please refer to the manuals on vatsim.net/pilots or try to find another person who can help you. | - |
| .cr | Please make a correct readback so that I see that you've understood my instructions correctly. A readback is made by repeating the instructions of the controller. | - |
| .po | Hello, the position you are standing is already occupied by another aircraft. Please choose another one. Thank you. | - |
| .rte | Hello. Your flight plan route is not valid. Please check for a valid route at grd.aero-nav.com or vroute.net. Thank you. | - |
| .rp | Startup does NOT include pushback. This first movement needs a separate clearance. Always request pushback, please. Thank you. | - |
| .cf | The facing indicates the direction your nose should point to after the pushback is completed. | - |
| .exg | Hello, expect Gate $1, Happy Landing! | - |
| .exs | Hello, expect Stand $1, Happy Landing! | - |
| .xp | It seems you are using XPlane with inappropriate graphic settings. Your computer is not able to render the requested number of frames in time thus slowing down your simulator. Please adjust your graphic settings to increase the frame rate. | - |
| .cs | Your call sign looks different from our recommendation. Perhaps you are not yet familiar how to choose a call sign. For detailed information and guidance, please visit vatsim.net/pilot-resource-centre/general-lessons/choosing-callsign. | - |

## Others

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .dis | Disregard last transmission. | - |
| .ru | Report unable. | - |
| .rac | Report aircraft type (and version). | - |
| .ri | Report intentions. | - |
| .wx | Metreport $metar($1). | - |
| .wxa | Metreport $metar($arr). | - |
| .q | QNH $altim($1). | - |
| .qd | QNH $altim($dep). | - |
| .qa | QNH $altim($arr). | - |
| .sb | Standby, I'll call you back. | - |
| .r | Roger. | - |

## Airac

| Shortcut | Message | Remarks |
| -------- | ------- | ------- |
| .csr | Hello. At the moment, your call sign is not listed in our database. Please register your airline on gng.aero-nav.com/AERONAV/icao_request_airlines. If you continue to fly in our region, your call sign may be included in our controller files. | - |
| .csv | Hello. At the moment, your call sign is not listed in our database. Please register your VA on gng.aero-nav.com/AERONAV/icao_request_vairlines. If you continue to fly in our region, your call sign may be included in our controller files. | - |
