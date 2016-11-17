<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | JWT Authentication Secret
    |--------------------------------------------------------------------------
    |
    | Don't forget to set this, as it will be used to sign your tokens.
    | A helper command is provided for this: `php artisan jwt:generate`
    |
    */

    'secret' => env('JWT_SECRET', "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDLNbrdzUx8YJJf\n505fBiZ4ZvSD1Zh/1QJgzceoga/rMoeiwip+al8aYk0V+M9uQbET7NSMZpKJj+5H\n1/yKvIzpVYAeUu0t54E4O57kpaAxIRB1VoesPrLu8EDLr2gUnpeytw7KWU0RdraM\nJ2khFCWxPJf1m1dpfCztqa/jVCYVm7AkZn7L5Lwz53Yz+ol12OZpAS6njifD/JOn\nATh4FmJ+LIm5JFc53Ovf7IcPSwtTsRfNNVqBM1VM0WWNvFSxc83z/3npjci3u2hW\nYeh/Jmbj8fzI5HsEmsdkvFlulKiKUaTlkFDXvC6A06GADiYNj4vmQwidWYZ/I7Z1\nn4NRINNFAgMBAAECggEASxet2Cz3aLbfIGV/honlSXTyQo157zMtz8v7Tf+unIFt\nse2CenigcEWHKulo7duErlJEMSXuXLs9WHsuLa6De+5Gi+4lC2OTUs5lZyT1T3Ji\nfJnfRP1ebgGGUD6ffY8li7st0gSyABQYXS5rIPgq/ZXgqbgf0zE6ARFFmAIOmMjo\nlTGW5S6Fw4rPXU3Q7c63C4X+WDyfJsUb6v6EAFJqjZIfIehlSH93qmd1uDwlLrfu\n/eikD+m0kQrB0g/pOmEaJl8/yfbTRxc+kcCM1778FEs5MzDmCu8yz9B/9TyJaDaw\nu2OsxrD6MgjimCrwmKQbLdaaRiavrtgvmlhOSAo/OQKBgQD0QHxYEdYF7mKGeKD8\nKjG1GbAWcZw5Xd0hcQfTT3qVwK+4d2v3V0qFy7viNIVdnsGJHeeFup6EWBBgS7GU\nIvsdCLyt3Su55Hqyv45Aqfz2vpTefOybpdQn3X62Hwvg3PZs4j5Gdo709/hje7at\nGYv4srqKW0eiAeNBAejzdTEN2wKBgQDU++MW0gRHgviR3P6JQvJXRu8QUpTPbu+e\nA7d8uOopTAPcUDT9a6pOzbw9GKd5SdJ4UabmVpkqkO6SJ/Tbd2G0dIQ/sxjKSTc4\ncXq6n8grNjiByIggstd5t4jnQvicVF8etLvkrkgWAarirOf8f6/mTu9ChqRh4h5K\nK48QOba9XwKBgFs/F/TCvQS8OJxpxiJOFQHF1e2chbM8qJaMplK/t1jogfzUyEW/\nm3x+TvNDkasW2tBBlrNzszJXv85pmK5xnwQKtonxPRuWCmxqeVcY6gK30d+IJdBD\n1A0MhwC8enCHu5uTrZYfRmqnlGh92BG0oIDJLDzxusIAGIi5kPAakLfPAoGAb3gV\ndlAcpUDKz6yWG0jKhRs+65ANCjPJfS38zm4JP+vk6V2hHjFHRU8wAdnxbO1SFl7F\ntzADod+QvTXkVSi6HjQNMzmM8/I10Hiz/xC5NsR99o75kAOJ+s4v/Ll0XH1b+zok\nTJ9aYwokYdaU4/YAHc2aM3s8dW5e4/rAOYG7PokCgYEAo9soCw5Wdkbn2aVxtx+z\ny1eK+lyLJ6/qai6Aj3BFJT9gUcQ2AKpGj6KTlhl7SF9YwPLuYxeyuI+KJ+3GDqUW\n4QEPZaEURwQS/XLwPonWW10emXG48w3uvtdueWkfIgTBKJcnpHx3/CJFDgn1vLYu\n6+VmiqSuVFZ/lz0/jcJECdI=\n-----END PRIVATE KEY-----\n"),

    /*
    |--------------------------------------------------------------------------
    | JWT time to live
    |--------------------------------------------------------------------------
    |
    | Specify the length of time (in minutes) that the token will be valid for.
    | Defaults to 1 hour
    |
    */

    'ttl' => 60,

    /*
    |--------------------------------------------------------------------------
    | Refresh time to live
    |--------------------------------------------------------------------------
    |
    | Specify the length of time (in minutes) that the token can be refreshed
    | within. I.E. The user can refresh their token within a 2 week window of
    | the original token being created until they must re-authenticate.
    | Defaults to 2 weeks
    |
    */

    'refresh_ttl' => 20160,

    /*
    |--------------------------------------------------------------------------
    | JWT hashing algorithm
    |--------------------------------------------------------------------------
    |
    | Specify the hashing algorithm that will be used to sign the token.
    |
    | See here: https://github.com/namshi/jose/tree/2.2.0/src/Namshi/JOSE/Signer
    | for possible values
    |
    */

    'algo' => 'HS256',

    /*
    |--------------------------------------------------------------------------
    | User Model namespace
    |--------------------------------------------------------------------------
    |
    | Specify the full namespace to your User model.
    | e.g. 'Acme\Entities\User'
    |
    */

    'user' => 'App\User',

    /*
    |--------------------------------------------------------------------------
    | User identifier
    |--------------------------------------------------------------------------
    |
    | Specify a unique property of the user that will be added as the 'sub'
    | claim of the token payload.
    |
    */

    'identifier' => 'id',

    /*
    |--------------------------------------------------------------------------
    | Required Claims
    |--------------------------------------------------------------------------
    |
    | Specify the required claims that must exist in any token.
    | A TokenInvalidException will be thrown if any of these claims are not
    | present in the payload.
    |
    */

    'required_claims' => ['iss', 'iat', 'exp', 'nbf', 'sub', 'jti'],

    /*
    |--------------------------------------------------------------------------
    | Blacklist Enabled
    |--------------------------------------------------------------------------
    |
    | In order to invalidate tokens, you must have the the blacklist enabled.
    | If you do not want or need this functionality, then set this to false.
    |
    */

    'blacklist_enabled' => env('JWT_BLACKLIST_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Providers
    |--------------------------------------------------------------------------
    |
    | Specify the various providers used throughout the package.
    |
    */

    'providers' => [

        /*
        |--------------------------------------------------------------------------
        | User Provider
        |--------------------------------------------------------------------------
        |
        | Specify the provider that is used to find the user based
        | on the subject claim
        |
        */

        'user' => 'Tymon\JWTAuth\Providers\User\EloquentUserAdapter',

        /*
        |--------------------------------------------------------------------------
        | JWT Provider
        |--------------------------------------------------------------------------
        |
        | Specify the provider that is used to create and decode the tokens.
        |
        */

        'jwt' => 'Tymon\JWTAuth\Providers\JWT\NamshiAdapter',

        /*
        |--------------------------------------------------------------------------
        | Authentication Provider
        |--------------------------------------------------------------------------
        |
        | Specify the provider that is used to authenticate users.
        |
        */

        'auth' => 'Tymon\JWTAuth\Providers\Auth\IlluminateAuthAdapter',

        /*
        |--------------------------------------------------------------------------
        | Storage Provider
        |--------------------------------------------------------------------------
        |
        | Specify the provider that is used to store tokens in the blacklist
        |
        */

        'storage' => 'Tymon\JWTAuth\Providers\Storage\IlluminateCacheAdapter',

    ],

];
