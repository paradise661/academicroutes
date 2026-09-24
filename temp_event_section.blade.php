                    @if(isset($event) && $event && $event->eventDates->isNotEmpty())
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="event_location">Event Location *</label>
                        <select class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="event_location" name="event_location" required>
                            <option value="">Select Location</option>
                            @if($event->eventDates->count() > 0)
                                @foreach($event->eventDates->sortBy('date') as $eventDate)
                                    <option value="{{ $eventDate->location }}" data-date="{{ $eventDate->date }}" data-time="{{ $eventDate->time }}">
                                        {{ $eventDate->location }} ({{ \Carbon\Carbon::parse($eventDate->date)->format('j M Y') }}, {{ $eventDate->time }})
                                    </option>
                                @endforeach
                            @else
                                <option value="{{ $event->lcoation }}" data-date="{{ $event->date }}" data-time="{{ $event->time }}">
                                    {{ $event->lcoation }} ({{ \Carbon\Carbon::parse($event->date)->format('j M Y') }}, {{ $event->time }})
                                </option>
                            @endif
                        </select>
                        @error('event_location')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" id="event_date" name="event_date">
                    <input type="hidden" id="event_time" name="event_time">
                    @elseif(isset($event) && $event)
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="event_location">Event Location *</label>
                        <select class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="event_location" name="event_location" required>
                            <option value="">Select Location</option>
                            <option value="{{ $event->lcoation }}" data-date="{{ $event->date }}" data-time="{{ $event->time }}">
                                {{ $event->lcoation }} ({{ \Carbon\Carbon::parse($event->date)->format('j M Y') }}, {{ $event->time }})
                            </option>
                        </select>
                        @error('event_location')
                            <div style="color: red; font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" id="event_date" name="event_date">
                    <input type="hidden" id="event_time" name="event_time">
                    @else
                    <div class="w-full">
                        <label class="block text-lg font-medium mb-2" for="university">Choose University</label>
                        <select class="block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" id="university" name="university">
                            <option value="" disabled selected>Choose a university</option>
                            @foreach ($university as $universitys)
                                <option value="{{ $universitys->name }}">
                                    {{ $universitys->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif