<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class ShowPractices extends Component
{
    public string $domainSlug;
    public string|int $days;
    public Collection $practices;

    public function mount()
    {
        $this->days = 5;
        $this->getLastUpdates();
    }

    public function render()
    {
        return view('livewire.show-practices');
    }
    public function onLastUpdates()
    {
        $this->getLastUpdates();
    }

    private function getLastUpdates(): void
    {
        $practices = Practice::allPublished()->where('updated_at','>=',Carbon::now()->subDays($this->days));

        if("all" != $this->domainSlug){
            $practices->whereHas('domain',fn($domain)=>$domain->where('slug',$this->domainSlug));
        }

        $this->practices = $practices->get();
    }
}
