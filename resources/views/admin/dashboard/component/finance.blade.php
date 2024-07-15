<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card card-statistic-1 mb-3">
            <div class="card-wrap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-uppercase" for="">TOTAL A/R</span>
                                    <h3>{{ number_format($ar_data['total']) }}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="" for="">Total A/R < 30 Hari</span>
                                    <h5>{{ number_format($ar_data['below30']) }}</h5>
                                    {{ number_format($ar_data['percentBelow30']) }} %
                                </div>
                                <div class="col-md-6">
                                    <span class="" for="">Total A/R > 30 Hari</span>
                                    <h5>{{ number_format($ar_data['above30']) }}</h5>
                                    {{ number_format($ar_data['percentAbove30']) }} %
                                </div>
                            </div>
                        </div>


                        <div>
                            <input type="hidden" id="ar_below_30" value="{{ $ar_data['below30'] }}">
                            <input type="hidden" id="ar_above_30" value="{{ $ar_data['above30'] }}">
                        </div>
                        <div class="col-md-4">
                            <canvas id="financeChart" width="100"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<h5 class="ml-1">Manage Invoice</h5>
<div class="ccontainer-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 px-0">
        <div class="card card-statistic-1 mb-3">
            <div class="card-wrap">
                <div class="card-body">
                    <div id="manage-invoice" class="card my-2">
                        <table class="table datatables table-bordered table-hover table-data" id="table-manage-invoice">
                            <thead>
                                <tr>
                                    <th class="w-5p">No</th>
                                    <th class="w-15p">Project/Training ID</th>
                                    <th>Client Name</th>
                                    <th class="w-8p">Type</th>
                                    <th class="w-25p">Team Assigned</th>
                                    <th class="w-8p">Status</th>
                                    <th class="w-5p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($invoice as $key => $item)
                                    <tr id="">
                                        <td class="w-5p">{{ $key + 1 }}
                                        <td class="w-15p">{{ $item->project_code }}</td>
                                        <td class="w-25p">{{ $item->client_name }}</td>
                                        <td class="w-8p">{{ $item->project_type }}</td>
                                        <td class="w-25p">
                                            @if ($item->project_type == 'Project')
                                                <div class="justify-content-between">
                                                    <span style="min-width: 80px" class="badge badge-pill badge-primary mr-2">Project
                                                        Manager</span>
                                                    <label for="" class="ml-1">{{ $item->user_project_manager }}</label>
                                                </div>
                                            @endif
                                            <div class="justify-content-between">
                                                <span style="min-width: 80px" class="badge badge-pill badge-primary mr-2">Lead Consultant</span>
                                                <label for="" class="ml-1">{{ $item->user_lead_consultant }}</label>
                                        </div>
                                            <div class="justify-content-between">
                                                <span style="min-width: 80px" class="badge badge-pill badge-primary mr-2">Consultant</span>
                                                <label for="" class="ml-1">{{ $item->user_other_consultant }}</label>
                                            </div>
                                        </td>
                                        <td class="w-8p">

                                            <span style="min-width: 60px"
                                                class="badge badge-pill text-white badge-@php if ($item->project_status == 'On Going') { echo 'success'; } elseif ($item->project_status == 'Close') { echo 'warning'; }else { echo 'primary'; } @endphp
                                             mr-2">{{ $item->project_status }}</span>


                                        </td>
                                        <td class="w-5p">
                                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <label class="dropdown-item pointer"
                                                    onclick="viewInvoice({{ $item->id }})"><span
                                                        class="mr-2 fe fe-eye"></span>View</label>
                                                @if ($item->project_status == 'On Going' || $item->project_status == 'Open')
                                                    <label class="dropdown-item pointer"
                                                        onclick="viewRequestInvoice({{ $item->id }})"><span
                                                            class="mr-2 fe fe-edit"></span>Request Invoice</label>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">There is no data displayed</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('page-scripts')
    <script src="{{ asset('script/admin/consultant/index.js') }}"></script>
@endpush
