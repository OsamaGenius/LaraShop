<div class="modal fade" id="{{$target}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Confirm Deleting')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>{{__('Are you sure you want to proceed deleting?')}}</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('No')}}</button>
        <form id="{{$id}}" action="" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">{{__('Yes')}}</button>
        </form>
        </div>
    </div>
    </div>
</div>
