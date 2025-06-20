<div class="mb-3">

    <div class="form-floating mb-1">
        <input 
            type="{{$type}}" 
            name="{{$known}}" 
            id="{{$known}}" 
            class="form-control" 
            placeholder="{{$placeholder}}" 
            value="{{$value}}"
            readonly
            disabled
        >
        <label for="name">{{$placeholder}}</label>
    </div>

    @error("$known")
        <div class="alert alert-danger px-2 py-1">{{$message}}</div>
    @enderror
</div>