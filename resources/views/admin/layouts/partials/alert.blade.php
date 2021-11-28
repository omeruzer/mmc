@if (session()->has('message'))
    <div class="container col-lg-12">
        <div class="alert alert-{{ session('message_type') }}"> 
            {{ session('message') }}
        </div>
    </div>
    
@endif