<x-layout>
    <div class="flex flex-col text-center">
        <div class="border border-2 border-black">{{$ip}}</div>
        <div class="border border-2 border-black">{{$location}}</div>
        @switch($weather)
            @case('Overcast')
                <div class="border border-2 border-black">
                    {{$weather}}
                    <i class="fa-solid fa-cloud-sun"></i>
                </div>
                @break
            @case('Partially cloudy')
                <div class="border border-2 border-black">
                    {{$weather}}
                    <i class="fa-solid fa-cloud-arrow-down"></i>
                </div>
                @break
            @case('Rain')
                <div class="border border-2 border-black">
                    {{$weather}}
                    <i class="fa-solid fa-cloud-rain"></i>
                </div>
                @break
            @case('Clear')
                <div class="border border-2 border-black">
                    {{$weather}}
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
                @break
            @default
                <div class="border border-2 border-black">
                    {{$weather}}
                </div>
        @endswitch
    </div>
        <table id="table_id" class="results-table bg-white text-center">
            <thead>
            <tr>
                <th>IP</th>
                <th>Date</th>
                <th>Preciptype</th>
                <th>Conditions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    <div class="mapouter flex justify-center">
        <div class="gmap_canvas">
            <iframe width="1800" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{$location}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
            </iframe>
        </div></div>
</x-layout>

<script>
    let ip = "{{$ip}}";
</script>

