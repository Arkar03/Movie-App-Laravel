# Frontend

## Config

1. Run $- `composer install` for both front and back.
2. Run $- `npm i` for both front and back.
3. Run $- `php artisan migrate`.
4. Run $- `php artisan db:seed --class=MovieSeeder`
5. Run $- `php artisan serve`.

## Env Setup

1. Rename or copy `.env.example` file to `.env`
1. Set your `TMDB_TOKEN` in your `.env` file. You can get an API key [here](https://www.themoviedb.org/documentation/api). Make sure to use the "API Read Access Token (v4 auth)" from the TMDb dashboard.
1. Set your `GOOGLE_CLIENT_ID`and your `GOOGLE_CLIENT_SECRET` in your `.env` file. You can get an API key [here](https://console.cloud.google.com/).
1. Set your `STRIPE_SK` and your `STRIPE_PK` in your `.env` file. You can get an API key [here](https://dashboard.stripe.com/test/apikeys)
