<div>
    <div class="p-6" wire:ignore>
        <input wire:model="idCalendar" type="text" hidden>
        <div class="calendar"></div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        document.querySelectorAll('.calendar').forEach(element => {
            if(element.previousElementSibling.value == @this.idCalendar) {
                let calendar = new FullCalendar.Calendar(element, {
                    headerToolbar: {
                        left: 'prev,next today',
                        right: 'title'
                    },
                    validRange: function(nowDate) {
                        return {
                            start: nowDate.setDate(nowDate.getDate() + 1)
                        };
                    },
                    locale: '{{ config('app.locale') }}',
                    selectable: true,
                    selectOverlap: () => {
                        return false;
                    },
                    events: JSON.parse(@this.events)
                });             
                calendar.id = @this.idCalendar; 
                calendar.render();
            };
        });
    });
</script>
@endpush