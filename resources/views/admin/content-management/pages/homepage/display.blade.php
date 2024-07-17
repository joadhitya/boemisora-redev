<div class="card-body pt-2">
    <div class="card-header p-0 pb-2">
        <div class="toolbar row ">
            <div class="col-md-6 col-sm-6 col-6">
                <h6 class="h6 text-uppercase">List Konten Homepage</h6>
            </div>
        </div>
    </div>

    <table class="table datatables table-bordered table-hover table-data" id="table-homepage">
        <thead>
            <tr class="text-uppercase">
                <th class="w-15p">Kode</th>
                <th class="w-20p">Nama</th>
                <th class="w-10p">Jenis</th>
                <th class="">Content</th>
                <th class="w-10p">Status</th>
                <th class="w-5p">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $detail)
                <tr>
                    <td class="w-15p">{{ $detail->id }}</td>
                    <td class="w-20p">{{ $detail->name }}</td>
                    <td class="w-10p">{{ $detail->type }}</td>
                    <td>{{ $detail->content_in }}</td>
                    <td class="w-10p {{ $detail->is_active == 'yes' ? 'text-success' : 'text-danger' }}">
                        {{ $detail->is_active == 'yes' ? 'Aktif' : 'Tidak Aktif' }} </td>
                    <td class="w-5p">
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">

                            <label class="dropdown-item pointer"
                                onclick="activityDetail('homepage','detail','{{ $detail->id }}')"><span
                                    class="mr-2 fe fe-info"></span>Detail</label>
                            <label class="dropdown-item pointer"
                                onclick="activityDetail('homepage','edit','{{ $detail->id }}')"><span
                                    class="mr-2 fe fe-edit"></span>Edit</label>
                            @if ($detail->is_active == 'yes')
                                <label class="dropdown-item pointer"
                                    onclick="manageData('hide','{{ $detail->id }}')"><span
                                        class="mr-2 fe fe-eye-off"></span>Hide</label>
                            @elseif ($detail->is_active == 'no')
                                <label class="dropdown-item pointer"
                                    onclick="manageData('unhide','{{ $detail->id }}')"><span
                                        class="mr-2 fe fe-eye"></span>Unhide</label>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr colspan="5">Tidak terdapat data konten Homepage</tr>
            @endforelse
        </tbody>
    </table>

</div>
