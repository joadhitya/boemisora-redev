<table class="table datatables table-bordered table-hover table-data" id="table-md-what-to-do">
    <thead>
        <tr class="text-uppercase">
            <th class="w-5p">No</th>
            <th>Nama</th>
            {{-- <th>Icon/Gambar</th> --}}
            <th class="w-5p">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $key => $item)
            <tr id="row-md-what-to-do-{{ $item->id }}">
                <td class="w-5p">{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>
                {{-- <td>{{ $item->icon }}</td> --}}
                <td class="w-5p">
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn p5x btn-sm btn-outline-primary"
                            onclick="openModal('md-what-to-do','detail', '{{ $item->id }}')"><span
                                class="fe fe-info"></span></button>
                        <button type="button" class="btn p5x btn-sm btn-outline-success"
                            onclick="openModal('md-what-to-do','image', '{{ $item->id }}')"><span
                                class="fe fe-image"></span></button>
                        <button type="button" class="btn p5x btn-sm btn-outline-warning"
                            onclick="openModal('md-what-to-do','edit', '{{ $item->id }}')"><span
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
