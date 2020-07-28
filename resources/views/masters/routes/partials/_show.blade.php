 <div class="panel">
    <div class="panel-header">
        <h5>
            Route Details
        </h5>
        <div>
            <a href="{{ route('routes.edit', [$route->contract_id,$route->id]) }}" class="btn btn-secondary">
                <i class="fa fa-edit mr-2"></i>
                <span>Edit</span>
            </a>
        </div>
    </div>

    <div class="panel-body">
        <div class="form-group">
            @include('masters.routes.partials._form',[
                'route' => $route,
                'disabled' => true
            ])                 
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" disabled value="{{ $route->CreatedBy->name }}" class="form-control" id="created_by" placeholder="Created By">
            </div>      
        </div>
    </div>
</div>