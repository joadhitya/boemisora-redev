<form action="javascript:void(0)" id="form-md-what-to-do" enctype="multipart/form-data">
    @csrf

    <div class="modal-body">
        <input type="hidden" id="id" name="id" value="{{ $data ? $data->id : '' }}">
        @php
            $fields = [
                ['label' => 'Nama', 'id' => 'name', 'type' => 'text', 'col' => 12],
                ['label' => 'Gambar', 'id' => 'image', 'type' => 'file', 'col' => 12, 'class' => 'my-pond'],
            ];
        @endphp
        <div class="row">
            @foreach ($fields as $field)
                <div class="col-md-{{ $field['col'] }}">
                    <label>{{ $field['label'] }}: </label>
                    @if ($type == 'detail' && $field['type'] == 'file')
                        <img src="{{ asset($data->image) }}" alt="{{ $data->name }}"
                            class="card-img-top img-fluid rounded">
                    @else
                        <div class="form-group">
                            <input type="{{ $field['type'] }}" id="{{ $field['id'] }}" name="{{ $field['id'] }}"
                                class="{{ $field['type'] == 'file' ? 'form-control-file my-pond' : 'form-control form-control-sm bg-transparent' }}"
                                {{ $type == 'detail' ? 'readonly' : '' }} value="{{ $data->{$field['id']} ?? '' }}">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    @if ($type == 'detail')
        <x-log-activity-table :logActivity="$logActivity" :target="$target" />
    @endif
    <div class="modal-footer">
        <button type="submit" id="add-md-what-to-do" class="btn btn-sm btn-success text-white mr-1"
            onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
        <button type="submit" id="edit-md-what-to-do" class="btn btn-sm btn-warning text-white mr-1"
            onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
    </div>
</form>
