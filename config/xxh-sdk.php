<?php

return array(

    'rest' => [
        /**
         * Rest client environment for selecting services
         * Available: 'production', 'dev'
         */
        'environment' => env('REST_CLIENT_ENV', 'production'),

        /**
         * Debug mode for showing logs
         */
        'debug_mode' => env('APP_DEBUG', false),

        /**
         * Access Token cache time
         * Set 0 to disable cache of access tokens
         */
        'oauth_tokens_cache_minutes' => 10,

        /**
         *  Guzzle Client Config
         */
        'guzzle_client_config' => [
            'verify' => false,
            'timeout' => 29.0,      // Request timeout: 29 secs
        ],

        /**
         * Shared config for services
         */
        'shared_service_config' => [

            'headers' => [
                'User-Agent' => 'xinxihua/1.0',
            ],

            'api_url' => '',

            'oauth2_credentials' => [
                'client_id' => env('REST_CLIENT_ID', ''),
                'client_secret' => env('REST_CLIENT_SECRET', '')
            ],

            'oauth2_access_token_url' => 'oauth2/token',

            'oauth2_grant_types' => [
                'client_credentials' => 'client_credentials',
                'authorization_code' => 'authorization_code',
                'refresh_token' => 'refresh_token',
                'password' => 'password',
            ],

        ],

        /**
         * Default Service
         */
        'default_service_name' => 'api',

        /**
         * Services
         */
        'services' => [

            // environment: dev
            'dev' => [

                'api' => [

                    'base_uri' => env('REST_CLIENT_API_URL', ''),
                    'headers' => [
                        'Accept' => 'application/x.xinxihua.v1+json',
                        'Host' => env('REST_CLIENT_API_HOST', '')
                    ],
                ],

            ],

            // environment: production
            'production' => [

                'api' => [

                    'base_uri' => env('REST_CLIENT_API_URL', ''),
                    'headers' => [
                        'Accept' => 'application/x.xinxihua.v1+json',
                        'Host' => env('REST_CLIENT_API_HOST', '')
                    ],
                ],

            ],

        ],
    ],

    'callback' => [
        'home' => env('AUTH_CALLBACK_HOME_URL', '/callback'),
        'admin' => env('AUTH_CALLBACK_ADMIN_URL', '/admin/callback')
    ],

    'redirect' => [
        'home' => env('AUTH_REDIRECT_HOME_URL', '/home'),
        'admin' => env('AUTH_REDIRECT_ADMIN_URL', '/admin')
    ],

    'agent' => [
        'agent_id' => env('AUTH_AGENT_ID', ''),
        'platform_url' => env('AUTH_PALTFORM_URL', 'https://oa.xinxihua.com'),
        'gateway_url' => env('AUTH_GATEWAY_URL', 'https://oa.xinxihua.com/sso-login'),
        'corp_user_api' => 'auth_user',
        'corp_token_api' => 'corp_tokens',
        'corp_info' => 'auth_corp',
        'token' => env('AUTH_TOKEN', ''),
        'encoding_key' => env('AUTH_ENCODING_KEY', '')
    ],

);
