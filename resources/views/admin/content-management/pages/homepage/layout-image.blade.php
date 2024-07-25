<div class="card-body pt-2">
    <div class="card-header p-0 pb-2">
        <div class="toolbar row">
            <div class="col-6">
                <h6 class="text-uppercase">Layout Image - Homepage</h6>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-sm btn-outline-success mr-1 float-right text-uppercase"
                    onclick="openModal('homepage','add')"><i class="fe fe-plus"></i> Tambah
                    Gambar</button>
                <button type="button" class="btn btn-sm btn-outline-warning mr-1 float-right text-uppercase"
                    onclick="openModal('homepage','layout')"><i class="fe fe-settings"></i> Manage Layout</button>
                <button type="button" class="btn btn-sm btn-outline-primary mr-1 float-right text-uppercase"
                    onclick="openForm()"><i class="fe fe-eye"></i> Tampilkan
                    Gambar</button>
            </div>
        </div>
    </div>
    <style>
        {!! $master->style_css !!}
    </style>
    <div class="card-body px-0">
        <div class="row">
            <div class="col-md-7">
                @if ($data && count($data) > 0)
                    <div class="masonry">
                        @foreach ($data as $key => $item)
                            <div class="masonry-item">
                                <img src="{{ asset($item->image) }}" alt="Placeholder Image {{ $key + 1 }}">
                                <h5 class="image-number" onclick="openModal('{{ $item->image }}','detail')">
                                    {{ $item->sequence }}
                                </h5>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <span class="fe fe-alert-octagon fe-16 mr-2"></span> Tidak terdapat data gambar Homepage
                    </div>
                @endif
            </div>
            <div class="col-md-5 px-0">
                <div class="card-body p-0">
                    <table class="table datatables table-bordered table-hover table-data" id="table-">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="w-10p">Urutan</th>
                                <th class="w-20p">Tipe</th>
                                <th class="">Ukuran</th>
                                <th class="w-5p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $image)
                                <tr class="">
                                    <td class="w-10p text-center">{{ $image->sequence }}</td>
                                    <td class="w-20p">{{ $image->type }}</td>
                                    <td class="">{{ $image->width }} x {{ $image->height }}</td>
                                    <td class="w-5p">
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <label class="dropdown-item pointer"
                                                onclick="openModal('homepage','edit','{{ $image->id }}')"><span
                                                    class="mr-2 fe fe-edit"></span>Edit</label>
                                            <label class="dropdown-item pointer"
                                                onclick="manageData('delete', '{{ $image->id }}')"><span
                                                    class="mr-2 fe fe-x-circle"></span>Remove</label>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum terdapat data gambar Homepage</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
