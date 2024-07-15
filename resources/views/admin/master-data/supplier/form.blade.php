<form action="javascript:void(0)" id="form-md-supplier" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <ul class="nav nav-tabs mb-3" id="supplier" role="tablist">
            @foreach (['primary' => 'Info Utama', 'secondary' => 'Info Lainya'] as $id => $label)
                <li class="nav-item">
                    <a class="nav-link{{ $loop->first ? ' active' : '' }}" id="{{ $id }}-tab" data-toggle="tab"
                        href="#{{ $id }}" role="tab" aria-controls="{{ $id }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $label }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="supplierContent">
            <div class="tab-pane fade active show" id="primary" role="tabpanel" aria-labelledby="primary-tab">
                <input type="hidden" id="id" name="id" {{ $type == 'detail' ? 'readonly' : '' }}
                    value="{{ $data->id ?? '' }}">
                <div class="row">
                    @php
                        $fields = [
                            ['label' => 'Kode', 'id' => 'code', 'type' => 'text', 'col' => 4],
                            ['label' => 'Nama', 'id' => 'name', 'type' => 'text', 'col' => 8],
                            ['label' => 'Tipe Supplier', 'id' => 'type', 'type' => 'text', 'col' => 4],
                            ['label' => 'Spesialisasi', 'id' => 'specialization', 'type' => 'text', 'col' => 4],
                            ['label' => 'Pemilik', 'id' => 'owner', 'type' => 'text', 'col' => 4],
                            ['label' => 'Email', 'id' => 'email', 'type' => 'text', 'col' => 6],
                            ['label' => 'No. Telepon', 'id' => 'phone', 'type' => 'text', 'col' => 6],
                            ['label' => 'Alamat', 'id' => 'address', 'type' => 'textarea', 'col' => 12],
                        ];
                    @endphp
                    @foreach ($fields as $field)
                        <div class="col-md-{{ $field['col'] }}">
                            <label>{{ $field['label'] }}: </label>
                            <div class="form-group">
                                @if ($field['type'] === 'textarea')
                                    <textarea id="{{ $field['id'] }}" name="{{ $field['id'] }}" class="form-control form-control-sm bg-transparent"
                                        {{ $type == 'detail' ? 'readonly' : '' }}>{{ $data->{$field['id']} ?? '' }}</textarea>
                                @else
                                    <input type="{{ $field['type'] }}" id="{{ $field['id'] }}"
                                        name="{{ $field['id'] }}" class="form-control form-control-sm bg-transparent"
                                        {{ $type == 'detail' ? 'readonly' : '' }}
                                        value="{{ $data->{$field['id']} ?? '' }}">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="secondary" role="tabpanel" aria-labelledby="secondary-tab">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et.
            </div>
        </div>
    </div>
    @if ($type == 'detail')
        <hr>
        <div class="card-body pt-0" id="list-detail-md-supplier">
            <table class="table datatables table-bordered table-hover table-data" id="table-detail-md-supplier">
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
                                                    <td>{{ $values['old'] }}</td>
                                                    <td>{{ $values['new'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    No changes
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <div class="modal-footer">
        <button type="submit" id="add-md-supplier" class="btn btn-sm btn-success text-white mr-1"
            onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
        <button type="submit" id="edit-md-supplier" class="btn btn-sm btn-warning text-white mr-1"
            onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
    </div>
</form>
