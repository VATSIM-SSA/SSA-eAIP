# VATCAN Bookings (Slots Plugin) Guide

> **System:** [bookings.vatcan.ca](https://bookings.vatcan.ca) | **Plugin repo:** [github.com/VATSIMCanada/Slots-Plugin](https://github.com/VATSIMCanada/Slots-Plugin)


## Overview

VATCAN Bookings is a free, community-available event booking system built and maintained by VATSIM Canada. It is used during large events — such as Cross the Pond (CTP) — to distinguish **booked/slot-holding** aircraft from **non-event** traffic in EuroScope. The companion EuroScope plugin (the "Slots Plugin") reads slot data from the VATCAN API and annotates aircraft tags and lists in real time.

Access is open to **all VATSIM members and divisions**, not just VATCAN.


## How It Works

```
Event Coordinator                Controller (EuroScope)
─────────────────                ──────────────────────
1. Create event on               4. Download & load plugin DLL
   bookings.vatcan.ca
2. Import pilot slots            5. Enter event code in plugin settings
   (JSON or CSV)
3. Share event code              6. Plugin polls VATCAN API every minute
   with ATC staff                   and labels booked vs non-booked traffic
```


## For Controllers (Plugin Setup)

### Requirements

- EuroScope (any recent version)
- Windows OS (the DLL is a native Windows binary)
- The plugin **Start in** directory must be set to `Documents\Euroscope\`

### Step 1 — Download the Plugin

[!NOTE]
VATCAN is already in our FASA sector files, however, for other sector files this may be helpful.

Download the latest release DLL from the GitHub releases page:

**[github.com/VATSIMCanada/Slots-Plugin/releases](https://github.com/VATSIMCanada/Slots-Plugin/releases)**

> **Current version:** V1.1.11 (released April 26, 2026) — built with updated curl and SSL libraries for compatibility with the VATCAN Booking API.

### Step 2 — Fix the EuroScope Shortcut

If you launch EuroScope via a desktop shortcut:

1. Right-click the shortcut → **Properties**.
2. Set the **"Start in"** field to:
   ```
   C:\Users\<YourName>\Documents\Euroscope\
   ```
3. Click **OK**.

Skipping this step will prevent the plugin from finding its settings file.

### Step 3 — Load the Plugin into EuroScope

1. Open EuroScope.
2. Go to **Other Set** in the top menu bar.
3. Select **Plug-ins...** to open the Plugins Dialog.
4. Click **Add** and browse to the downloaded `.dll` file.
5. After loading, ensure the plugin is set to **"Allowed to draw"** on the radar screen (checkbox in the Plugins Dialog).

### Step 4 — Enter the Event Code

1. Open the plugin's settings panel within EuroScope (location varies slightly by version; look for a VATCAN or Bookings entry in the menu).
2. Enter the **event code** provided by your event coordinator.
3. The plugin will connect to the VATCAN API and begin receiving slot data.

Data refreshes **every minute** automatically.

### Step 5 (Optional) — Pre-configure with a Settings File

You can create a settings file to automatically load your event code and customise the radar label, avoiding manual entry each session.

Place a file named `VATCANBookings.json` (or as named in your release's example) in your `Documents\Euroscope\` folder:

```json
{
  "eventCode": "YOUR_EVENT_CODE_HERE",
  "label": "SLOT"
}
```

Check the **Assets** section of the GitHub release for an example settings file specific to your version.


## Reading the Radar Display

Once active, the plugin annotates aircraft in EuroScope tag items and aircraft lists:

| Display | Meaning |
|---|---|
| **Booked / SLOT label** | Pilot has a confirmed booking slot; CTOT may also be shown |
| **No label / unmarked** | Non-event traffic — no booking on file |

You can add the plugin's tag items to any aircraft list or radar target tag using EuroScope's built-in **Tag Editor** and **Aircraft List** editors.

> **Tip:** For NATTrack events (e.g., CTP), the plugin also populates NATTrack fields, which update from both VATSIM and the NATTrack feed every minute.


## Troubleshooting

| Problem | Solution |
|---|---|
| Plugin doesn't load | Ensure the DLL is unblocked — right-click the file → Properties → **Unblock** |
| No slot data appears | Check the **"Start in"** shortcut path; confirm the event code is correct |
| SSL / connection errors | Update to the latest plugin release (V1.1.11+) which includes updated SSL libraries |
| Tag items not visible | Add them manually via the EuroScope Tag Editor or Aircraft List editor |
| Data seems stale | Data refreshes every 60 seconds; wait a moment or re-enter the event code |


## Data Flow Summary

```
bookings.vatcan.ca  ──API──►  Slots Plugin (EuroScope)
                               │
                    every 60s  ├──► Aircraft tag annotations
                               └──► Aircraft list columns
```

## Links & Resources

| Resource | URL |
|---|---|
| VATCAN Bookings portal | https://bookings.vatcan.ca |
| Plugin releases (download) | https://github.com/VATSIMCanada/Slots-Plugin/releases |
| Plugin source code | https://github.com/VATSIMCanada/Slots-Plugin |



*Guide current as of May 2026. Plugin version V1.1.11.*
