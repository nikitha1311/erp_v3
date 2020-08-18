@extends('layouts.app')
@section('head')

@endsection
@section('content')
    <div>
        <div class="d-flex justify-content-around">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <label for="">Dates</label>
                    <div class="form-group m-form__group">
                        <div class="input-group">
                            <input required type="text" class="form-control date" id="dateInput" name="date"
                                   placeholder="Date Range" autocomplete="off"
                                   value="{{ old('date') }}">
                            <div class="input-group-addon">
                                <button class="input-group-btn" onclick="clearDate()">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group m-form__group">
                        <label for="">Customers</label>
                        <select name="customer_id[]" id="customer_id" class="form-control select" multiple>
                            @foreach(billedOn() as $billedOn)
                                <option value="{{ $billedOn->id }}">
                                    {{ $billedOn->code }}-{{ $billedOn->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <br>
                    <div>
                        <button class="btn btn-success" onclick="invoiceFilter();">
                            <i class="fa fa-filter">
                                Filter
                            </i>
                        </button>
                        <button class="btn btn-success" onclick="refresh()">
                            <i class="fa fa-refresh"></i>
                            Refresh
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                {{ ucfirst(request()->path()) }} <small></small>

            </h5>
            <div>
                <ul>
                    <li>

                    </li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover m-table" id="invoice_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Number</th>
                    <th>Total</th>
                    <th>Code</th>
{{--                    <th>Status</th>--}}
                </tr>
                </thead>
            <tbody>
            @foreach($invoices as $invoice )
                <tr>
                    <td>
                        <a href="{{ route('invoices.show', $invoice->id) }}">

                        {{ $invoice->id }}
                        </a>
                    </td>
                    <td>
                        {{ $invoice->date }}
                    </td>
                    <td>
                        {{ $invoice->number }}
                    </td>
                    <td>
                        {{ $invoice->total }}
                    </td>
                    <td>
                        {{ $invoice->customer->code }}
                    </td>
{{--                    <td>--}}
{{--                        {{ $invoice->status() }}--}}
{{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
            </table>

        </div>
        <div class="panel-footer">

        </div>
    </div>

@endsection
@section('scripts')

    <script>
        $(document).ready( function () {
            $('#invoice_table').DataTable();
        });
        initTable('{{ url(request()->path()) }}');

        $('#dateInput').daterangepicker({
            timePicker: false,
            locale: {
                format: "DD-MM-YYYY"
            }
        });
        $('.select').select2({});
        clearDate();

        function clearDate() {
            $('#dateInput').val('');
        }

        function refresh() {
            clearDate();
            $('#customer_id').val(null).trigger('change');
            var url = '{{ url(request()->path()) }}';
            initTable(url);
        }

        function invoiceFilter() {
            var url = {
                url: "{{ url(request()->path()) }}",
                data: {
                    customer_id: $('#customer_id').val(),
                    date: $('#dateInput').val()
                }
            };
            initTable(url);
        }

    </script>
@endsection


