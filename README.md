# DashaMail

A FormIt hook provided to subscribe an email address to your [DashaMail](https://dashamail.ru) list.

## Installation
Install the extra via MODX package manager

## Create API Key
Signup for an account on [DashaMail](https://dashamail.ru) and create an API key, [here](https://dashamail.ru/api/?_gl=1*rf286y*_ga*MTY0NjI0Mzg4NC4xNzM2OTI3MzA0*_ga_HWEQYTTCPL*MTczODQ0MDgwOS4xMC4xLjE3Mzg0NDA5MjAuMjAuMC4w) are more details.

## System settings
Before using the hook, `dashamail_api_key` API key and `dashamail_list_id` list ID system settings must be specified.

## Example snippet call

```
[[!FormIt?
  &hooks=`dashaMailSubscribe`
  &dmEmailField=`email-field-name`
  &dmlistId=`12345678`
  &dmMergeParams=`merge_1==name,merge_2==surname`
]]
```

## Possible options which can be added to the FormIt snippet call

| Parameter                  | Description                                                                 |
|----------------------------|------------------------------------------------------------------------------|
| dmEmailField | The name of the email field in the form. Default: `email`. |
| dmlistId | [optional] DashaMail list id to subscribe to, it helps override default value stored in system setting `dashamail_list_id` |
| dmMergeParams | [optional] The merge tags of Mailchimp combined with the form fields. More details can be found in [API documentation](https://dashamail.ru/api_details/?method=lists.add_member). Empty by default. |

## Further plans

In next version it is planned to add website users export to DashaMail side along as hooks for Login extra.
