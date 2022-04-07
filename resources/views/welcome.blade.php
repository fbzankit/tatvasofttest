<html>
    <body>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
        <table id="TABLE1" language="javascript"  >
		
<tr>
	<td colspan="2">
		<strong>Event List Page</strong>
	</td>
    <td>
        <a href="{{ url('/addEvent') }}">Add Event</a>
    </td>
</tr>

<tr>
	<td colspan="2">
		<table>
		<tr>
			<td width="20">
				<strong>#</strong>
			</td>
			<td width="150">
				<strong>Title</strong>
			</td>
			<td width="250">
				<strong>Dates</strong>
			</td>
			<td width="250">
				<strong>Occurrence</strong>
			</td>
			<td width="200">
				<strong>Actions</strong>
			</td>
		</tr>
        @foreach ($events as $key => $event)
        <tr>
			<td>
				{{ ++$key }}
			</td>
			<td>
				{{ $event->title }}
			</td>
			<td>
				{{ $event->startDate.' to '.$event->endDate }}
			</td>
			<td>
                @if ($event->repeatType == '1')
                    {{ $gap = '' }}
                     @if ($event->gap == '1')
                         {{ $gap = 'Every' }}
                     @endif
                     @if ($event->gap == '2')
                         {{ $gap = 'Every other' }}
                     @endif
                     @if ($event->gap == '3')
                         {{ $gap = 'Every Third' }}
                     @endif
                     @if ($event->gap == '4')
                         {{ $gap = 'Every Fourth' }}
                     @endif
                     {{ $type = '' }}
                    @if ($event->type == 'day')
                        {{ $type = 'Day' }}
                    @endif
                    @if ($event->type == 'week')
                        {{ $type = 'Week' }}
                    @endif
                    @if ($event->type == 'month')
                        {{ $type = 'Month' }}
                    @endif
                    @if ($event->type == 'year')
                        {{ $type = 'Year' }}
                    @endif
                @endif
                @if ($event->repeatType == '2')
                    {{-- {{ dd($event) }} --}}
                    {{ $gap2 = '' }}
                     @if ($event->gap == '1')
                         {{ $gap2 = 'Every' }}
                     @endif
                     @if ($event->gap == '2')
                         {{ $gap2 = 'Every other' }}
                     @endif
                     @if ($event->gap == '3')
                         {{ $gap2 = 'Every Third' }}
                     @endif
                     @if ($event->gap == '4')
                         {{ $gap2 = 'Every Fourth' }}
                     @endif

                    {{ $day = '' }}
                    @if ($event->day == 'sun')
                        {{ $day = 'Sunday' }}
                    @endif
                    @if ($event->day == 'mon')
                        {{ $day = 'monday' }}
                    @endif
                    @if ($event->day == 'tue')
                        {{ $day = 'Tuesday' }}
                    @endif
                    @if ($event->day == 'wed')
                        {{ $day = 'Wednesday' }}
                    @endif
                    @if ($event->day == 'thu')
                        {{ $day = 'Thursday' }}
                    @endif
                    @if ($event->day == 'fri')
                        {{ $day = 'Friday' }}
                    @endif
                    @if ($event->day == 'say')
                        {{ $day = 'Saturday' }}
                    @endif

                     {{ ' of '. $type2 = '' }}
                    @if ($event->type == '3month')
                        {{ $type2 = '3 Months' }}
                    @endif
                    @if ($event->type == '4month')
                        {{ $type2 = '4 Months' }}
                    @endif
                    @if ($event->type == '6month')
                        {{ $type2 = '6 Months' }}
                    @endif
                    @if ($event->type == 'month')
                        {{ $type2 = 'Month' }}
                    @endif
                    @if ($event->type == 'year')
                        {{ $type2 = 'Year' }}
                    @endif

                @endif
			</td>
			<td>
                <a href="{{ url('/viewEvent/'.$event->id) }}">View</a>
                <a href="{{ url('/editEvent/'.$event->id) }}">Edit</a>
                <a href="{{ url('/deleteEvent/'.$event->id) }}">Delete</a>
			</td>
		</tr>
        @endforeach
		
		</table>
	</td>
</tr>
<tr>
	<td colspan=2>
		<hr>
	</td>
</tr>

        </table>
    </body>
</html>