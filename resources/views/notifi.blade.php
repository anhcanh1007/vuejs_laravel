<h1>hihi anh canh test</h1>

@foreach (auth()->user()->notifications as $notification)
    <p>{{ $notification->data['name'] }}</p>
@endforeach

@foreach ($transaction->notifications as $notification)
    <p>{{ $notification->data['name'] }}</p>
    <p>{{ $notification->data['amount'] }}</p>
@endforeach
