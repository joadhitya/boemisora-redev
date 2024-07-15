<form action="javascript:void(0)" id="form-md-social-media" enctype="multipart/form-data">
    @csrf

    <div class="modal-body">
        <input type="hidden" id="id" name="id" value="{{ $data ? $data->id : '' }}">
        @php
            $fields = [
                ['label' => 'Nama', 'id' => 'name', 'type' => 'text', 'col' => 12],
                [
                    'label' => 'Type',
                    'id' => 'type',
                    'type' => 'select',
                    'col' => 6,
                    'options' => [
                        ['value' => '', 'text' => '--Pilih Tipe--'],
                        ['value' => 'icon', 'text' => 'Icon'],
                        ['value' => 'image', 'text' => 'Image'],
                    ],
                ],
                [
                    'label' => 'Icon',
                    'id' => 'icon',
                    'type' => 'select',
                    'col' => 6,
                    'options' => [
                        ['value' => '', 'text' => '--Pilih Ikon Social Media--'],
                        ['value' => 'fab fa-instagram', 'text' => 'Instagram'],
                        ['value' => 'fab fa-facebook', 'text' => 'Facebook'],
                        ['value' => 'fab fa-twitter', 'text' => 'Twitter'],
                        ['value' => 'fab fa-youtube', 'text' => 'Youtube'],
                        ['value' => 'far fa-envelope', 'text' => 'Email'],
                        ['value' => 'fa fa-phone', 'text' => 'Phone'],
                    ],
                ],
                ['label' => 'Link', 'id' => 'link', 'type' => 'text', 'col' => 12],
                ['label' => 'Logo', 'id' => 'image', 'type' => 'file', 'col' => 12, 'class' => 'my-pond'],
            ];
        @endphp
        <div class="row">

            @foreach ($fields as $field)
                <div class="col-md-{{ $field['col'] }}">
                    <label>{{ $field['label'] }}: </label>
                    <div class="form-group">
                        @if ($field['type'] === 'select')
                            <select id="{{ $field['id'] }}" name="{{ $field['id'] }}"
                                class="form-control form-control-sm bg-transparent">
                                @foreach ($field['options'] as $option)
                                    <option value="{{ $option['value'] }}">
                                        {{ $option['text'] }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <input type="{{ $field['type'] }}" id="{{ $field['id'] }}" name="{{ $field['id'] }}"
                                class="{{ $field['type'] == 'file' ? 'form-control-file my-pond' : 'form-control form-control-sm bg-transparent' }}"
                                {{ $type == 'detail' ? 'readonly' : '' }} value="{{ $data->{$field['id']} ?? '' }}">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @if ($type == 'detail')
        <x-log-activity-table :logActivity="$logActivity" :target="$target" />
    @endif
    <div class="modal-footer">
        <button type="submit" id="add-md-social-media" class="btn btn-sm btn-success text-white mr-1"
            onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
        <button type="submit" id="edit-md-social-media" class="btn btn-sm btn-warning text-white mr-1"
            onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
    </div>
</form>
