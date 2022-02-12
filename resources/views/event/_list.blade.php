@forelse ($data as $key=>$event)
<tr>
    <th scope="row">{{$key + 1}}</th>
    <td>{{$event->title}}</td>
    <td>{{date('m-d-Y', strTotime($event->start_date))}} To {{date('m-d-Y', strTotime($event->end_date))}}</td>
    @if($event->evntsRecurrence->recurrence_id == 1)
        <td>{{$event->evntsRecurrence->repeat_on}} {{$event->evntsRecurrence->skip_day}}</td>
    @else
    <td>{{$event->evntsRecurrence->repeat_index}} {{$event->evntsRecurrence->repeat_day}} {{$event->evntsRecurrence->repeat_criteria}}</td>
    @endif
    <td>
 
    <a href="javacript:void(0);" onclick="deleteEvent('{{$event->id}}')" class="btn btn-primary">Delete</a>
    </td>
</tr>
@empty
<p>No record found</p>
@endforelse