<p align="center">
    <img src="https://img.shields.io/badge/version-1.0.0-blue">
    <img alt="Scrutinizer build (GitHub/Bitbucket)" src="https://img.shields.io/scrutinizer/build/g/dinushchathurya/websmslk/main">
    <img alt="Scrutinizer code quality (GitHub/Bitbucket)" src="https://scrutinizer-ci.com/g/dinushchathurya/websmslk/badges/quality-score.png?b=main">
    <img src="https://img.shields.io/badge/dependencies-up%20to%20date-orange">
    <img src="https://img.shields.io/badge/coverage-100%25-yellowgreen">
    <img src="https://img.shields.io/badge/rating-★★★★★-brightgreen">
    <img src="https://img.shields.io/badge/uptime-100%25-brightgreen">
</p>

<div>
  <h1 align="center">Laravel Package to send sms using <a href="https://websms.lk/">websms.lk</a> SMS Gateway </h1>
    <p align="center">
      This package allows you to send sms to multiple numbers at once using websms.lk  API
    </p>
    <br><br>
</div>

## Table of Contents
<ol>
    <li><a href="#installation">Installation</a></li>
    <li><a href="#config">Publish the config file</a></li>
    <li><a href="#env">.env config</a></li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#author">Author</a></li>
    <li><a href="#license">License</a></li>
</ol>

## Installation

```
composer require dinushchathurya/websmslk
```

### Publish the config file

```
php artisan vendor:publish --provider="Dinushchathurya\Websms\SmsServiceProvider"
```

### Add the following to your .env file

```env
SMS_API_KEY=<your-api-key>
SMS_API_TOKEN=<your-api-token>
SMS_SENDER_ID=<your-sender-id>
SMS_TYPE= sms
SMS_ROUTE=0
```

For more information about the above parameters, please visit [websms.lk](https://websms.lk/)

## Usage

This is a simple example of how to send SMS using this package.

```php
use Dinushchathurya\Websms\Sms;

public function sendSms()
{
  try {
    $numbers = ['9476xxxxxx','9471xxxxxxx'];
    $message = "ආයුබෝවන්. සාදරයෙන් පිළිගනිමු";
    Sms::send($numbers, $message);                     
    return response()->json([
      'message' => 'SMS sent successfully'
    ]);  
  } catch (\Exception $e) {
    return response()->json([
      'message' => 'An error occurred while sending SMS: ' . $e->getMessage()
    ], 500);
  }
}
```

```
Route::get('/send-sms', [App\Http\Controllers\SmsController::class, 'sendSms'])->name('send-sms');
```

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Author 

Author [Dinush Chathurya](https://dinushchathurya.github.io/)

## License

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Copyright (c) 2023 <a href="https://dinushchathurya.github.io/">Dinush Chathurya</a>, <a href="https://github.com/open-source-srilanka">Open Source SriLanka</a> and <a href="https://codingtricks.io/">codingtricks.io</a>

