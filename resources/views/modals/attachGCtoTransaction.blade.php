@component('layouts.modal')
    @slot('id') attachGC @endslot
    @slot('title') Attach GC to Transaction @endslot
    @slot('footer')  @endslot

    <form action="{{ url("transactions/{$transaction->id}/attach-gc") }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group m-form__group">
            <label for="gc_id">GC Number</label>
            <select required type="text" class="form-control" id="gc_id" name="gc_id" style="width: 100%;">
            </select>
            @if($errors->has('gc_id'))
                <span class="text-danger">{{ $errors->first('gc_id') }}</span>
            @endif
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-default">Clear</button>
        </div>
    </form>

@endcomponent

@section('scripts')
    @parent
    <script>
        @if($transaction->isEditable())
        $('#gc_id').select2({
            minimumInputLength: 3,
            maximumSelectionLength: 1,
            ajax: {
                url: '/select2/gcs-for-transactions',
                data: function (params) {
                    var query = {
                        q: params.term,
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: moment(item.date).format('ll') + " - " + item.number ,
                                id: item.id,
                            }
                        })
                    }
                }
            }
        });
        @endif
    </script>
@append