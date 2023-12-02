<?php

namespace App\Application\Listeners;

use App\Application\Events\RecipeCreated;
use App\Infrastructure\Mail\RecipeNotifyEmail;
use Illuminate\Support\Facades\Mail;

class SendNewRecipeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct(RecipeCreated $event)
    {
        $recipe = $event->recipe;

        $title = $recipe->title;
        $name = $recipe->user()->name;
        $email = $recipe->user()->email;

        Mail::to($email)->send(new RecipeNotifyEmail($name, $title));
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
