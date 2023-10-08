<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalBooking extends Component
{

    public $user, $labs, $timeMappings;
    /**
     * Create a new component instance.
     */
    public function __construct($user, $labs, $timeMappings)
    {
        $this->user = $user;
        $this->labs = $labs;
        $this->timeMappings = $timeMappings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-booking');
    }
}
