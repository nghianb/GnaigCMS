@extends('dashboard::layouts.dashboard')

@section('content')
    <div x-data="{ deletingAction: '' }">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Customer table</h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                    <tr>
                        <th class="w-1">No.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Updated</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td><span class="text-muted">{{ $customer->id }}</span></td>
                            <td>{{ $customer->firstname }}</td>
                            <td>{{ $customer->lastname }}</td>
                            <td>{{ $customer->username }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->updated_at->format('d/m/Y h:i:s') }}</td>
                            <td>{{ $customer->created_at->format('d/m/Y h:i:s') }}</td>
                            <td class="text-end">
                                <a href="#deleting-modal" data-bs-toggle="modal" class="btn btn-icon btn-danger"
                                   data-action="{{ route('customers.destroy', $customer) }}"
                                   x-data @click="deletingAction = $el.dataset.action">Del</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {!! $customers->links('dashboard::components.pagination') !!}
            </div>
        </div>
        <div class="modal modal-blur fade" id="deleting-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <form x-data :action="deletingAction" method="post" class="modal-content">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                        <h3>Are you sure?</h3>
                        <div class="text-muted">Do you really want to remove customer? What you've done cannot be undone.</div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn w-100" data-bs-dismiss="modal">Cancel</a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger w-100">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
