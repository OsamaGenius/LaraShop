<div class="mb-3">

    <div class="form-floating mb-1">
        <select name="{{$known}}" id="{{$known}}" class="form-select @error("$known") is-invalid @enderror" aria-placeholder="{{$placeholder}}">
            {{$slot}}
        </select>
        <label for="{{$known}}">{{$placeholder}}</label>
    </div>
    
    @error("$known")
        <div class="alert alert-danger px-2 py-1">{{$message}}</div>
    @enderror

</div>