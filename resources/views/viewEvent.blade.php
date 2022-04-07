

<html>
    <body>
        
        <table id="TABLE1" language="javascript"  >
		@php

        $gap = $event->gap;
        $type = $event->type;
        $from_date = $event->startDate;
        $to_date =$event->endDate;

        $from_date = new DateTime($event->startDate);
        $to_date = new DateTime($event->endDate);

        $newData = '';
        $dateArr = [];
        $from_date = ($gap > 1)? $from_date->modify('+'.($gap-1).' day'):$from_date;
        for ($date = $from_date; $date <= $to_date; $date->modify('+'.$gap.' day')) {
            if($type == 'week'){
                if ($date->format('w') == 1) {
                    $dateArr[] = $date->format('Y-m-d');
                }
            }elseif($type == 'day'){
                $dateArr[] = $date->format('Y-m-d');
            }elseif($type == 'month'){
                if ($date->format('d') == 01) {
                    $dateArr[] = $date->format('Y-m-d');
                }
            }elseif($type == 'year'){
                if ($date->format('d') == 01 && $date->format('m') == 01) {
                    $dateArr[] = $date->format('Y-m-d');
                }
            }
        }
        
        @endphp
<tr>
	<td colspan="2">
		<strong>Event View Page</strong>
	</td>
</tr>
			<tr>
                <td>
                    {{ $event->title }}
                </td>
			</tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <table border=1>
                        @php $total = 0 @endphp
                        @foreach($dateArr as $key=>$date)
                        <tr>
                            <td>
                                {{ date('Y-m-d',strtotime($date)) }}
                            </td>
                            <td style="width: 100px">
                                {{ date('l',strtotime($date)) }}
                            </td>
                        </tr>
                        @php  $total = $key+1 @endphp
                        @endforeach
                        
                        
                    </table>
                    </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                   Total Recurrence Event: {{ $total }}
                </td>
            </tr>
</html>