<?php
namespace Dewelio\Mail\Support;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification as LaravelNotification;

class Notification extends LaravelNotification implements ShouldQueue {
    use Queueable;
}
