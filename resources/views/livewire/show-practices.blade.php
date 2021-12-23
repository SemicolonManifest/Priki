<div>
    <div class="w-100 is-flex is-align-items-center is-justify-content-right pb-3">
        <span>Nouveau de &nbsp;</span>
        <input wire:model="days"
               wire:change="onLastUpdates"
               class="input is-inline"
               type="number"
               size="3"
               name="days"
               min="0"
        >&nbsp;jours
    </div>
    <div class="columns is-multiline is-flex is-justify-content-center">
        @if(!isset($practices[0]))
            <span>Aucune pratique à afficher ici</span>
        @endif
        @foreach ($practices as $practice)
            <div class="column is-half is-flex">
                <a href="/practices/{{$practice->id}}">
                    <article class="message is-info">
                        <div class="message-header is-flex is-justify-content-space-between">
                            <div>
                                {{$practice->domain->name}}
                            </div>
                            <div>
                                {{\Carbon\Carbon::parse($practice->updated_at)->isoFormat("D MMMM YYYY") }}
                            </div>
                        </div>
                        <div class="message-body">
                            {{$practice->description}}
                            <br>
                            <br>

                        </div>
                        <div class="message-footer"></div>
                    </article>
                </a>
            </div>

        @endforeach
    </div>
</div>


