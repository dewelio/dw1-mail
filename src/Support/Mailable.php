<?php
namespace Dewelio\Mail\Support;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable as LaravelMailable;
use Illuminate\Queue\SerializesModels;

class Mailable extends LaravelMailable implements ShouldQueue {
    use Queueable, SerializesModels;
}
