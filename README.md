# SSA eAIP

This repository contains the official **eAIP Library** for the
**VATSIM Sub-Saharan Africa Division (VATSSA)** — an electronic Aeronautical
Information Publication providing comprehensive aviation operational information
for virtual pilot and controller operations across the Sub-Saharan Africa region.

**Live site:** <https://eaip2.vatssa.com>

## Structure

```
docs/
├── Aerodromes/        # Aerodrome data for 40+ airports across 16+ countries
├── TMA/               # Terminal Manoeuvring Area procedures
├── Enroute/           # En-route ATC and flight service stations
├── General/           # Phraseology, CPDLC, Euroscope guides, resources
├── New-Controllers/   # Training guides for new controllers
├── Pilot Briefing/    # Pilot briefing materials by country
└── Contributing/      # Contribution and formatting guidelines
```

## Local Development

The site is built with [MkDocs Material](https://squidfunk.github.io/mkdocs-material/) and deployed to GitHub Pages.

```bash
pip install -r requirements.txt
mkdocs serve
```

Then open <http://localhost:8000> to preview the site.

## Contributing

Contributions are welcome! See the [Contributing](https://eaip2.vatssa.com/Contributing/eAIP/formatting/) section of the eAIP for formatting guidelines.

1. Fork the repository
2. Create a branch for your changes
3. Submit a pull request using the provided PR template

## License

© VATSIM Sub-Saharan Africa Division (VATSSA).

All rights reserved unless otherwise specified.
Use is subject to the [VATSIM Code of Conduct](https://vatsim.net/docs/policy/code-of-conduct) and applicable VATSSA policy.
