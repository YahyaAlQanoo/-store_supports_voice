<x-menu-setting>


    <x-slot:header>
        <div class="container text-center">
            <h3 class="headerTitle my-3">{{ __('Support Ticket')}}</h3>
        </div>

    </x-slot:header>


    <section class="col-lg-9 col-md-9">


        <div class="card __card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 __ticket-table">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-t-0">
                                    <div class="py-2"><span class="d-block spandHeadO ">{{ __('Topic')}}</span></div>
                                </th>
                                <th class="border-t-0">
                                    <div class="py-2 ml-2"><span class="d-block spandHeadO ">{{ __('Submition date')}}</span>
                                    </div>
                                </th>
                                <th class="border-t-0">
                                    <div class="py-2"><span class="d-block spandHeadO">{{ __('Type')}}</span>
                                    </div>
                                </th>
                                <th class="border-t-0">
                                    <div class="py-2">
                                        <span class="d-block spandHeadO">
                                            {{ __('Status')}}
                                        </span>
                                    </div>
                                </th>
                                <th class="border-t-0 text-center">
                                    <div class="py-2"><span class="d-block spandHeadO">{{ __('Action')}} </span></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                        <span class="marl">{{ $ticket->title }}</span>
                                    </td>
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($ticket->created_at)->format('Y-m-d h:i A') }}</span>
                                    </td>
                                    <td><span class>{{ $ticket->priority }}</span></td>
                                    <td><span class>{{ $ticket->status }}</span></td>
                                    <td>
                                        <div class="btn--container flex-nowrap justify-content-center">
                                            <a class="action-btn btn--primary"
                                                href="{{ route('front.tickets.show', $ticket->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <form action="{{ route('front.tickets.destroy',$ticket->id) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                            <button class="action-btn btn--danger" type="submit" id="delete"
                                                class=" marl">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn--primary float-right" data-toggle="modal" data-target="#open-ticket">
                {{ __('Add new ticket')}}
            </button>
        </div>
    </section>


    <div class="modal fade rtl" style="text-align: left;" id="open-ticket" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="modal-title font-nameA ">{{ __('Submit new ticket')}}</h5>
                        </div>
                        <div class="col-md-12 text-black mt-3">
                            <span>{{ __('You will get response.')}}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="mt-3" method="post" action="{{ route('front.tickets.store') }}"
                        id="open-ticket">
                        @csrf


                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="firstName">{{ __('Subject')}}</label>
                                <input type="text" class="form-control" id="ticket-subject" name="title"
                                    required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class>
                                    <label class for="inlineFormCustomSelect">{{ __('Type')}}</label>
                                    <select class="custom-select " id="ticket-type" name="type" required>
                                        <option value="Website problem">{{ __('Website Problem')}}</option>
                                        <option value="Partner request">{{ __('Partner request')}}</option>
                                        <option value="Complaint">{{ __('Complaint')}}</option>
                                        <option value="Info inquiry">{{ __('Info Inquiry')}} </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class>
                                    <label class for="inlineFormCustomSelect">{{ __('Priority')}}</label>
                                    <select class="form-control custom-select" id="ticket-priority"
                                        name="priority" required>
                                        <option value>{{ __('Choose priority')}}</option>
                                        <option value="Urgent">{{ __('Urgent')}}</option>
                                        <option value="High">{{ __('High')}}</option>
                                        <option value="Medium">{{ __('Medium')}}</option>
                                        <option value="Low">{{ __('Low')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="detaaddressils">{{ __('Describe your issue')}}</label>
                                <textarea class="form-control" rows="6" id="ticket-description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer p-0 border-0">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
                            <button type="submit" class="btn btn--primary">{{ __('Submit a ticket')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> {{ __('Alert')}}!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <style>
        .for-count-value {
            color: #3b71de;
        }

        .count-value {
            color: #3b71de;
        }

        @media (min-width: 768px) {
            .navbar-stuck-menu {
                background-color: #3b71de;
            }

        }

        @media (max-width: 767px) {
            .search_button .input-group-text i {
                color: #3b71de                              !important;
            }
            .navbar-expand-md .dropdown-menu > .dropdown > .dropdown-toggle {
                padding- right: 1.95rem;
            }

            .mega-nav1 {
                color: #3b71de                              !important;
            }

            .mega-nav1 .nav-link {
                color: #3b71de                              !important;
            }
        }

        @media (max-width: 471px) {
            .mega-nav1 {
                color: #3b71de                              !important;
            }
            .mega-nav1 .nav-link {
                color: #3b71de !important;
            }
        }
    </style>

</x-menu-setting>
