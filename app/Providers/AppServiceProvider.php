<?php

namespace App\Providers;

use App\Http\Resources\Characteristics\CharacteristicResource;
use App\Http\Resources\Product\MiniProductResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Review\ReviewResource;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ProductResource::withoutWrapping();
        MiniProductResource::withoutWrapping();
        ReviewResource::withoutWrapping();
        CharacteristicResource::withoutWrapping();

//        VerifyEmail::toMailUsing(function ($notifiable, $url) {
//            return (new MailMessage)
//                ->subject('Подтвердите вашу почту')
//                ->greeting('Здравствуйте!')
//                ->line('Пожалуйста, подтвердите свой email.')
//                ->action('Подтвердить', $url)
//                ->line('Если вы не регистрировались, просто проигнорируйте это письмо.');
//        });
    }
}
