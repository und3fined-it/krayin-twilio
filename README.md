# Twilio for Krayin

This package enable the user to use Twilio services. 

Actually it supports only SMS.

## What do you need before?
1. [Krayin CRM]() (actually this package is tested on 1.x.x and Laravel 8+)
2. [Twilio](https://www.twilio.com/)

## How to install it?
This package is hosted on Composer, so you only need to require it.

1. composer require und3fined-it/krayin-twilio

## Setup

1. Go into your backoffice
2. Go into Twilio settings
3. Fill up the form and save it.
4. Give it a try!

## How to implement it with other packages?

1. Message composing  
   You can generate a direct sms compose link passing the "to" parameter.  
   ```route("admin.twilio.sms.create", ["to" => "XXXXXXXXX"])```
