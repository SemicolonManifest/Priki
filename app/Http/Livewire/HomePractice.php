<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class HomePractice extends Component
{
    public string|int $days;
    public Collection $practices;

    public function mount()
    {
        $this->days = 5;
        $this->getLastUpdates();
    }

    public function render()
    {
        return view('livewire.home-practice');
    }
    public function onLastUpdates()
    {
        $this->getLastUpdates();
    }

    private function getLastUpdates(): void
    {
        $allPublished = Practice::allPublished();
        $lastUpdates = Practice::lastUpdates(intval($this->days));
        $this->practices = $allPublished->intersect($lastUpdates);
    }
}
