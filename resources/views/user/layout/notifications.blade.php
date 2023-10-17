@foreach($notifications as $notification)
<div class="menu-item px-5">
    <a href="#" onclick="event.preventDefault(); document.getElementById('read').submit();" class="menu-link px-5">{{$notification->title_ar}}</a>
</div>
<form method="POST" id="read" action="{{route('user.read_notification', $notification->id)}}" style="display: none;">
            <input type="hidden" name="notification_id" value="{{$notification->id}}">
            @csrf
        </form>
@endforeach