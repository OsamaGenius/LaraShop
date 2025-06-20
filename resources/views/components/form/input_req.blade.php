<div class="mb-3">
    @if ($type == 'number')

        <div class="form-floating mb-1">
            <input 
                type="{{$type}}" 
                name="{{$known}}" 
                id="{{$known}}" 
                class="form-control @error("$known") is-invalid @enderror" 
                min="0" 
                value="{{$value}}"
                placeholder="{{$placeholder}}" 
                required="required" 
                autocomplete="off"
            >
            <label for="name">{{$placeholder}}</label>
        </div>    

    @elseif ($type == 'hidden')
    
        <div class="form-floating mb-1">
            <input 
                type="{{$type}}" 
                name="{{$known}}" 
                id="{{$known}}" 
                class="form-control @error("$known") is-invalid @enderror" 
                placeholder="{{$placeholder}}" 
                value="{{$value}}"
                required="required" 
                autocomplete="off"
                disabled = "disabled"
            >
            <label for="name">{{$placeholder}}</label>
        </div>

    @else

        <div class="form-floating mb-1">
            <input 
                type="{{$type}}" 
                name="{{$known}}" 
                id="{{$known}}" 
                class="form-control @error("$known") is-invalid @enderror" 
                placeholder="{{$placeholder}}" 
                value="{{$value}}"
                required="required" 
                autocomplete="off"
            >
            <label for="name">{{$placeholder}}</label>
        </div>

    @endif

    @error("$known")
        <div class="alert alert-danger px-2 py-1">{{$message}}</div>
    @enderror
</div>