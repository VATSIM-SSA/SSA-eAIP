# Overview

FACT_APP is the main station responsible for the TMA.

FACT_F_APP is only to log on with the presence of: - Cape Town Approach (FACT_APP) - Cape Town Tower (FACT_TWR)

Both stations must be online for a Director to be permitted to log on in any scenario.

## Arrival Procedures

SIDs and STARs are currently inactive. FACT_APP assumes the role of vectoring aircraft to the approach.

## Approach Procedures

| RWY | Procedure     | Frequency     | Course | GP Angle     | IAF / TANS               | Platform | Remarks |
|-----|---------------|---------------|--------|--------|-------------------------|---------|-------|
| 01  | ILS           | 110.30 CTI    | 011º   | 3.00º  | CTI                     | 2000 ft | -     |
| ::: | RNAV (GNSS)   | N/A           | 010º   | 3.00º  | EKBEV, IBGEL or UTIRO   | 1800 ft | -     |
| ::: | RNAV (RNP) Z  | N/A           | 010º   | 3.00º  | DUGLU                   | 3000 ft | -     |
| ::: | RNAV (RNP) Y  | N/A           | 010º   | 3.00º  | OKLEM                   | 3000 ft | -     |
| ::: | VOR Z         | 115.7 CTV     | 016º   | 2.43º  | 10 DME CTV              | 3000 ft | -     |
| 19  | ILS Z         | 109.1 KSI     | 191º   | 3.20º  | 13.9 DME CTV            | 3000 ft | -     |
| ::: | RNAV (GNSS)   | N/A           | 190º   | 3.20º  | UTREV, OKLAS or NESIK   | 2700 ft | -     |
| ::: | RNAV (RNP) Z  | N/A           | 190º   | 3.00º  | APKUV, OKLEM            | 3000 ft | -     |
| 34  | RNAV (RNP) Z  | N/A           | 340º   | 3.00º  | OKLEM                   | 3000 ft | -     |

## Holds

| Name  | STAR | Altitude   | Speed (IAS) | Inbound CRS | Turn  | Leg Time | Remarks                         |
|-------|------|------------|-------------|-------------|-------|----------|---------------------------------|
| CTV   | -    | 3000 ft +  | 230 KT      | 009º        | Left  | 1 min    | -                               |
| CB    | -    | 4000 ft +  | 230 KT      | 189º        | Left  | 1 min    | RWY 19                          |
| EKBEV | -    | 6100 ft +  | 230 KT      | 100º        | Right | 1 min    | RNAV GNSS RWY 01                |
| UTREV | -    | 6100 ft +  | 230 KT      | 100º        | Right | 1 min    | RNAV GNSS RWY 19                |
| DUGLU | -    | 6100 ft +  | 230 KT      | 135º        | Right | 1 min    | RNAV RNP RWY 01, 19 and 34      |

## Missed Approach Procedures

| Rwy | Approach      | Missed Approach Procedure                                                                                                                                 | Hold                    | Remarks |
|-----|---------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------|---------|
| 01  | ILS           | Climb to 6500 ft. Maintain RWY heading to 2.0 DME CTV, then LEFT heading 330º to intercept R-346 CTV. At 6500 ft, turn RIGHT direct to VOR.               | 6.7 DME CTV             | -       |
| ::: | RNAV (GNSS)   | Climb to 6100 ft. Direct CT1M1, then turn LEFT to DUGLU, then turn LEFT direct CT1M2, then direct EKBEV.                                                    | EKBEV                   | -       |
| ::: | RNAV (RNP) Z  | Climb to 6100 ft. Direct CT402, then turn LEFT via CT406 to DUGLU.                                                                                        | DUGLU                   | -       |
| ::: | RNAV (RNP) Y  | Climb to 6100 ft. Direct CT402, then turn LEFT via CT406 to DUGLU.                                                                                        | DUGLU                   | -       |
| ::: | VOR Z         | Climb on R-196 CTV, then turn LEFT R-346 CTV. At 6500 ft, turn RIGHT direct VOR.                                                                          | 5.0 DME R-196 CTV       | -       |
| 19  | ILS Z         | Climb to 4500 ft. Maintain RWY heading to 4.5 DME CTV, then turn LEFT direct VOR.                                                                         | CTV                     | -       |
| ::: | RNAV (GNSS)   | Climb to 6100 ft. Direct CT2M1, then turn RIGHT to CT2M2, then turn RIGHT to UTREV.                                                                       | UTREV                   | -       |
| ::: | RNAV (RNP) Z  | Climb to 6100 ft. Direct CT426, then turn RIGHT via CT428 to CT430, then turn LEFT via CT432 to DUGLU.                                                    | DUGLU                   | -       |
| 34  | RNAV (RNP) Z  | Climb to 6100 ft. Direct CT612, then turn RIGHT via CT614 to CT616, then turn LEFT via CT618 to DUGLU.                                                    | DUGLU                   | -       |

## MSA and MRVA

| Radio Aid | Min Distance | Max Distance | Radial From | Radial To | MSA     | Remarks |
|-----------|--------------|--------------|-------------|-----------|---------|---------|
| CPT ARP   | 0 nm         | 25 nm        | 000º        | 360º      | 2500 ft | -       |
