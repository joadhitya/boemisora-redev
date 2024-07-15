<table class="table datatables table-bordered table-hover table-data" id="table-md-social-media">
    <thead>
        <tr class="text-uppercase">
            <th class="w-5p">No</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Icon/Gambar</th>
            <th class="w-5p">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-md-social-media-{{ $item->id }}">
                <td class="w-5p">{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->icon }}</td>
                <td class="w-5p">
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn p5x btn-sm btn-outline-primary"
                            onclick="openModal('md-social-media','detail', '{{ $item->id }}')"><span
                                class="fe fe-info"></span></button>
                        <button type="button" class="btn p5x btn-sm btn-outline-warning"
                            onclick="openModal('md-social-media','edit', '{{ $item->id }}')"><span
                                class="fe fe-edit"></span></button>
                        <button type="button" class="btn p5x btn-sm btn-outline-danger"
                            onclick="manageData('delete','{{ $item->id }}', '{{ $item->name }}')"><span
                                class="fe fe-trash"></span></button>
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
