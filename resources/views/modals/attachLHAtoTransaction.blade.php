@component('layouts.modal')
    @slot('id') attachLHA @endslot
    @slot('title') Attach LHA to Transaction @endslot
    @slot('footer')  @endslot

    <form action="{{ url("transactions/{$transaction->id}/attach-lha") }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group m-form__group">
            <label for="lha_id">Loading Hire Agreement Number</label>
            <select required type="text" class="form-control" id="attach_lha" name="lha_id" style="width: 100%;">
            </select>
            @if($errors->has('lha_id'))
                <span class="text-danger">{{ $errors->first('lha_id') }}</span>
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
        $('#attach_lha').select2({
            minimumInputLength: 3,
            maximumSelectionLength: 1,
            ajax: {
                url: '/select2/lhas-for-transactions',
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
                                text: moment(item.date).format('ll') + " - " + item.number + " - " + item.truck_number + " - " + item.truck_type.name,
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