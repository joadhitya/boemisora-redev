<hr>
<div class="card-body pt-0" id="list-detail-">
    <table class="table datatables table-bordered table-hover table-data" id="table-detail-">
        <thead>
            <tr class="text-uppercase">
                <th class="w-5p">No</th>
                <th>User</th>
                <th>Activity</th>
                <th>Waktu</th>
                <th>Perubahan Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logActivity as $key => $la)
                <tr>
                    <td class="w-5p">{{ $key + 1 }}</td>
                    <td>{{ json_decode($la->user)->name }}</td>
                    <td>{{ $la->module }}</td>
                    <td>{{ date('d M Y - H:i:s', strtotime($la->created_at)) }}</td>
                    <td>
                        @if (!empty($la->differences))
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Old Value</th>
                                        <th>New Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($la->differences as $field => $values)
                                        <tr>
                                            <td>{{ $field }}</td>
                                            <td class="text-warning">{{ $values['old'] }}</td>
                                            <td class="text-success">{{ $values['new'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @elseif ($la->old_data == null)
                            <p class="text-success my-0 py-0">Initiate Creation</p>
                        @else
                            No changes
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
