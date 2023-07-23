<x-menu-setting>


    <x-slot:header>
        <div class="container text-center">
            <h3 class="headerTitle my-3">{{ __('Support Ticket')}}</h3>
        </div>

    </x-slot:header>


    <section class="col-lg-8">
        <div class="card __card mb-4">
            <div class="table-responsive">
                <table class="table __table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('Date Submitted')}}</th>
                            <th>{{ __('Last Updated')}}</th>
                            <th>{{ __('Type')}}</th>
                            <th>{{ __('Priority')}}</th>
                            <th>{{ __('Status')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($supportTicket->created_at)->format('Y-m-d h:i A') }}
                            </td>
                            <td>
                                 {{ \Carbon\Carbon::parse($supportTicket->messages()->latest('created_at')->first()->created_at)->format('Y-m-d h:i A') }}
                            </td>
                            <td>
                                {{ $supportTicket->type }}
                            </td>
                            <td>
                                {{ $supportTicket->priority }}
                            </td>
                            <td>
                                <span class="badge btn btn-secondary">{{ $supportTicket->status }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card __card mb-4">
            <div class="__media-wrapper card-body">

                @foreach ($supportTicket->messages as $message)
                    @if ($message->user->type == 'user')

                        <div class="media __incoming-msg" style="background-color: rgba(133,148,159,.1);">
                            <img class="rounded-circle __img-40" style="text-align: right;"
                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                src="{{ $message->user->image_path }}" alt="{{ $message->user->name }}" />
                            <div class="media-body">
                                <h6 class="font-size-md mb-2">{{ $message->user->name}}</h6>
                                <p class="font-size-md mb-1">{{ $message->message }}</p>
                                <span class="font-size-ms text-muted">
                                    <i class="czi-time align-middle mr-2"></i>
                                     {{ \Carbon\Carbon::parse($message->created_at)->format('Y-m-d h:i A') }}
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="media __outgoing-msg" style="background-color: var(--primary-clr);">
                            <div class="media-body">
                                <h6 class="font-size-md mb-2">{{ __('Admin')}}</h6>
                                <p class="font-size-md mb-1">{{ $message->message }}</p>
                                <span class="font-size-ms text-muted">
                                    {{ \Carbon\Carbon::parse($message->created_at)->format('Y-m-d h:i A') }}

                                </span>
                            </div>
                        </div>
                    @endif


                @endforeach


            </div>
            <div class="card-footer border-0">
                <form   action="{{ route('front.tickets.update',$supportTicket->id) }}" method="post"
                     >
                    @method("PUT")
                    @csrf
                      <div class="form-group">
                        <textarea class="form-control" name="message" rows="8" placeholder="Write your message here..." required></textarea>
                        <div class="invalid-tooltip">{{ __('Please write the message!')}}</div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-end align-items-center gap-8">
                        <div>
                            <a href="{{ route('front.tickets.index') }}"
                                class="btn btn-secondary text-white">{{ __('Close')}}</a>
                        </div>
                        <button class="btn btn--primary my-2" type="submit">{{ __('Submit message')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>




    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> {{ __('Alert!')}}</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</x-menu-setting>
