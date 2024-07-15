<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card card-statistic-1 mb-3">
            <div class="card-wrap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-12">
                                    <span class="text-uppercase" for="">Total Sales 2022</span>
                                    <h3>{{ number_format($data['value']['total']) }}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="" for="">Project</span>
                                    <h5>{{ number_format($data['value']['project']) }}</h5>
                                    {{ number_format($data['percentage']['project']) }} %
                                </div>
                                <div class="col-md-6">
                                    <span class="" for="">In House Training</span>
                                    <h5>{{ number_format($data['value']['in_house']) }}</h5>
                                    {{ number_format($data['percentage']['in_house']) }} %
                                </div>
                                <div class="col-md-6">
                                    <span class="" for="">Public Training</span>
                                    <h5>{{ number_format($data['value']['public_training']) }} </h5>
                                    {{ number_format($data['percentage']['public_training']) }} %
                                </div>
                            </div>
                        </div>


                        <div>
                            <input type="hidden" id="project_amount" value="{{ $data['value']['project'] }}">
                            <input type="hidden" id="in_house_amount" value="{{ $data['value']['in_house'] }}">
                            <input type="hidden" id="public_training_amount"
                                value="{{ $data['value']['public_training'] }}">
                        </div>
                        <div class="col-md-4">
                            <canvas id="pieChartjs" width="100"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<h5 class="ml-1">My Activities</h5>
<div class="card my-2">
    <div class="card-top p-3">
        <div class="row">
            <div class="col-md-6 d-flex" style="  align-items: center;">
                <i class="fe fe-users fe-16 text-danger"></i>
                <h5 class="mx-2 mb-0">Next Follow Up</h5>
                {{-- <span class="badge badge-pill rounded badge-dark mx-2 text-white">20</span> --}}
                <label class="mx-2 mb-0">1 Weeks Ahead</label>
            </div>
            <div class="col-md-6">
                <label href="" class="float-right text-primary pointer" id="label-view-next-follow-up"
                    onclick="showData('next-follow-up')">View
                    All</label>
                <label href="" class="float-right text-primary pointer" style="display: none"
                    id="label-hide-next-follow-up" onclick="closeData('next-follow-up')">Hide Data</label>
            </div>
        </div>
    </div>
    <div class="card-body px-1 border-top" style="display: none" id="data-next-follow-up">
        <table class="table table-borderless table-hover dt-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Client Name</th>
                    <th>Latest Follow up Date</th>
                    <th class="w-50">Note</th>
                    <th>Due Follow Up</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="text-black" style="font-size:12px;">
                @php
                    $no = 1;
                @endphp
                @foreach ($my_activity['next_follow_up'] as $nfu)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $nfu->client_name }}</td>
                        <td>{{ date_format(date_create($nfu->follow_up_date), 'd F Y') }}</td>
                        <td>{{ $nfu->notes }}</td>
                        <td>{{ date_format(date_create($nfu->follow_up_due_next), 'd F Y') }}</td>
                        <td>
                            {{-- <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <label class="dropdown-item pointer" onclick="viewProposal({{ $nfu->id }})"><span
                                        class="mr-2 fe fe-eye"></span>View</label>
                                <label class="dropdown-item pointer"
                                    onclick="updatePresentation({{ $nfu->id }})"><span
                                        class="mr-2 fe fe-edit-2"></span>Update Presentation</label>
                            </div> --}}
                            <button class="btn btn-sm btn-primary"
                                onclick="updateFollowUp({{ $nfu->id }})">Update</button>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card my-2">
    <div class="card-top p-3">
        <div class="row">
            <div class="col-md-6 d-flex" style="  align-items: center;">
                <i class="fe fe-book-open fe-16 text-success"></i>
                <h5 class="mx-2 mb-0">Total Proposal</h5>
                {{-- <span class="badge badge-pill rounded badge-dark mx-2 text-white">20</span> --}}
                <label class="mx-2 mb-0">1 Weeks Ahead</label>
            </div>
            <div class="col-md-6">
                <label href="" class="float-right text-primary pointer" id="label-view-proposal"
                    onclick="showData('proposal')">View
                    All</label>
                <label href="" class="float-right text-primary pointer" style="display: none"
                    id="label-hide-proposal" onclick="closeData('proposal')">Hide Data</label>
            </div>
        </div>
    </div>
    <div class="card-body px-1 border-top" style="display: none" id="data-proposal">
        <table class="table table-borderless table-hover dt-table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Type</th>
                    <th>Proposal Title</th>
                    <th>Release Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @foreach ($my_activity['total_proposal'] as $tp)
                    <tr>
                        <td>{{ $tp->client_name }}</td>
                        <td>{{ $tp->proposal_type }}</td>
                        <td>{{ $tp->proposal_title }}</td>
                        <td>{{ $tp->proposal_date }}</td>
                        <td>
                            {{-- <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <label class="dropdown-item pointer"
                                    onclick="openModal('follow-up-sales','detail', {{ $tp->id }})"><span
                                        class="mr-2 fe fe-eye"></span>View</label>
                                <label class="dropdown-item pointer"
                                    onclick="openModal('follow-up-sales','edit', {{ $tp->id }})"><span
                                        class="mr-2 fe fe-edit-2"></span>Update Presentation</label>
                            </div> --}}
                            <button class="btn btn-sm btn-primary"
                                onclick="updateProposal({{ $tp->id }})">Update</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card my-2">
    <div class="card-top p-3">
        <div class="row">
            <div class="col-md-6 d-flex" style="  align-items: center;">
                <i class="fe fe-airplay fe-16 text-primary"></i>
                <h5 class="mx-2 mb-0">Upcoming Presentation</h5>
                {{-- <span class="badge badge-pill rounded badge-dark mx-2 text-white">20</span> --}}
                <label class="mx-2 mb-0">1 Weeks Ahead</label>
            </div>
            <div class="col-md-6">
                <label href="" class="float-right text-primary pointer" id="label-view-presentation"
                    onclick="showData('presentation')">View
                    All</label>
                <label href="" class="float-right text-primary pointer" style="display: none"
                    id="label-hide-presentation" onclick="closeData('presentation')">Hide Data</label>
            </div>
        </div>
    </div>
    <div class="card-body px-1 border-top" style="display: none" id="data-presentation">
        <table class="table table-borderless table-hover dt-table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Presentation Date</th>
                    <th>Presentation Topic</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @foreach ($my_activity['upcoming_presentation'] as $up)
                    <tr>
                        <td>{{ $up->client_name }}</td>
                        <td>{{ date_format(date_create($up->presentation_date), 'd F Y') }}</td>
                        <td>{{ $up->presentation_topic }}</td>
                        <td>
                            {{-- <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <label class="dropdown-item pointer"
                                    onclick="openModal('follow-up-sales','detail', {{ $up->id }})"><span
                                        class="mr-2 fe fe-eye"></span>View</label>
                                <label class="dropdown-item pointer"
                                    onclick="openModal('follow-up-sales','edit', {{ $up->id }})"><span
                                        class="mr-2 fe fe-edit-2"></span>Update Presentation</label>
                            </div> --}}
                            <button class="btn btn-sm btn-primary"
                                onclick="updatePresentation({{ $up->id }})">Update</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
