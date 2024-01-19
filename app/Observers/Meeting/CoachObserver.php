<?php

namespace App\Observers\Meeting;

use App\Models\Meeting\Coach;
use Exception;
use Filament\Notifications\Notification;
use Webpatser\Uuid\Uuid;

class CoachObserver
{
    /**
     * @throws Exception
     */
    public function creating(Coach $coach): void
    {
        $coach->user_id = auth()->id();
        $coach->hourly_price = 100000;
        $coach->user_name = Uuid::generate(4);

    }

    public function created(Coach $coach): void
    {

        Notification::make()
            ->title('your request is send to process')
            ->sendToDatabase(auth()->user());

    }
}
