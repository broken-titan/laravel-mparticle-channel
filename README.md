# Laravel mParticle Notification Channel

This package makes it easy to integrate Laravel with mParticle for sending notifications.

## Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

Install this package with Composer:

    composer require broken-titan/laravel-mparticle-channel

## Configuration

Before you may begin using the mParticle service, you must obtain authentication information from mParticle. The username and password must be assigned to MPARTICLE_USERNAME and MPARTICLE_PASSWORD in your .env file. You will also need to configure your mParticle pod using MPARTICLE_POD if you are not on the US1 pod.

By default the config file is merged with services.php and are accessible using config("services.mparticle").

## Usage

Once installation is complete, you can send events to mParticle by creating standard Laravel notifications. For example:

```
    namespace App\Notifications;

    use Illuminate\Notifications\Notification;
    use BrokenTitan\mParticle\Channels\MParticleChannel;
    use BrokenTitan\mParticle\Messages\MParticleEventMessage;

    class UserCreated extends Notification {
        public function via($notifiable) {
            return [MParticleChannel::class];
        }

        public function toMParticle($notifiable) : MParticleEventMessage {
            $data = [
                "property" => "value"
            ];
        
            return new MParticleEventMessage("user_created", MParticleEventMessage::TRANSACTON, $data);
        }
    }   
```
You will also want to define a routeNotificationForMParticle() function on your Notifiable classes. They need to return an array with user identities that you want to send. For example:

```
public function routeNotificationForMParticle() {
    return ["customer_id" => 123, "email" => "example@domain.com"];
}
```
## Testing

```
$ composer test
```

## Security

If you discover any security issues that would affect existing users, please email contact@brokentitan.com instead of using the issue tracker.

## Contributing

Feel free to contribute to the package.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
