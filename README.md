# Twilio Package
This block allows you to make voice calls, send sms or mms.

## How to get `accountSid` and `accountToken`:
 0. [Go to the twilio console](https://www.twilio.com/console)
 1. Create or login to your account.
 2. Pay for account or use free trial.
 3. Go to Account->Account Settings and find API Credentials block.
 4. Copy your `accountSid` and `accountToken`.
 
## /api/twilio/makeCall
Make phone calls

| Field            | Type     | Description  |
| -------------    |-------------     | -----|
| `accountSid`         |string  | A 34 character string that uniquely identifies this account. |
| `accountToken`         |string  | The authorization token for this account. |
| `from` |string  | The phone number or client identifier to use as the caller id. If using a phone number, it must be a Twilio number or a Verified outgoing caller id for your account. |
| `to` |string  | The phone number, SIP address or client identifier to call. |
| `url` |string  | The fully qualified URL that should be consulted when the call connects. Just like when you set a URL on a phone number for handling inbound calls. See the Url Parameter section below for more details. |
| `applicationSid` |string  | The 34 character sid of the application Twilio should use to handle this phone call. If this parameter is present, Twilio will ignore all of the voice URLs passed and use the URLs set on the application. |

#### Request example
```json
{
		"accountSid": "XXXX",
		"accountToken": "XXXX",
		"from": "+15005550006",
		"to": "+150055444006",
		"url": "http://demo.twilio.com/docs/voice.xml",
}
```
#### Response example
```json
{"callback":"success","contextWrites":{"to":["CA0caca6962c6e7f028d5c3ca3a564b33a",{"date":"2016-09-15 19:16:09.000000","timezone_type":1,"timezone":"+00:00"},{"date":"2016-09-15 19:16:09.000000","timezone_type":1,"timezone":"+00:00"},null,"AC5f37acb24007a320eefb5ffaeb498a78","+380930000895","+380930000895","+15005550006",null,null,"queued",{"date":"2016-09-15 19:16:10.000000","timezone_type":3,"timezone":"UTC"},{"date":"2016-09-15 19:16:10.000000","timezone_type":3,"timezone":"UTC"},null,null,null,null,"2010-04-01",null,null,"\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Calls\/CA0caca6962c6e7f028d5c3ca3a564b33a.json",null,null,"USD",{"notifications":"\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Calls\/CA0caca6962c6e7f028d5c3ca3a564b33a\/Notifications.json","recordings":"\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Calls\/CA0caca6962c6e7f028d5c3ca3a564b33a\/Recordings.json"}]}}
```

## /api/twilio/sendSms
Send text message

| Field            | Type     | Description  |
| -------------    |-------------     | -----|
| `accountSid`         |string  | A 34 character string that uniquely identifies this account. |
| `accountToken`         |string  | The authorization token for this account. |
| `from` |string  | The phone number or client identifier to use as the caller id. If using a phone number, it must be a Twilio number or a Verified outgoing caller id for your account. |
| `messagingServiceSid` |string  | The 34 character unique id of the Messaging Service you want to associate with this Message. Set this parameter to use the Messaging Service Settings and Copilot Features you have configured. When only this parameter is set, Twilio will use your enabled Copilot Features to select the From phone number for delivery. |
| `to` |string  | The phone number, SIP address or client identifier to call. |
| `body` |string  | The text of the message you want to send, limited to 1600 characters. |

#### Request example
```json
{
		"accountSid": "XXXX",
		"accountToken": "XXXX",
		"from": "+15005550006",
		"to": "+150055444006",
		"body": "text",
}
```
#### Response example
```json
{"callback":"success","contextWrites":{"to":["SM525c50d800d0415c90220ee1dd023c0a","Sent from your Twilio trial account - http:\/\/demo.twilio.com\/docs\/voice.xml",{"date":"2016-09-15 19:21:02.000000","timezone_type":1,"timezone":"+00:00"},{"date":"2016-09-15 19:21:02.000000","timezone_type":1,"timezone":"+00:00"},"AC5f37acb24007a320eefb5ffaeb498a78","+380930000895","+15005550006","queued",null,"outbound-api","2010-04-01","\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Messages\/SM525c50d800d0415c90220ee1dd023c0a.json",{"media":"\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Messages\/SM525c50d800d0415c90220ee1dd023c0a\/Media.json"},"USD",{"date":"2016-09-15 19:21:03.000000","timezone_type":3,"timezone":"UTC"},null,null,"0","1"]}}
```

## /api/twilio/sendMms
Send media message

| Field            | Type     | Description  |
| -------------    |-------------     | -----|
| `accountSid`         |string  | A 34 character string that uniquely identifies this account. |
| `accountToken`         |string  | The authorization token for this account. |
| `from` |string  | The phone number or client identifier to use as the caller id. If using a phone number, it must be a Twilio number or a Verified outgoing caller id for your account. |
| `messagingServiceSid` |string  | The 34 character unique id of the Messaging Service you want to associate with this Message. Set this parameter to use the Messaging Service Settings and Copilot Features you have configured. When only this parameter is set, Twilio will use your enabled Copilot Features to select the From phone number for delivery. |
| `to` |string  | The phone number, SIP address or client identifier to call. |
| `mediaUrl` |string  | The URL of the media you wish to send out with the message. gif , png and jpeg content is currently supported and will be formatted correctly on the recipient's device. |

#### Request example
```json
{
		"accountSid": "XXXX",
		"accountToken": "XXXX",
		"from": "+15005550006",
		"to": "+150055444006",
		"mediaUrl": "http://demo.twilio.com/docs/voice.xml",
}
```
#### Response example
```json
{"callback":"success","contextWrites":{"to":["MMc66c73ff6ca8471bb68906146a764f29","",{"date":"2016-09-15 19:23:04.000000","timezone_type":3,"timezone":"UTC"},{"date":"2016-09-15 19:23:04.000000","timezone_type":3,"timezone":"UTC"},"AC5f37acb24007a320eefb5ffaeb498a78","+380930000895","+15005550006","queued",null,"outbound-api","2010-04-01","\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Messages\/MMc66c73ff6ca8471bb68906146a764f29.json",{"media":"\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Messages\/MMc66c73ff6ca8471bb68906146a764f29\/Media.json"},"USD",{"date":"2016-09-15 19:23:04.000000","timezone_type":3,"timezone":"UTC"},null,null,"0","1"]}}
```
## Errors
| Error            | Description     |
| -------------    |-------------     |
| `Credentials are required to create a Client`     | Provide accountSid and accountToken to establish connection properly. |
| `[HTTP 404] Unable to create record: The requested resource /2010-04-01/Accounts/AC5f37acb25ffaeb498a78/Messages.json was not found"`     | Provide correct accountSid. |
| `[HTTP 401] Unable to create record: Authenticate`     | Provide correct accountToken. |
| `[HTTP 400] Unable to create record: A "From" phone number is required.`     | One of  a mandatory field is incorrect. |
| `[HTTP 400] Unable to create record: Method is not valid: TEST`     | One of an additional field is incorrect. |
#### Example
```json
{
"callback":"error",
"contextWrites":{
    "to":"[HTTP 400] Unable to create record: Method is not valid: TEST"
    }
}
```
