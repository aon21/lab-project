### LAB PHP PROJECT
Learning material

### INSTALLATION
1. composer install in root directory
2. copy example env file by running this command in your terminal - cp .env.example .env (and fill connection data)

### Project Structure
    
    ├── app
    │   ├── Core
    │   │   ├── Company
    │   │   │   └── Exceptions
    │   │   ├── Customer
    │   │   ├── Form
    │   ├── Controllers (for later usage)
    │   ├── Models (for later usage)
    │   ├── Views
    │   │   ├── Forms
    │   │   └── Layouts
    │   │       └── Partials
    ├── public
    │   └── assets
    │       └── scripts
    │       └── styles
    ├── Logs
    │   ├── Company
    │   ├── Customer
    ├── vendor
    │   └── (Third-party dependencies installed via Composer)
    └── composer.json
    └── README.md
