<x-layout>
    <div class="flex justify-center">Location From IP</div>
    <div class="px-3 text-center">
        <form method="POST" action="/formData" class="mt-2 border border-2 border-black">
            @csrf
            <div>
                <label>IP Address</label>
            </div>
            <div id="ip">
                <input type="text"
                       name="ip"
                       value="{{$_SERVER['REMOTE_ADDR']}}"
                       class="font-semibold text-sm border border-2 border-black text-center">
            </div>
            <div>
                <button type="submit" class="bg-blue-400 text-white rounded py-1 mt-2 px-4 mb-2 hover:bg-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-layout>
