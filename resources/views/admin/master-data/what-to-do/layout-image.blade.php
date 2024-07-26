<div class="card-body pt-2">
    <style>
        .masonry {
            column-count: 3;
            column-gap: 1rem;
        }

        .masonry-item {
            position: relative;
            /* Ensure the positioning context for the overlay */
            background-color: #f2f2f2;
            margin-bottom: 1rem;
            display: inline-block;
            width: 100%;
            break-inside: avoid;
        }

        .masonry-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        .image-number {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            /* Semi-transparent background */
            color: white;
            padding: 0.5rem;
            border-radius: 0.3rem;
            font-size: 1.5rem;
            text-align: center;
            visibility: hidden;
            /* Hide the number by default */
            opacity: 0;
            transition: opacity 0.3s ease;
            /* Smooth transition */
        }

        .masonry-item:hover .image-number {
            visibility: visible;
            /* Show the number on hover */
            opacity: 1;
            cursor: pointer;
        }
    </style>
    <div class="card-body px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="masonry">
                    <div class="masonry-item" data-toggle="modal" data-target="#imageModal"
                        data-src="https://via.placeholder.com/400x300">
                        <img src="https://via.placeholder.com/400x300" alt="Placeholder Image 1">
                    </div>
                    <div class="masonry-item" data-toggle="modal" data-target="#imageModal"
                        data-src="https://via.placeholder.com/400x500">
                        <img src="https://via.placeholder.com/400x500" alt="Placeholder Image 2">
                    </div>
                    <div class="masonry-item" data-toggle="modal" data-target="#imageModal"
                        data-src="https://via.placeholder.com/400x600">
                        <img src="https://via.placeholder.com/400x600" alt="Placeholder Image 3">
                    </div>
                    <div class="masonry-item" data-toggle="modal" data-target="#imageModal"
                        data-src="https://via.placeholder.com/400x200">
                        <img src="https://via.placeholder.com/400x200" alt="Placeholder Image 4">
                    </div>
                    <div class="masonry-item" data-toggle="modal" data-target="#imageModal"
                        data-src="https://via.placeholder.com/400x400">
                        <img src="https://via.placeholder.com/400x400" alt="Placeholder Image 5">
                    </div>
                    <div class="masonry-item" data-toggle="modal" data-target="#imageModal"
                        data-src="https://via.placeholder.com/400x450">
                        <img src="https://via.placeholder.com/400x450" alt="Placeholder Image 6">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
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
                            <div class="form-group">
                                <input type="{{ $field['type'] }}" id="{{ $field['id'] }}" name="{{ $field['id'] }}"
                                    class="{{ $field['type'] == 'file' ? 'form-control-file my-pond' : 'form-control form-control-sm bg-transparent' }}"
                                    value="{{ $data->{$field['id']} ?? '' }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-md-6"></div>

            <div class="col-6">
                <button type="button" class="btn btn-sm btn-outline-success mr-1 float-right text-uppercase"
                    onclick="openModal('homepage','add')"><i class="fe fe-check"></i> Tambah
                    Gambar</button>
            </div>
        </div>
    </div>
</div>
