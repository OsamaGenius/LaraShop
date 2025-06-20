<div class="mb-3">

    <div class="upload-area mb-1 @error('file') is-invalid @enderror" id="uploadArea">
        <div id="holder">
            <i class="fas fa-cloud-arrow-up fa-5x mb-3"></i>
            <p class="mb-1">Drag & drop your image here or <span id="browseBtn">browse</span></p>
            <span class="note">Upload any image file from your storage</span>
        </div>
        <input type="file" id="fileInput" name="file" accept="{{$accept}}" hidden />
        <div id="preview"></div>
    </div>

    @error('file')
        <div class="alert alert-danger px-2 py-1">{{$message}}</div>
    @enderror

</div>