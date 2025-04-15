<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ListingApproved extends Notification
{
    use Queueable;

    protected $property;

    public function __construct($property)
    {
        $this->property = $property;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Listing Has Been Approved!')
            ->line("Your property listing '{$this->property->title}' has been approved.")
            ->action('View Listing', url("/properties/{$this->property->id}"))
            ->line('Thank you for using Real Estate Marketplace!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Your property '{$this->property->title}' has been approved.",
            'property_id' => $this->property->id,
        ];
    }
}
