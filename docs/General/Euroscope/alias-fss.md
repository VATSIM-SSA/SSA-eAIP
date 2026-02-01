# Euoscope Alias (FSS)


## Before initial contact

| Shortcut | Message | Remarks |
|----------|---------|---------|
| .cw | .msg $aircraft Hello. You will enter my airspace shortly. Please contact me on $freq when | - |
| .cp | .msg $aircraft Hello. You will enter my airspace shortly. Please contact me on $freq when passing $uc($1). | - |
| .cpl | .msg $aircraft Hello. You will enter my airspace shortly. Please contact me on $freq when passing $uc($1) at FL $2. | - |
| .ct | .msg $aircraft Hello. You will enter my airspace shortly. Please contact me on $freq at time $1 UTC. | - |

## Initial contact

| Shortcut | Message | Remarks |
|----------|---------|---------|
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
|----------|---------|---------|
| .co | Contact $radioname($1) $freq($1), good bye. | - |
| .rst | Radar service terminated. | - |
| .noatc | You are leaving my airspace, no further ATC service available, radar service terminated. Frequency change is approved, enjoy your flight, good bye. | - |
| .noatcb | $radioname is closing, no further ATC service available, radar service terminated. Make blind transmissions on UNICOM 122.800 and have a good flight, good bye. | - |
| .noatcc | $radioname is closing, for further ATC service contact $radioname($1) $freq($1), good bye. | - |
| .noatco | You are outside of my airspace, continue own discretion and make blind transmissions on UNICOM 122.800, good bye. | - |
| .blt | Please use UNICOM 122.800 for blind transmissions. Thank you. | - |

## Transponder

| Shortcut | Message | Remarks |
|----------|---------|---------|
| .sq | Set squawk $squawk. | - |
| .sqs | Set squawk STANDBY. | - |
| .sqc | Set squawk CHARLIE. | - |
| .sqi | Squawk IDENT | - |

## Lateral Navigation

| Shortcut | Message | Remarks |
|----------|---------|---------|
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
| .cot | Clear of traffic. | - |
| .rcw | Report clear of weather. | - |
| .ron | Resume own navigation direct $uc($1), magnetic track $bear($1) distance $dist($1) miles. | - |
| .cph | Continue present heading. | - |
| .cphr | Continue present heading and report. | - |
| .os | Proceed offset $1 nm $2 of $3. | - |
| .oc | Cancel offset. | - |

## Vertical Navigation

| Shortcut | Message | Remarks |
|----------|---------|---------|
| .c | Climb to FL $1. | - |
| .d | Descend to FL $1. | - |
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
|----------|---------|---------|
| .arr? | Confirm able $star arrival? | - |
| .tra? | Confirm able $star transition? | - |
| .arr | Cleared $star arrival. | - |
| .tra | Cleared $star transition. | - |

## Speed Control

| Shortcut | Message | Remarks |
|----------|---------|---------|
| .rs | Report speed. | - |
| .s | Maintain speed $1 knots | - |
| .sr | Reduce speed to $1 knots. | - |
| .si | Increase speed to $1 knots. | - |
| .rm | Report mach number. | - |
| .m | Maintain mach number $1 | - |
| .nsr | No speed restrictions. | - |
| .rns | Resume normal speed. | - |

## Holdings

| Shortcut | Message | Remarks |
|----------|---------|---------|
| .pho | Proceed to $1. Hold as published. | - |
| .ho | Hold at $1. | - |
| .hor | Hold at $1, inbound track $2°, right hand pattern. | - |
| .hol | Hold at $1, inbound track $2°, left hand pattern. | - |

## Pilot infos

| Shortcut | Message | Remarks |
|----------|---------|---------|
| .busy | .msg $aircraft Hello. I am currently too busy to help you or to answer your question. Please refer to the manuals on vatsim.net/pilots or try to find another person who can help you. | - |
| .cr | .msg $aircraft Please make a correct readback so that I see that you've understood my instructions correctly. A readback is made by repeating the instructions of the controller. | - |
| .rte | .msg $aircraft Hello. Your flight plan route is not valid. Please check for a valid route at grd.aero-nav.com or vroute.net. Thank you. | - |
| .xp | .msg $aircraft It seems you are using XPlane with inappropriate graphic settings. Your computer is not able to render the requested number of frames in time thus slowing down your simulator. Please adjust your graphic settings to increase the frame rate. | - |
| .cs | .msg $aircraft Your call sign looks different from our recommendation. Perhaps you are not yet familiar how to choose a call sign. For detailed information and guidance, please visit vatsim.net/pilot-resource-centre/general-lessons/choosing-callsign. | - |

## Others

| Shortcut | Message | Remarks |
|----------|---------|---------|
| .dis | Disregard last transmission. | - |
| .ru | Report unable. | - |
| .rac | Report aircraft type (and version). | - |
| .ri | Report intentions. | - |
| .wx | Metreport $metar($1). | - |
| .wxa | Metreport $metar($arr). | - |
| .qa | QNH $altim($arr). | - |
| .sb | Standby, I'll call you back. | - |
| .r | Roger. | - |

## AIRAC

| Shortcut | Message | Remarks |
|----------|---------|---------|
| .csr | .msg $aircraft At the moment, your call sign is not listed in our database. Please register your airline on gng.aero-nav.com/AERONAV/icao_request_airlines. If you continue to fly in our region, your call sign may be included in our controller files. | - |
| .csv | .msg $aircraft At the moment, your call sign is not listed in our database. Please register your VA on gng.aero-nav.com/AERONAV/icao_request_vairlines. If you continue to fly in our region, your call sign may be included in our controller files. | - |
