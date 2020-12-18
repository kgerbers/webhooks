## Local testing with webhook:
I made a honeypot endpoint for testing webhooks:
url of webhook: https://webhooks.keesgerbers.nl (http is also valid)
show incoming requests: https://webhooks.keesgerbers.nl/show.php

### Create PHPStorm web request:
- open new scratch file (Press Ctrl+Alt+Shift+Insert (or File > new scratch file) and select HTTP Request.)
- edit following info to your local test data:
```
POST {local endpoint url}
Content-Type: application/x-www-form-urlencoded

{RAW Input string from api request here}
```
