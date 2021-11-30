<div >
    <div class="w-100 is-flex is-align-items-center is-justify-content-right pb-3">
        <span>Ancien de:&nbsp;</span>
        <input wire:model="days"
               wire:change="onLastUpdates"
               class="input is-inline"
               type="number"
               size="3"
               name="days"
        >&nbsp;jours
    </div>
    <div class="columns is-multiline is-flex is-justify-content-center">
        @foreach ($practices as $practice)
            <div class="column is-half is-flex">
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
            </div>
        @endforeach
    </div>
</div>


