@section('title', __('home.title'))
<x-layout-admin>
    {{ $logs->onEachSide(2)->links() }}
    <table class="table fs-6">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">CorrelationId</th>
            <th scope="col">ObjectId</th>
            <th scope="col">Class</th>
            <th scope="col">Payload</th>
            <th scope="col">Timestamp</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <th scope="row">{{$log->id}}</th>
                <td>
                    {{$log->type}}
                </td>
                <td>{{$log->correlation_id}}</td>
                <td>{{$log->object_id}}</td>
                <td>{{$log->class}}</td>
                <td>{{$log->payload}}</td>
                <td>{{$log->timestamp}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $logs->onEachSide(2)->links() }}
    <script>
      setTimeout(() => {
        location.reload();
      }, 5000);
    </script>
</x-layout-admin>
