@if(session()->has('message'))
    <div class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-48 py-3 rounded">
        <p>{{session('message')}}</p>
    </div>
@endif
