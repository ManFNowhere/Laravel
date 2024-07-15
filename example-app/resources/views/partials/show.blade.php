
<div id="weatherContent">
    @if(count($data) > 0)
        @php
            $times = array_keys($data[array_key_first($data)]);
        @endphp

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Time</th>
                    @foreach($data as $parameter => $values)
                        <th>{{ ucwords($parameter) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($times as $time)
                    <tr>
                        <td>{{ $time }}</td>
                        @foreach($data as $parameter => $values)
                            <td>{{ $values[$time] ?? 'N/A' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No data available.</p>
    @endif
</div>
