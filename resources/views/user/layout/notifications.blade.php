@foreach($notifications as $notification)
<div class="menu-item px-5">
    <a href="{{route('user.read_notification', $notification->ref_id)}}" class="menu-link px-5">{{$notification->title_ar}}</a>
</div>
@endforeach