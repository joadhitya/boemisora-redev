<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LogActivityTable extends Component
{
    public $logActivity;
    public $target;

    public function __construct($logActivity, $target)
    {
        $this->logActivity = $logActivity;
        $this->target = $target;
    }

    public function render(): View|Closure|string
    {
        return view('components.log-activity-table');
    }
}
