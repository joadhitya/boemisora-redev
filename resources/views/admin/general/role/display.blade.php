<table class="table datatables table-bordered table-hover table-data" id="table-role">
    <thead>
        <tr>
            <th class="w-5p">No</th>
            <th>Role Name</th>
            <th class="w-15p">Access Control</th>
            <th class="w-5p">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)
            <tr>
                <td class="w-5p">{{ $key + 1 }}</td>
                <td>{{ $item->role_name }}</td>
                <td class="w-15p">
                    <span onclick="openModal('role','access-control', {{ $item->id }}, '{{ $item->role_name }}')"
                        class="text-primary pointer"><i class="fe fe-settings fe-16 mr-1"></i> Setting</span>

                </td>

                <td class="w-5p">

                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <label class="dropdown-item pointer"
                            onclick="openModal('role','detail', {{ $item->id }})"><span
                                class="mr-2 fe fe-eye"></span>View</label>
                        <label class="dropdown-item pointer"
                            onclick="openModal('role','edit', {{ $item->id }})"><span
                                class="mr-2 fe fe-edit"></span>Edit</label>
                        <label class="dropdown-item pointer"
                            onclick="manageData('delete', {{ $item->id }}, '{{ $item->role_name }}')",><span
                                class="mr-2 fe fe-trash"></span>Delete</label>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
