# Cryptocoin Price Tracking
As used by Coinwatch.in <br /> 
Current system provides the ability to log a variety of cryptocoin data in a private database

# Coming Soon
Shortly the ability to use PHPMailer to email alerts will be completed. 

# Installation
You must have composer already set up on your environment - [Installing Composer](https://getcomposer.org/doc/00-intro.md)

```
composer install
cp -f .env.example .env
```

Now you will need to edit your .env with your Database and Email details

####To use Database services you must first create a MySQL database

# Use
To use, simply call the below from the command line. 
This will create the data in the database.
```
php Run.php
```

---

# Changelog 

### _Version 0.4_
Total revamp of the system. Built now as a webapp

- Use MySQL Database
- Collect data from public API's for various providers
- All data displayed on front page with table view
- Add routing for page viewing

### _Version 0.3_
- Add SQLite3 database read/write
- Rewrite service-provider classes to get BTC specific data
- Add ability to query Poloniex API with private keys 

### _Version 0.2_
- Add sell price to email
- Add NZD prices to email
- Split classes up
- Formatted email layout
- Refactored code
- Make use of dotenv environment system
- Add BTC pricing from CoinCap.io (used by Shapeshift)
- Add BTC pricing from CoinDesk

### _Version 0.1_
- Initial commit 
- BTC/ETH exchange data from ShapeShift API
- BTC/ETH fiat currency rates from Coinbase API
- Email info to recipient
 


